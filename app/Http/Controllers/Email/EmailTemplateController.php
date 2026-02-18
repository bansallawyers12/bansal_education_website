<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string|max:500',
            'body_text' => 'nullable|string',
            'body_html' => 'nullable|string',
        ]);

        EmailTemplate::create($validated);

        return back()->with('success', 'Template saved.');
    }
}
