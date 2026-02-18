@extends('admin.layout')

@section('title', 'CMS Pages')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-navy mt-2">All CMS Pages</h1>
    </div>
    <a href="{{ route('admin.cms-pages.create') }}" class="bg-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-navy-dark">Add Page</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded text-green-800">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    @if($pages->isEmpty())
        <div class="p-12 text-center text-gray-500">No pages yet. <a href="{{ route('admin.cms-pages.create') }}" class="text-navy hover:underline">Create one</a>.</div>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($pages as $p)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $p->title }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->slug }}</td>
                        <td class="px-6 py-4">{{ $p->is_published ? 'Published' : 'Draft' }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.cms-pages.show', $p) }}" class="text-navy hover:underline">View</a>
                            <a href="{{ route('admin.cms-pages.edit', $p) }}" class="text-gold hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 border-t">{{ $pages->links() }}</div>
    @endif
</div>
@endsection
