<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function storePublic(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'preferredCourse' => ['nullable', 'string', 'max:255'],
            'educationLevel' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
        ]);

        $message = $data['message'] ?? '';
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
            'phone' => $data['phone'] ?? null,
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
}
