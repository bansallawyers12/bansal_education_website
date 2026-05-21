<?php

if (! function_exists('recaptcha_keys')) {
    function recaptcha_keys(): array
    {
        static $keys = null;

        if ($keys === null) {
            require_once __DIR__.'/../vendor/autoload.php';
            $app = require_once __DIR__.'/../bootstrap/app.php';
            $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

            $keys = [
                'site_key' => config('services.recaptcha.site_key'),
                'secret_key' => config('services.recaptcha.secret_key'),
            ];
        }

        return $keys;
    }

    function recaptcha_enabled(): bool
    {
        $keys = recaptcha_keys();

        return ! empty($keys['site_key']) && ! empty($keys['secret_key']);
    }

    function verify_recaptcha(?string $response): bool
    {
        $secret = recaptcha_keys()['secret_key'];

        if (! $secret || ! $response) {
            return false;
        }

        $result = Illuminate\Support\Facades\Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => $secret,
                'response' => $response,
                'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
            ]
        );

        return $result->successful() && $result->json('success');
    }
}
