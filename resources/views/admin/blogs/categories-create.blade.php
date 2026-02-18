@extends('admin.layout')

@section('title', 'Add Blog Category')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.blogs.categories') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Categories</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Add Category</h1>
</div>

<form method="POST" action="{{ route('admin.blogs.categories.store') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4 max-w-md">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-navy mb-1">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
    </div>
    <button type="submit" class="bg-navy text-white px-6 py-2 rounded-lg font-medium hover:bg-navy-dark">Create Category</button>
</form>
@endsection
