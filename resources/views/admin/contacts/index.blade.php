@extends('admin.layout')

@section('title', 'Contact Submissions')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Contact Management</h1>
        <p class="text-gray-600 mt-1">All contact form submissions @if(request('unread')) (unread) @endif</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="text-navy hover:underline font-medium">← Back to Dashboard</a>
</div>

@if(request('unread'))
    <p class="mb-4 text-sm text-gray-600">{{ $unreadCount }} unread message(s).</p>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    @if($submissions->isEmpty())
        <div class="p-12 text-center text-gray-500">
            <p>No contact submissions yet.</p>
            <p class="mt-2 text-sm">Submissions from the website contact form will appear here.</p>
        </div>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($submissions as $sub)
                    <tr class="{{ !$sub->is_read ? 'bg-blue-50/50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $sub->full_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $sub->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($sub->subject ?? '—', 30) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sub->created_at->format('M j, Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($sub->is_read)
                                <span class="text-xs text-gray-500">Read</span>
                            @else
                                <span class="text-xs font-medium text-blue-600">Unread</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                            <a href="{{ route('admin.contacts.show', $sub) }}" class="text-navy hover:underline font-medium">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $submissions->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
