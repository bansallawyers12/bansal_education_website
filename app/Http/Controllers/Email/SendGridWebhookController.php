<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\InboundEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

/**
 * Handles SendGrid Inbound Parse webhook.
 * SendGrid POSTs multipart/form-data to this endpoint when an email is received.
 * Configure the webhook URL in SendGrid: https://your-domain.com/api/webhooks/sendgrid-inbound
 */
class SendGridWebhookController extends Controller
{
    public function handle(Request $request): Response
    {
        try {
            $from = $this->parseEmailAddress($request->input('from', ''));
            $to = $this->parseEmailAddress($request->input('to', ''));

            $messageId = $this->extractMessageId($request->input('headers', ''));

            $attachmentInfo = $request->input('attachment-info', '{}');
            $attachments = is_string($attachmentInfo) ? json_decode($attachmentInfo, true) : $attachmentInfo;
            if (! is_array($attachments)) {
                $attachments = null;
            }

            InboundEmail::create([
                'message_id'    => $messageId,
                'from_address'  => $from['email'] ?? $request->input('from', 'unknown@unknown'),
                'to_address'    => $to['email'] ?? $request->input('to', 'unknown@unknown'),
                'subject'       => $request->input('subject', '(no subject)'),
                'received_at'   => now(),
                'status'       => InboundEmail::STATUS_PENDING,
                'body_text'     => $request->input('text'),
                'body_html'     => $request->input('html'),
                'attachments'   => $attachments,
                'headers'       => ['raw' => $request->input('headers')],
            ]);

            return response('', 200);
        } catch (\Throwable $e) {
            Log::error('SendGrid inbound webhook failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response('', 500);
        }
    }

    /**
     * Parse "Name <email@example.com>" or "email@example.com" format.
     *
     * @return array{email: string, name: string|null}
     */
    private function parseEmailAddress(string $value): array
    {
        $value = trim($value);
        if (empty($value)) {
            return ['email' => '', 'name' => null];
        }

        if (preg_match('/^(.+?)\s*<([^>]+)>$/u', $value, $m)) {
            return [
                'email' => trim($m[2], ' <>'),
                'name'  => trim($m[1], ' "'),
            ];
        }

        return ['email' => $value, 'name' => null];
    }

    private function extractMessageId(string $headers): ?string
    {
        if (empty($headers)) {
            return null;
        }
        if (preg_match('/Message-ID:\s*<?([^>\s]+)>?/im', $headers, $m)) {
            return trim($m[1]);
        }

        return null;
    }
}
