@extends('admin.layout')

@section('title', 'Edit: ' . $p->title)

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.cms-pages.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to CMS Pages</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Edit Page: {{ $p->title }}</h1>
</div>

<form method="POST" action="{{ route('admin.cms-pages.update', $p) }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4 max-w-2xl">
    @csrf
    @method('PUT')
    <div>
        <label for="title" class="block text-sm font-medium text-navy mb-1">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $p->title) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-navy mb-1">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $p->slug) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="border-t border-gray-200 pt-4 mt-4">
        <h3 class="text-sm font-bold text-navy mb-2">SEO / Meta (used on the live page)</h3>
        <div class="space-y-3">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-navy mb-1">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $p->meta_title) }}" placeholder="e.g. About Us - Bansal Education Group" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
                @error('meta_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="meta_description" class="block text-sm font-medium text-navy mb-1">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold" placeholder="Short description for search engines (e.g. Learn about Bansal Education...)">{{ old('meta_description', $p->meta_description) }}</textarea>
                @error('meta_description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>
    <div>
        <label for="body" class="block text-sm font-medium text-navy mb-1">Content (HTML)</label>
        <textarea name="body" id="body" rows="12" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">{{ old('body', $p->body) }}</textarea>
        @error('body')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-navy mb-1">Image URL or path</label>
        <input type="text" name="image" id="image" value="{{ old('image', $p->image) }}" placeholder="e.g. /logo.png or full URL" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        <p class="text-xs text-gray-500 mt-1">Main image for this page. Use path from public folder (e.g. /hero.jpg) or full URL.</p>
    </div>
    <div class="flex items-center">
        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $p->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-navy focus:ring-gold">
        <label for="is_published" class="ml-2 text-sm text-gray-600">Published</label>
    </div>
    <button type="submit" class="bg-navy text-white px-6 py-2 rounded-lg font-medium hover:bg-navy-dark">Update Page</button>
</form>
@endsection
