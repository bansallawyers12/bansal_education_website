@extends('admin.layout')

@section('title', 'Admin Users')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-navy mt-2">Admin Users</h1>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-navy-dark">Add New Admin</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded text-green-800">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    @if($users->isEmpty())
        <div class="p-12 text-center text-gray-500">No admin users yet. <a href="{{ route('admin.users.create') }}" class="text-navy hover:underline">Add one</a>.</div>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Added</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-500 text-sm">{{ $user->created_at->format('M j, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 border-t">{{ $users->links() }}</div>
    @endif
</div>
@endsection
