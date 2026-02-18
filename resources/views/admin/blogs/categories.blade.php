@extends('admin.layout')

@section('title', 'Blog Categories')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-navy mt-2">Blog Categories</h1>
    </div>
    <a href="{{ route('admin.blogs.categories.create') }}" class="bg-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-navy-dark">Add Category</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded text-green-800">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    @if($categories->isEmpty())
        <div class="p-12 text-center text-gray-500">No categories yet. <a href="{{ route('admin.blogs.categories.create') }}" class="text-navy hover:underline">Add one</a>.</div>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posts</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categories as $cat)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $cat->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $cat->slug }}</td>
                        <td class="px-6 py-4">{{ $cat->posts_count }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.blogs.categories.edit', $cat) }}" class="text-navy hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 border-t">{{ $categories->links() }}</div>
    @endif
</div>

<p class="mt-4">
    <a href="{{ route('admin.blogs.posts') }}" class="text-navy hover:text-gold font-medium">→ Manage Blog Posts</a>
</p>
@endsection
