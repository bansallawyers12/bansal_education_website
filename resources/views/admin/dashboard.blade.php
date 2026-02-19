@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
{{-- Page header --}}
<div class="mb-10">
    <h1 class="text-3xl font-bold text-navy font-display">Dashboard</h1>
    <p class="text-gray-600 mt-1 text-lg">Manage your website content and settings</p>
</div>

{{-- Site Pages --}}
<div class="mb-10 overflow-hidden rounded-2xl shadow-card border border-gray-100 bg-white">
    <div class="bg-gradient-to-r from-navy via-navy-dark to-navy px-8 py-6">
        <h2 class="text-xl font-bold text-white flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
            </div>
            Site Pages — Edit Website Content &amp; Images
        </h2>
        <p class="text-white/90 text-sm mt-2">Edit meta title, description, images, and main content. All content on the live website can be updated here.</p>
    </div>
    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
            @forelse($sitePages as $page)
                <a href="{{ route('admin.cms-pages.edit', $page) }}" class="flex items-center justify-between p-6 min-h-[88px] rounded-xl bg-gradient-to-br from-gray-50 to-white border border-gray-100 hover:border-gold hover:from-amber-50/50 hover:to-white hover:shadow-lg transition-all duration-200 group">
                    <span class="text-lg font-semibold text-gray-800 group-hover:text-navy">{{ $page->title }}</span>
                    <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-100 text-amber-800 text-sm font-semibold group-hover:bg-gold group-hover:text-white transition-colors">Edit →</span>
                </a>
            @empty
                <p class="col-span-full text-gray-500 p-4">No site pages yet. Run: <code class="bg-gray-100 px-2 py-0.5 rounded text-sm">php artisan db:seed --class=SitePagesSeeder</code></p>
            @endforelse
        </div>
        <p class="mt-5 text-sm text-gray-500">These match your main navigation: Home, About Us, Courses, Student Services, Success Stories, Contact Us.</p>
    </div>
</div>

{{-- Contact Management & Admin Users --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    {{-- Contact Management --}}
    <div class="lg:col-span-2 overflow-hidden rounded-2xl shadow-card border border-gray-100 bg-white">
        <div class="bg-gradient-to-r from-rose-500 to-pink-500 px-5 py-4">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-white/25 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">Contact Management</h2>
                        <p class="text-white/90 text-sm">Form submissions from your website</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <a href="{{ route('admin.contacts.index') }}" class="px-3 py-1.5 rounded-lg bg-white/20 text-white text-sm font-medium hover:bg-white/30 transition-colors">All</a>
                    <a href="{{ route('admin.contacts.index') }}?unread=1" class="px-3 py-1.5 rounded-lg bg-white text-pink-600 text-sm font-semibold hover:bg-white/90 transition-colors">
                        Unread @if($unreadContactCount > 0)<span class="ml-0.5">({{ $unreadContactCount }})</span>@endif
                    </a>
                    <a href="{{ route('admin.contacts.index') }}" class="px-3 py-1.5 rounded-lg border border-white/50 text-white text-sm font-medium hover:bg-white/20 transition-colors">View all →</a>
                </div>
            </div>
        </div>
        <div class="max-h-80 overflow-y-auto">
            @if($contactSubmissions->isEmpty())
                <div class="p-12 text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 font-medium">No contact submissions yet</p>
                    <p class="text-gray-500 text-sm mt-1">Queries will appear when visitors use the contact form</p>
                </div>
            @else
                <table class="min-w-full">
                    <thead class="bg-gray-50 sticky top-0">
                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden sm:table-cell">Subject</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($contactSubmissions as $sub)
                            <tr class="{{ !$sub->is_read ? 'bg-rose-50/30' : '' }} hover:bg-gray-50/50 transition-colors">
                                <td class="px-5 py-4 font-medium text-gray-900">{{ $sub->full_name }}</td>
                                <td class="px-5 py-4 text-gray-600 text-sm">{{ Str::limit($sub->email, 28) }}</td>
                                <td class="px-5 py-4 text-gray-600 text-sm hidden sm:table-cell">{{ Str::limit($sub->subject ?? '—', 20) }}</td>
                                <td class="px-5 py-4 text-gray-500 text-sm whitespace-nowrap">{{ $sub->created_at->format('M j, Y') }}</td>
                                <td class="px-5 py-4 text-right">
                                    <a href="{{ route('admin.contacts.show', $sub) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-rose-100 text-rose-700 text-sm font-medium hover:bg-rose-200 transition-colors">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    {{-- Admin Users --}}
    <div class="overflow-hidden rounded-2xl shadow-card border border-gray-100 bg-white">
        <div class="bg-gradient-to-r from-cyan-500 to-teal-500 px-5 py-5">
            <div class="w-12 h-12 rounded-xl bg-white/25 flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <h2 class="text-lg font-bold text-white">Admin Users</h2>
            <p class="text-white/90 text-sm mt-0.5">Manage accounts and permissions</p>
        </div>
        <div class="p-6 space-y-4">
            <a href="{{ route('admin.users.index') }}" class="flex items-center justify-between p-4 rounded-xl bg-gray-50 hover:bg-cyan-50 border border-transparent hover:border-cyan-100 transition-all group">
                <span class="font-medium text-gray-700 group-hover:text-cyan-800">All Admin Users</span>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('admin.users.create') }}" class="flex items-center justify-center gap-2 w-full py-4 rounded-xl bg-navy text-white font-semibold hover:bg-navy-dark shadow-sm transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add New Admin
            </a>
            <a href="{{ route('admin.users.index') }}" class="block text-center text-cyan-600 font-medium text-sm hover:text-cyan-700 transition-colors">Manage Users →</a>
        </div>
    </div>
</div>
@endsection
