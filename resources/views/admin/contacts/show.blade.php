@extends('admin.layout')

@section('title', 'Contact Message')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 text-navy hover:text-gold font-medium text-sm transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Contacts
    </a>
</div>

<div class="max-w-3xl">
    {{-- Header card --}}
    <div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-navy to-navy-dark px-8 py-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-white/20 flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white font-display">{{ $sub->full_name }}</h1>
                    <p class="text-white/80 text-sm mt-0.5">{{ $sub->created_at->format('l, F j, Y \a\t g:i A') }}</p>
                </div>
            </div>
        </div>

        {{-- Details --}}
        <div class="p-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-sky-50/50 border border-sky-100">
                    <div class="w-10 h-10 rounded-lg bg-sky-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-semibold text-sky-600 uppercase tracking-wider mb-1">Email</p>
                        <a href="mailto:{{ $sub->email }}" class="text-navy font-medium hover:text-gold break-all transition-colors">{{ $sub->email }}</a>
                    </div>
                </div>

                @if($sub->phone)
                <div class="flex items-start gap-4 p-4 rounded-xl bg-emerald-50/50 border border-emerald-100">
                    <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-emerald-600 uppercase tracking-wider mb-1">Phone</p>
                        <a href="tel:{{ $sub->phone }}" class="text-navy font-medium hover:text-gold transition-colors">{{ $sub->phone }}</a>
                    </div>
                </div>
                @endif
            </div>

            @if($sub->subject)
            <div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50/50 border border-amber-100">
                <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-amber-600 uppercase tracking-wider mb-1">Subject</p>
                    <p class="text-gray-800 font-medium">{{ $sub->subject }}</p>
                </div>
            </div>
            @endif

            @if($sub->message)
            <div class="p-5 rounded-xl bg-gray-50 border border-gray-100">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    Message
                </p>
                <div class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $sub->message }}</div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
