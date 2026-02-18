@extends('admin.layout')

@section('title', 'Edit Case Study')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.case-studies.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Case Studies</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Edit Case Study</h1>
</div>

<form method="POST" action="{{ route('admin.case-studies.update', $caseStudy) }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4 max-w-2xl">
    @csrf
    @method('PUT')
    <div>
        <label for="title" class="block text-sm font-medium text-navy mb-1">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $caseStudy->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-navy mb-1">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $caseStudy->slug) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="date" class="block text-sm font-medium text-navy mb-1">Date</label>
        <input type="date" name="date" id="date" value="{{ old('date', $caseStudy->date?->format('Y-m-d')) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="content" class="block text-sm font-medium text-navy mb-1">Content</label>
        <textarea name="content" id="content" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">{{ old('content', $caseStudy->content) }}</textarea>
        @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="flex items-center">
        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $caseStudy->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-navy focus:ring-gold">
        <label for="is_published" class="ml-2 text-sm text-gray-700">Published</label>
    </div>
    <button type="submit" class="bg-navy text-white px-6 py-2 rounded-lg font-medium hover:bg-navy-dark">Update Case Study</button>
</form>
@endsection
