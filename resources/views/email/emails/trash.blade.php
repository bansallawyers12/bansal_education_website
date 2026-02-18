@extends('email.layouts.app')

@section('title', 'Trash')
@section('heading', 'Trash')

@section('content')
    <div class="space-y-6">
        <p class="text-slate-400">Emails moved to Trash. They can be restored from the database if needed.</p>

        @if($outbound->isEmpty() && $inbound->isEmpty())
            <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-12 text-center">
                <p class="text-slate-400">Trash is empty</p>
            </div>
        @else
            @if($outbound->isNotEmpty())
                <div class="rounded-xl border border-slate-800 bg-slate-900/50 overflow-hidden">
                    <div class="border-b border-slate-800 px-4 py-3">
                        <h2 class="text-base font-semibold text-slate-100">Outbound (sent/drafts)</h2>
                    </div>
                    <table class="min-w-full divide-y divide-slate-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">From</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">To</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">Subject</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">Deleted</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach($outbound as $email)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-slate-300">{{ Str::limit($email->from_address, 24) }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-400">{{ Str::limit($email->to_address, 20) }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-400">{{ Str::limit($email->subject ?: '(no subject)', 40) }}</td>
                                    <td class="px-4 py-3 text-xs text-slate-500">{{ $email->deleted_at?->format('M j, g:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($outbound->hasPages())
                        <div class="border-t border-slate-800 px-4 py-3">{{ $outbound->links() }}</div>
                    @endif
                </div>
            @endif

            @if($inbound->isNotEmpty())
                <div class="rounded-xl border border-slate-800 bg-slate-900/50 overflow-hidden">
                    <div class="border-b border-slate-800 px-4 py-3">
                        <h2 class="text-base font-semibold text-slate-100">Inbound (received)</h2>
                    </div>
                    <table class="min-w-full divide-y divide-slate-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">From</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">Subject</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-slate-400">Deleted</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach($inbound as $email)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-slate-300">{{ Str::limit($email->from_address, 24) }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-400">{{ Str::limit($email->subject, 40) }}</td>
                                    <td class="px-4 py-3 text-xs text-slate-500">{{ $email->deleted_at?->format('M j, g:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($inbound->hasPages())
                        <div class="border-t border-slate-800 px-4 py-3">{{ $inbound->links() }}</div>
                    @endif
                </div>
            @endif
        @endif
    </div>
@endsection
