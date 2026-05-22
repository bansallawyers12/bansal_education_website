<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Rules\Recaptcha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContactController extends Controller
{
    private const PREFERRED_COURSES = [
        'engineering',
        'business',
        'healthcare',
        'it',
        'hospitality',
        'trades',
        'other',
    ];

    private const EDUCATION_LEVELS = [
        'high-school',
        'diploma',
        'bachelor',
        'master',
        'other',
    ];

    public function storePublic(Request $request): RedirectResponse
    {
        if ($request->filled('companyWebsite')) {
            return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent.');
        }

        $rules = [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'preferredCourse' => ['nullable', Rule::in(self::PREFERRED_COURSES)],
            'educationLevel' => ['nullable', Rule::in(self::EDUCATION_LEVELS)],
            'message' => ['required', 'string', 'max:5000'],
        ];

        if (config('services.recaptcha.site_key') && config('services.recaptcha.secret_key')) {
            $rules['g-recaptcha-response'] = ['required', new Recaptcha];
        }

        $data = $request->validate($rules);
        $data = $this->sanitizeContactInput($data);

        if ($data['firstName'] === '' || $data['lastName'] === '' || $data['phone'] === '' || $data['message'] === '') {
            return redirect()->route('contact')
                ->withErrors(['message' => 'Please provide valid contact details.'])
                ->withInput();
        }

        $message = $data['message'];
        if (! empty($data['preferredCourse'] ?? '') || ! empty($data['educationLevel'] ?? '')) {
            $parts = [];
            if (! empty($data['preferredCourse'] ?? '')) {
                $parts[] = 'Preferred Course: ' . $data['preferredCourse'];
            }
            if (! empty($data['educationLevel'] ?? '')) {
                $parts[] = 'Education Level: ' . $data['educationLevel'];
            }
            $message = implode("\n", $parts) . ($message ? "\n\n" . $message : '');
        }

        ContactSubmission::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'subject' => $data['subject'] ?? null,
            'message' => $message ?: null,
        ]);

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent.');
    }

    public function index(Request $request): View
    {
        $query = ContactSubmission::query()->latest();

        if ($request->boolean('unread')) {
            $query->where('is_read', false);
        }

        $submissions = $query->paginate(15);
        $unreadCount = ContactSubmission::where('is_read', false)->count();

        return view('admin.contacts.index', [
            'submissions' => $submissions,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function show(ContactSubmission $contact_submission): View|RedirectResponse
    {
        if (! $contact_submission->is_read) {
            $contact_submission->update(['is_read' => true]);
        }

        return view('admin.contacts.show', ['sub' => $contact_submission]);
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function sanitizeContactInput(array $data): array
    {
        $data['firstName'] = $this->sanitizeText((string) ($data['firstName'] ?? ''));
        $data['lastName'] = $this->sanitizeText((string) ($data['lastName'] ?? ''));
        $data['email'] = strtolower(trim(strip_tags((string) ($data['email'] ?? ''))));
        $data['phone'] = $this->sanitizePhone((string) ($data['phone'] ?? ''));
        $data['message'] = $this->sanitizeText((string) ($data['message'] ?? ''), allowNewlines: true);

        if (array_key_exists('subject', $data) && $data['subject'] !== null) {
            $data['subject'] = $this->sanitizeText((string) $data['subject']) ?: null;
        }

        return $data;
    }

    private function sanitizeText(string $value, bool $allowNewlines = false): string
    {
        $value = trim(strip_tags($value));

        if ($allowNewlines) {
            return trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value) ?? '');
        }

        $value = preg_replace('/[\x00-\x1F\x7F]/u', ' ', $value) ?? '';

        return trim(preg_replace('/\s+/', ' ', $value) ?? '');
    }

    private function sanitizePhone(string $value): string
    {
        $value = trim(strip_tags($value));
        $value = preg_replace('/[^\d+\s().-]/', '', $value) ?? '';

        return trim(preg_replace('/\s+/', ' ', $value) ?? '');
    }
}
