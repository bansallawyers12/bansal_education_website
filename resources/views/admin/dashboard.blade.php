@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">TOOLS</h1>
    <p class="text-gray-600 mt-1">Manage your website content and settings</p>
</div>

{{-- Site Pages (same as main nav: Home, About Us, Courses, etc.) --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <h2 class="text-lg font-bold text-navy mb-3 flex items-center gap-2">
        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
        </svg>
        Site Pages
    </h2>
    <p class="text-gray-600 text-sm mb-4">Edit meta title, description, images and content for each page on your website.</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        @forelse($sitePages as $page)
            <a href="{{ route('admin.cms-pages.edit', $page) }}" class="flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-gold hover:bg-amber-50/50 transition-colors group">
                <span class="font-medium text-gray-900 group-hover:text-navy">{{ $page->title }}</span>
                <span class="text-sm text-gold font-medium">Edit →</span>
            </a>
        @empty
            <p class="text-gray-500 col-span-full">No site pages yet. Run: <code class="bg-gray-100 px-1 rounded">php artisan db:seed --class=SitePagesSeeder</code></p>
        @endforelse
    </div>
    <p class="mt-3 text-xs text-gray-500">These match your main navigation: Home, About Us, Courses, Student Services, Success Stories, Contact Us.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    {{-- CMS Pages --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-900 mb-2">CMS Pages</h2>
        <p class="text-gray-600 text-sm mb-4">Manage website content, pages, and static information.</p>
        <div class="flex flex-wrap gap-2 mb-4">
            <a href="{{ route('admin.cms-pages.index') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">All CMS Pages</a>
        </div>
        <a href="{{ route('admin.cms-pages.index') }}" class="inline-flex items-center text-blue-600 font-medium text-sm hover:underline">
            → Manage CMS Pages
        </a>
    </div>

    {{-- Blogs Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-900 mb-2">Blogs Section</h2>
        <p class="text-gray-600 text-sm mb-4">Create and manage blog content, categories, and publications.</p>
        <div class="flex flex-wrap gap-2 mb-4">
            <a href="{{ route('admin.blogs.categories') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Blog Categories</a>
            <a href="{{ route('admin.blogs.posts') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Blog Posts</a>
        </div>
        <a href="{{ route('admin.blogs.posts') }}" class="inline-flex items-center text-blue-600 font-medium text-sm hover:underline">
            → Manage Blogs
        </a>
    </div>

    {{-- Case Studies --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-900 mb-2">Case Studies</h2>
        <p class="text-gray-600 text-sm mb-4">Manage recent case studies and legal precedents.</p>
        <div class="flex flex-wrap gap-2 mb-4">
            <a href="{{ route('admin.case-studies.index') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Recent Case Studies</a>
        </div>
        <a href="{{ route('admin.case-studies.index') }}" class="inline-flex items-center text-blue-600 font-medium text-sm hover:underline">
            → Manage Cases
        </a>
    </div>

    {{-- Contact Management --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-900 mb-2">Contact Management</h2>
        <p class="text-gray-600 text-sm mb-4">View and manage client consultation queries, contact form submissions, and lead inquiries.</p>
        <div class="flex flex-wrap gap-2 mb-4">
            <a href="{{ route('admin.contacts.index') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">All Contact Submissions</a>
            <a href="{{ route('admin.contacts.index') }}?unread=1" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Unread Messages</a>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-pink-600 font-medium text-sm hover:underline">
            → Manage Contacts
        </a>
    </div>

    {{-- Admin Users --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-900 mb-2">Admin Users</h2>
        <p class="text-gray-600 text-sm mb-4">Manage admin accounts and user permissions.</p>
        <div class="flex flex-wrap gap-2 mb-4">
            <a href="{{ route('admin.users.index') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">All Admin Users</a>
            <a href="{{ route('admin.users.create') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Add New Admin</a>
        </div>
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center text-blue-600 font-medium text-sm hover:underline">
            → Manage Users
        </a>
    </div>

    {{-- Appointments --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h2 class="text-lg font-bold text-gray-900 mb-2">Appointments</h2>
        <p class="text-gray-600 text-sm mb-4">Manage client appointments, calendar bookings, and scheduling.</p>
        <div class="flex flex-wrap gap-2 mb-4">
            <a href="{{ route('admin.appointments.index') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Appointment Listings</a>
            <a href="{{ route('admin.appointments.create') }}" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200">Add Appointment</a>
        </div>
        <a href="{{ route('admin.appointments.index') }}" class="inline-flex items-center text-blue-600 font-medium text-sm hover:underline">
            → Manage Appointments
        </a>
    </div>
</div>
@endsection
