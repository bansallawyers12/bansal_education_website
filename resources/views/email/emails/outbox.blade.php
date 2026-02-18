@extends('email.layouts.app')

@section('title', 'Outbox')
@section('heading', 'Outbox')

@section('content')
    <div class="flex h-[calc(100vh-8rem)] flex-col gap-4 lg:flex-row lg:gap-6">
        {{-- Email list (table) --}}
        <div class="flex min-h-0 flex-1 flex-col rounded-xl border border-slate-800 bg-slate-900/50 lg:max-w-2xl">
            <div class="shrink-0 border-b border-slate-800 px-4 py-3 sm:px-6">
                <h2 class="text-base font-semibold text-slate-100">Outbox</h2>
                <p class="mt-0.5 text-sm text-slate-400">Emails pending send (queued)</p>
            </div>
            <div class="min-h-0 flex-1 overflow-auto">
                @if($emails->isEmpty())
                    <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                        <div class="rounded-full bg-slate-800 p-4">
                            <svg class="h-8 w-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </div>
                        <p class="mt-4 text-slate-400">No emails in outbox</p>
                        <p class="mt-1 text-sm text-slate-500">Compose or queue emails to see them here.</p>
                    </div>
                @else
                    <table class="min-w-full divide-y divide-slate-800">
                        <thead class="sticky top-0 bg-slate-900/95 backdrop-blur">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">From</th>
                                <th class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:table-cell sm:px-6">To</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">Subject</th>
                                <th class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 lg:table-cell lg:px-6">Created</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">Status</th>
                                <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach($emails as $email)
                                <tr class="group transition-colors {{ $selected && $selected->id === $email->id ? 'bg-blue-600/10' : 'hover:bg-slate-800/50' }}">
                                    <td class="whitespace-nowrap px-4 py-3 text-sm text-slate-300 sm:px-6">
                                        <a href="{{ route('email.emails.outbox', ['id' => $email->id] + request()->query()) }}" class="block font-medium text-slate-200 hover:text-blue-400">
                                            {{ Str::limit($email->from_address, 24) }}
                                        </a>
                                    </td>
                                    <td class="hidden whitespace-nowrap px-4 py-3 text-sm text-slate-400 sm:table-cell sm:px-6">{{ Str::limit($email->to_address, 20) }}</td>
                                    <td class="max-w-[180px] truncate px-4 py-3 text-sm text-slate-400 sm:max-w-none sm:px-6" title="{{ $email->subject }}">{{ Str::limit($email->subject, 36) }}</td>
                                    <td class="hidden whitespace-nowrap px-4 py-3 text-sm text-slate-400 lg:table-cell lg:px-6">{{ $email->created_at->format('M j, g:i A') }}</td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-6">
                                        <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium bg-amber-500/20 text-amber-400">Pending</span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 text-right text-sm sm:px-6">
                                        <a href="{{ route('email.emails.outbox', ['id' => $email->id] + request()->query()) }}" class="text-blue-400 hover:text-blue-300">View</a>
                                        <span class="mx-1.5 text-slate-600">|</span>
                                        <form action="{{ route('email.emails.outbox.send', $email) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-emerald-400 hover:text-emerald-300 bg-transparent border-0 p-0 cursor-pointer">Send now</button>
                                        </form>
                                        <span class="mx-1.5 text-slate-600">|</span>
                                        <form action="{{ route('email.emails.outbound.destroy', $email) }}" method="POST" class="inline" onsubmit="return confirm('Move to Trash?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            @if($emails->hasPages())
                <div class="shrink-0 border-t border-slate-800 px-4 py-3 sm:px-6">
                    {{ $emails->links() }}
                </div>
            @endif
        </div>

        {{-- Email preview pane --}}
        <div class="flex min-h-[320px] flex-1 flex-col rounded-xl border border-slate-800 bg-slate-900/50 lg:min-w-0">
            @if($selected)
                <div class="relative flex min-h-0 flex-1 flex-col">
                    <div class="shrink-0 space-y-4 border-b border-slate-800 p-4 sm:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-2">
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-slate-500">From</p>
                                <p class="mt-0.5 text-sm text-slate-200">{{ $selected->from_address }}</p>
                            </div>
                            <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium bg-amber-500/20 text-amber-400">Pending</span>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">To</p>
                            <p class="mt-0.5 text-sm text-slate-400">{{ $selected->to_address }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Subject</p>
                            <p class="mt-0.5 text-sm font-medium text-slate-100">{{ $selected->subject }}</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <form action="{{ route('email.emails.outbox.send', $selected) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-500">Send now</button>
                            </form>
                            <form action="{{ route('email.emails.outbound.destroy', $selected) }}" method="POST" class="inline" onsubmit="return confirm('Move to Trash?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-600 bg-slate-800/50 px-3 py-1.5 text-sm font-medium text-slate-300 hover:bg-slate-700">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="min-h-0 flex-1 overflow-auto p-4 sm:p-6">
                        <div class="prose prose-invert prose-sm max-w-none rounded-lg border border-slate-700/50 bg-slate-800/30 p-4 text-slate-300 prose-p:my-2 prose-p:leading-relaxed prose-a:text-blue-400">
                            @if($selected->body_html)
                                {!! $selected->body_html !!}
                            @else
                                <p class="whitespace-pre-wrap">{{ $selected->body_text ?: 'No content.' }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="absolute bottom-4 right-4 flex items-center gap-1.5 text-slate-600 text-xs opacity-60">
                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M2.4 2.4h19.2v4.8H2.4V2.4zm0 7.2h19.2v4.8H2.4V9.6zm0 7.2h19.2v4.8H2.4v-4.8z"/>
                        </svg>
                        <span>SendGrid</span>
                    </div>
                </div>
            @else
                <div class="flex flex-1 flex-col items-center justify-center p-8 text-center">
                    <div class="rounded-full bg-slate-800 p-4">
                        <svg class="h-10 w-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </div>
                    <p class="mt-4 text-slate-400">Select an email to preview</p>
                    <p class="mt-1 text-sm text-slate-500">Click a row in the list to view the message.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
