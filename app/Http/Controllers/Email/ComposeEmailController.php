<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\OutboundEmail;
use App\Services\SendGridService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ComposeEmailController extends Controller
{
    public function __construct(
        private SendGridService $sendGridService
    ) {}

    public function create(Request $request): View
    {
        $senders = $this->sendGridService->getVerifiedSenders();
        $templates = EmailTemplate::orderBy('name')->get();

        $draft = null;
        $draftId = $request->query('draft');
        if ($draftId) {
            $draft = OutboundEmail::where('status', OutboundEmail::STATUS_DRAFT)->find($draftId);
        }

        return view('email.emails.compose', [
            'senders' => $senders,
            'templates' => $templates,
            'draft' => $draft,
        ]);
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $this->validateCompose($request);

        $email = OutboundEmail::create([
            ...$validated,
            'status' => OutboundEmail::STATUS_DRAFT,
        ]);

        return $this->handleAction($request, $email);
    }

    public function update(Request $request, OutboundEmail $email): RedirectResponse|JsonResponse
    {
        if ($email->status !== OutboundEmail::STATUS_DRAFT) {
            return redirect()->route('email.emails.compose')->with('error', 'Cannot edit a non-draft email.');
        }

        $validated = $this->validateCompose($request);
        $email->update($validated);

        return $this->handleAction($request, $email);
    }

    private function validateCompose(Request $request): array
    {
        return $request->validate([
            'from_address' => 'required|email',
            'from_name' => 'nullable|string|max:255',
            'to_address' => 'required|email',
            'subject' => 'required|string|max:500',
            'body_text' => 'nullable|string',
            'body_html' => 'nullable|string',
        ]);
    }

    private function handleAction(Request $request, OutboundEmail $email): RedirectResponse|JsonResponse
    {
        $action = $request->input('action');

        if ($action === 'send_now') {
            return $this->sendNow($email);
        }

        if ($action === 'send') {
            $email->update(['status' => OutboundEmail::STATUS_PENDING]);
            return redirect()->route('email.emails.outbox', ['id' => $email->id])
                ->with('success', 'Email moved to Outbox. Click "Send now" to send.');
        }

        return redirect()->route('email.emails.compose', ['draft' => $email->id])
            ->with('success', 'Draft saved.');
    }

    private function sendNow(OutboundEmail $email): RedirectResponse|JsonResponse
    {
        try {
            Mail::mailer('sendgrid')->send([], [], function ($message) use ($email) {
                $message->to($email->to_address)
                    ->subject($email->subject)
                    ->from($email->from_address, $email->from_name ?? '');
                if ($email->body_html) {
                    $message->html($email->body_html);
                } else {
                    $message->text($email->body_text ?? '');
                }
            });

            $email->update([
                'status' => OutboundEmail::STATUS_SENT,
                'sent_at' => now(),
            ]);

            Log::info('Outbound email sent via SendGrid', ['id' => $email->id, 'to' => $email->to_address]);

            if (request()->wantsJson()) {
                return response()->json(['success' => true, 'redirect' => route('email.emails.sent', ['id' => $email->id])]);
            }

            return redirect()->route('email.emails.sent', ['id' => $email->id])
                ->with('success', 'Email sent successfully.');
        } catch (\Throwable $e) {
            Log::error('Failed to send email', [
                'id' => $email->id,
                'to' => $email->to_address,
                'from' => $email->from_address,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            $hint = '';
            if (str_contains(strtolower($e->getMessage()), 'authenticate') || str_contains(strtolower($e->getMessage()), '535')) {
                $hint = ' Check your SENDGRID_API_KEY in .env (ensure no typos).';
            } elseif (str_contains(strtolower($e->getMessage()), 'connection') || str_contains(strtolower($e->getMessage()), 'refused')) {
                $hint = ' Check firewall/network allows outbound connections to smtp.sendgrid.net:587.';
            }

            $msg = 'Failed to send: ' . $e->getMessage() . $hint;

            if (request()->wantsJson()) {
                return response()->json(['success' => false, 'error' => $msg], 422);
            }

            return redirect()->route('email.emails.compose', ['draft' => $email->id])
                ->with('error', $msg);
        }
    }
}
