<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendGridService
{
    public function getVerifiedSenders(): array
    {
        $senders = $this->fetchFromApi();
        if (!empty($senders)) {
            return $senders;
        }

        $senders = $this->parseConfiguredSenders();
        if (!empty($senders)) {
            return $senders;
        }

        return $this->fallbackSenders();
    }

    private function fetchFromApi(): array
    {
        $apiKey = config('services.sendgrid.api_key');
        if (empty($apiKey)) {
            return [];
        }

        $endpoints = [
            'https://api.sendgrid.com/v3/verified_senders' => function ($body) {
                $results = $body['results'] ?? [];
                $senders = [];
                foreach ($results as $s) {
                    $email = $s['from_email'] ?? null;
                    if ($email) {
                        $senders[] = [
                            'email' => $email,
                            'name' => $s['from_name'] ?? $email,
                            'label' => ($s['from_name'] ?? $email) ? "{$s['from_name']} <{$email}>" : $email,
                            'verified' => $s['verified'] ?? true,
                        ];
                    }
                }
                return $senders;
            },
            'https://api.sendgrid.com/v3/senders' => function ($body) {
                $results = is_array($body) ? $body : ($body['results'] ?? []);
                return $this->parseSenderObjects($results);
            },
            'https://api.sendgrid.com/v3/marketing/senders' => function ($body) {
                $results = $body['results'] ?? [];
                return $this->parseSenderObjects($results);
            },
        ];

        foreach ($endpoints as $url => $parser) {
            try {
                $response = Http::withToken($apiKey)->timeout(5)->get($url);
                if ($response->successful()) {
                    $body = $response->json();
                    $senders = $parser($body);
                    if (!empty($senders)) {
                        return $senders;
                    }
                }
            } catch (\Throwable $e) {
                Log::debug('SendGrid API attempt failed', ['url' => $url, 'error' => $e->getMessage()]);
            }
        }

        return [];
    }

    private function parseSenderObjects(array $results): array
    {
        $senders = [];
        foreach ($results as $s) {
            $email = $s['from']['email'] ?? $s['from_email'] ?? $s['email'] ?? null;
            if ($email) {
                $name = $s['from']['name'] ?? $s['from_name'] ?? $s['nickname'] ?? $email;
                $senders[] = [
                    'email' => $email,
                    'name' => $name,
                    'label' => $name ? "{$name} <{$email}>" : $email,
                    'verified' => $s['verified'] ?? true,
                ];
            }
        }
        return $senders;
    }

    private function parseConfiguredSenders(): array
    {
        $config = config('services.sendgrid.sender_emails');
        if (empty($config)) {
            return [];
        }

        $senders = [];
        foreach (array_map('trim', explode(',', $config)) as $part) {
            if (empty($part)) {
                continue;
            }
            if (str_contains($part, '|')) {
                [$email, $name] = array_map('trim', explode('|', $part, 2));
            } else {
                $email = trim($part);
                $name = $email;
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $senders[] = [
                    'email' => $email,
                    'name' => $name,
                    'label' => $name ? "{$name} <{$email}>" : $email,
                    'verified' => true,
                ];
            }
        }

        return $senders;
    }

    private function fallbackSenders(): array
    {
        $from = config('mail.from');
        return [
            [
                'email' => $from['address'],
                'name' => $from['name'],
                'label' => $from['name'] ? "{$from['name']} <{$from['address']}>" : $from['address'],
                'verified' => true,
            ],
        ];
    }
}
