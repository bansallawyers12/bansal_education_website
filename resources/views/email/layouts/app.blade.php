<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name', 'CRM') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @stack('styles')
</head>
<body class="h-full bg-slate-950 text-slate-200 font-sans antialiased">
    <div class="flex h-full">
        <input type="checkbox" id="sidebar-toggle" class="peer/sidebar hidden">
        {{-- Left sidebar (must be direct sibling of input for peer-checked) --}}
        <aside class="fixed inset-y-0 left-0 z-40 w-64 flex flex-col bg-slate-900/95 border-r border-slate-800 lg:static transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-out peer-checked/sidebar:translate-x-0">
            <div class="flex h-14 shrink-0 items-center gap-2 border-b border-slate-800 px-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-slate-100">Email</span>
                </div>
                <a href="{{ route('home') }}" class="ml-auto text-xs text-slate-400 hover:text-slate-200">← Back to site</a>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3">
                <ul class="space-y-0.5">
                    <li>
                        <a href="{{ route('email.dashboard') }}" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.dashboard') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/80 hover:text-slate-200 transition-colors">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Contacts
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/80 hover:text-slate-200 transition-colors">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                            Tickets
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('email.emails.compose') }}" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.emails.compose*') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Compose
                        </a>
                    </li>
                    <li class="pt-2">
                        <span class="px-3 py-1 text-xs font-medium uppercase tracking-wider text-slate-500">Mail</span>
                    </li>
                    @php
                        $emailCounts = [
                            'inbox' => \App\Models\InboundEmail::count(),
                            'drafts' => \App\Models\OutboundEmail::where('status', \App\Models\OutboundEmail::STATUS_DRAFT)->count(),
                            'outbox' => \App\Models\OutboundEmail::where('status', \App\Models\OutboundEmail::STATUS_PENDING)->count(),
                            'sent' => \App\Models\OutboundEmail::where('status', \App\Models\OutboundEmail::STATUS_SENT)->count(),
                            'trash' => \App\Models\InboundEmail::onlyTrashed()->count() + \App\Models\OutboundEmail::onlyTrashed()->count(),
                        ];
                    @endphp
                    <li>
                        <a href="{{ route('email.emails.index') }}" class="flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.emails.index') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                Inbox
                            </span>
                            @if($emailCounts['inbox'] > 0)<span class="rounded-full bg-blue-600/30 px-2 py-0.5 text-xs text-blue-400">{{ $emailCounts['inbox'] }}</span>@endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('email.emails.drafts') }}" class="flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.emails.drafts') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                                Drafts
                            </span>
                            @if($emailCounts['drafts'] > 0)<span class="rounded-full bg-slate-600/30 px-2 py-0.5 text-xs text-slate-400">{{ $emailCounts['drafts'] }}</span>@endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('email.emails.outbox') }}" class="flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.emails.outbox') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                Outbox
                            </span>
                            @if($emailCounts['outbox'] > 0)<span class="rounded-full bg-amber-600/30 px-2 py-0.5 text-xs text-amber-400">{{ $emailCounts['outbox'] }}</span>@endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('email.emails.sent') }}" class="flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.emails.sent') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Sent
                            </span>
                            @if($emailCounts['sent'] > 0)<span class="rounded-full bg-slate-600/30 px-2 py-0.5 text-xs text-slate-400">{{ $emailCounts['sent'] }}</span>@endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('email.emails.trash') }}" class="flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('email.emails.trash') ? 'bg-blue-600/20 text-blue-400' : 'text-slate-400 hover:bg-slate-800/80 hover:text-slate-200' }}">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                Trash
                            </span>
                            @if($emailCounts['trash'] > 0)<span class="rounded-full bg-slate-600/30 px-2 py-0.5 text-xs text-slate-400">{{ $emailCounts['trash'] }}</span>@endif
                        </a>
                    </li>
                    <li class="pt-4 mt-4 border-t border-slate-800">
                        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/80 hover:text-slate-200 transition-colors">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- SendGrid badge --}}
            <div class="shrink-0 p-3 border-t border-slate-800 flex items-center gap-2 text-slate-500 text-xs">
                <svg class="w-4 h-4 shrink-0 opacity-60" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M2.4 2.4h19.2v4.8H2.4V2.4zm0 7.2h19.2v4.8H2.4V9.6zm0 7.2h19.2v4.8H2.4v-4.8z"/>
                </svg>
                <span>Powered by SendGrid</span>
            </div>
        </aside>
        <label for="sidebar-toggle" class="fixed inset-0 z-30 hidden cursor-pointer bg-slate-950/80 backdrop-blur-sm lg:hidden peer-checked/sidebar:block" aria-hidden="true"></label>

        {{-- Main content --}}
        <div class="flex flex-1 flex-col min-w-0">
            <header class="sticky top-0 z-20 flex h-14 shrink-0 items-center gap-4 border-b border-slate-800 bg-slate-950/90 backdrop-blur px-4 lg:px-8">
                <label for="sidebar-toggle" class="lg:hidden p-2 -ml-2 rounded-lg text-slate-400 hover:text-slate-200 hover:bg-slate-800 cursor-pointer flex items-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </label>
                <h1 class="text-lg font-semibold text-slate-100 truncate">@yield('heading', 'Dashboard')</h1>
            </header>

            <main class="flex-1 overflow-auto p-4 lg:p-8">
                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 text-sm">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
