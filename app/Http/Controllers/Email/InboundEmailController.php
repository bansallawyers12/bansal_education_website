<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\InboundEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InboundEmailController extends Controller
{
    public function index(Request $request): View
    {
        $emails = InboundEmail::latest('received_at')
            ->paginate(15)
            ->withQueryString();

        $selected = null;
        $selectedId = $request->query('id');
        if ($selectedId) {
            $selected = InboundEmail::find($selectedId);
        } elseif ($emails->isNotEmpty()) {
            $selected = $emails->first();
        }

        return view('email.emails.index', [
            'emails'  => $emails,
            'selected' => $selected,
        ]);
    }

    public function destroy(InboundEmail $email): RedirectResponse
    {
        $email->delete();
        return redirect()->route('email.emails.index')->with('success', 'Email moved to Trash.');
    }

    public function show(InboundEmail $email): JsonResponse
    {
        return response()->json([
            'id'           => $email->id,
            'from_address' => $email->from_address,
            'to_address'   => $email->to_address,
            'subject'      => $email->subject,
            'received_at'  => $email->received_at?->toIso8601String(),
            'status'       => $email->status,
            'body_html'    => $email->body_html,
            'body_text'    => $email->body_text,
        ]);
    }
}
