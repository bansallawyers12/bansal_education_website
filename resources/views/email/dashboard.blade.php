@extends('email.layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
    <div class="space-y-8">
        {{-- Stats cards --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-6">
                <p class="text-sm font-medium text-slate-400">Total Inbound Emails</p>
                <p class="mt-2 text-3xl font-semibold text-slate-100">{{ $stats['total_emails'] }}</p>
            </div>
            <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-6">
                <p class="text-sm font-medium text-slate-400">Pending</p>
                <p class="mt-2 text-3xl font-semibold text-amber-400">{{ $stats['pending'] }}</p>
            </div>
            <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-6">
                <p class="text-sm font-medium text-slate-400">Processed</p>
                <p class="mt-2 text-3xl font-semibold text-emerald-400">{{ $stats['processed'] }}</p>
            </div>
        </div>

        {{-- Recent emails --}}
        <div class="rounded-xl border border-slate-800 bg-slate-900/50">
            <div class="border-b border-slate-800 px-6 py-4">
                <h2 class="text-lg font-semibold text-slate-100">Recent Inbound Emails</h2>
                <p class="mt-0.5 text-sm text-slate-400">Latest emails received via SendGrid</p>
            </div>
            <div class="overflow-x-auto">
                @if($recentEmails->isEmpty())
                    <div class="px-6 py-12 text-center text-slate-400">
                        <p>No inbound emails yet.</p>
                        <p class="mt-1 text-sm">Emails will appear here when received through your SendGrid Inbound Parse webhook.</p>
                    </div>
                @else
                    <table class="min-w-full divide-y divide-slate-800">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400">From</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400">Subject</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400">Received</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach($recentEmails as $email)
                                <tr class="hover:bg-slate-800/50">
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-300">{{ Str::limit($email->from_address, 28) }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-300">{{ Str::limit($email->subject, 40) }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-400">{{ $email->received_at?->diffForHumans() ?? '—' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $email->status === 'processed' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-amber-500/20 text-amber-400' }}">
                                            {{ ucfirst($email->status) }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                        <a href="{{ route('email.emails.index', ['id' => $email->id]) }}" class="font-medium text-blue-400 hover:text-blue-300">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            @if($recentEmails->isNotEmpty())
                <div class="border-t border-slate-800 px-6 py-3">
                    <a href="{{ route('email.emails.index') }}" class="text-sm font-medium text-blue-400 hover:text-blue-300">View all emails →</a>
                </div>
            @endif
        </div>
    </div>
@endsection
