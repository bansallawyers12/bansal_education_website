@extends('admin.layout')

@section('title', 'Contact Submissions')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-bold text-navy font-display">Contact Management</h1>
        <p class="text-gray-600 mt-1">All submissions from the website contact form @if(request('unread')) <span class="text-pink-600 font-medium">· Unread only</span> @endif</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white shadow-card border border-gray-100 hover:border-gold/30 hover:shadow-card-hover transition-all text-navy font-medium text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Back to Dashboard
    </a>
</div>

@if(request('unread'))
    <div class="mb-4 px-4 py-3 rounded-xl bg-pink-50 border border-pink-100 text-pink-800 text-sm font-medium">
        {{ $unreadCount }} unread message(s)
    </div>
@endif

<div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-hidden">
    @if($submissions->isEmpty())
        <div class="p-16 text-center">
            <div class="w-20 h-20 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-gray-600 font-medium">No contact submissions yet</p>
            <p class="text-gray-500 text-sm mt-1">Submissions will appear here when visitors use the contact form</p>
        </div>
    @else
        <table class="min-w-full">
            <thead class="bg-gray-50/80 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Subject</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($submissions as $sub)
                    <tr class="{{ !$sub->is_read ? 'bg-pink-50/30' : '' }} hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $sub->full_name }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $sub->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 hidden md:table-cell">{{ Str::limit($sub->subject ?? '—', 30) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $sub->created_at->format('M j, Y H:i') }}</td>
                        <td class="px-6 py-4">
                            @if($sub->is_read)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Read</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-700">New</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.contacts.show', $sub) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-navy text-white text-sm font-medium hover:bg-navy-dark transition-colors">
                                View
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
            {{ $submissions->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
