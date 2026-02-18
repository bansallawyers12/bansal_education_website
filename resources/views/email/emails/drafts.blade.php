@extends('email.layouts.app')

@section('title', 'Drafts')
@section('heading', 'Drafts')

@section('content')
    <div class="flex h-[calc(100vh-8rem)] flex-col gap-4 lg:flex-row lg:gap-6">
        <div class="flex min-h-0 flex-1 flex-col rounded-xl border border-slate-800 bg-slate-900/50 lg:max-w-2xl">
            <div class="shrink-0 border-b border-slate-800 px-4 py-3 sm:px-6">
                <h2 class="text-base font-semibold text-slate-100">Drafts</h2>
                <p class="mt-0.5 text-sm text-slate-400">Unsent emails saved as drafts</p>
            </div>
            <div class="min-h-0 flex-1 overflow-auto">
                @if($emails->isEmpty())
                    <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                        <p class="mt-4 text-slate-400">No drafts</p>
                        <a href="{{ route('email.emails.compose') }}" class="mt-2 text-blue-400 hover:text-blue-300">Compose new email</a>
                    </div>
                @else
                    <table class="min-w-full divide-y divide-slate-800">
                        <thead class="sticky top-0 bg-slate-900/95 backdrop-blur">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">From</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">To</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">Subject</th>
                                <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-400 sm:px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach($emails as $email)
                                <tr class="group transition-colors {{ $selected && $selected->id === $email->id ? 'bg-blue-600/10' : 'hover:bg-slate-800/50' }}">
                                    <td class="whitespace-nowrap px-4 py-3 text-sm text-slate-300 sm:px-6">{{ Str::limit($email->from_address, 20) }}</td>
                                    <td class="whitespace-nowrap px-4 py-3 text-sm text-slate-400 sm:px-6">{{ Str::limit($email->to_address, 20) }}</td>
                                    <td class="max-w-[180px] truncate px-4 py-3 text-sm text-slate-400 sm:px-6" title="{{ $email->subject }}">{{ Str::limit($email->subject ?: '(no subject)', 36) }}</td>
                                    <td class="whitespace-nowrap px-4 py-3 text-right text-sm sm:px-6">
                                        <a href="{{ route('email.emails.compose', ['draft' => $email->id]) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
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

        <div class="flex min-h-[320px] flex-1 flex-col rounded-xl border border-slate-800 bg-slate-900/50 lg:min-w-0">
            @if($selected)
                <div class="relative flex min-h-0 flex-1 flex-col p-4 sm:p-6">
                    <div class="space-y-4 border-b border-slate-800 pb-4">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">Subject</p>
                            <p class="mt-0.5 text-sm font-medium text-slate-100">{{ $selected->subject ?: '(no subject)' }}</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('email.emails.compose', ['draft' => $selected->id]) }}" class="inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-500">Edit draft</a>
                            <form action="{{ route('email.emails.outbound.destroy', $selected) }}" method="POST" class="inline" onsubmit="return confirm('Move to Trash?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-600 bg-slate-800/50 px-3 py-1.5 text-sm font-medium text-slate-300 hover:bg-slate-700">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="min-h-0 flex-1 overflow-auto pt-4">
                        <div class="prose prose-invert prose-sm max-w-none rounded-lg border border-slate-700/50 bg-slate-800/30 p-4 text-slate-300">
                            @if($selected->body_html)
                                {!! $selected->body_html !!}
                            @else
                                <p class="whitespace-pre-wrap">{{ $selected->body_text ?: 'No content.' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="flex flex-1 flex-col items-center justify-center p-8 text-center">
                    <p class="text-slate-400">Select a draft to preview</p>
                </div>
            @endif
        </div>
    </div>
@endsection
