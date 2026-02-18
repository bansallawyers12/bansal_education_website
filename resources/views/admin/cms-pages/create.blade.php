@extends('admin.layout')

@section('title', 'Add CMS Page')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.cms-pages.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to CMS Pages</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Add Page</h1>
</div>

<form method="POST" action="{{ route('admin.cms-pages.store') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4 max-w-2xl">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-navy mb-1">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-navy mb-1">Slug (optional, auto from title)</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="e.g. about-us" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="body" class="block text-sm font-medium text-navy mb-1">Content (HTML)</label>
        <textarea name="body" id="body" rows="12" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">{{ old('body') }}</textarea>
        @error('body')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-navy mb-1">Image URL or path (e.g. /images/hero.jpg)</label>
        <input type="text" name="image" id="image" value="{{ old('image') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
    </div>
    <div class="border-t border-gray-200 pt-4 mt-4">
        <h3 class="text-sm font-semibold text-navy mb-2">SEO / Meta (optional)</h3>
        <div class="space-y-3">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-navy mb-1">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
                @error('meta_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="meta_description" class="block text-sm font-medium text-navy mb-1">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">{{ old('meta_description') }}</textarea>
                @error('meta_description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>
    <div class="flex items-center">
        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="rounded border-gray-300 text-navy focus:ring-gold">
        <label for="is_published" class="ml-2 text-sm text-gray-600">Published</label>
    </div>
    <button type="submit" class="bg-navy text-white px-6 py-2 rounded-lg font-medium hover:bg-navy-dark">Create Page</button>
</form>
@endsection
