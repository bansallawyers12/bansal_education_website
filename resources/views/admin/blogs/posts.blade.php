@extends('admin.layout')

@section('title', 'Blog Posts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-navy mt-2">Blog Posts</h1>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center text-gray-500">
    <p>No blog posts yet. Add a blog post model when ready.</p>
    <p class="mt-2"><a href="{{ route('admin.blogs.categories') }}" class="text-navy hover:underline">Manage categories</a></p>
</div>
@endsection
