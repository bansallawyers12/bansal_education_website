@extends('admin.layout')

@section('title', 'Edit: ' . $p->title)

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Dashboard</a>
    <span class="text-gray-400 mx-2">·</span>
    <a href="{{ route('admin.cms-pages.index') }}" class="text-navy hover:text-gold font-medium text-sm">All Pages</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Edit Page: {{ $p->title }}</h1>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800 text-sm">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.cms-pages.update', $p) }}" enctype="multipart/form-data" class="space-y-8">
    @csrf
    @method('PUT')

    {{-- Main Content - Prominent first --}}
    <div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-navy to-navy-dark px-6 py-4">
            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Page Content (what visitors see)
            </h2>
            <p class="text-blue-100 text-sm mt-0.5">Edit headings, paragraphs, lists — format with bold, links, etc.</p>
        </div>
        <div class="p-6">
            <textarea name="body" id="body" rows="16" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold font-mono text-sm" placeholder="Add or replace page content here. Use the toolbar above to format text.">{{ old('body', $contentToEdit ?? $p->body) }}</textarea>
            <p class="text-xs text-gray-500 mt-2">
                @if($p->body)
                    Showing saved content. Edit and save to update the live page.
                @else
                    Showing current live page content above. Edit and save to add this as custom content on the website.
                @endif
            </p>
            @error('body')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    {{-- Page Image with upload --}}
    <div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
            <h2 class="text-lg font-bold text-navy flex items-center gap-2">
                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6 6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Page Image (hero/feature)
            </h2>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex flex-col sm:flex-row gap-6 items-start">
                <div class="flex-shrink-0">
                    <div id="image-preview" class="w-48 h-32 rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 flex items-center justify-center overflow-hidden">
                        @if($p->image)
                        <img src="{{ str_starts_with($p->image, 'http') ? $p->image : asset(ltrim($p->image, '/')) }}" alt="Current" class="w-full h-full object-cover" id="preview-img">
                        @else
                        <span class="text-gray-400 text-sm text-center px-2" id="preview-placeholder">No custom image<br><span class="text-xs">(Default design on live page)</span></span>
                        @endif
                    </div>
                </div>
                <div class="flex-1 space-y-3 min-w-0">
                    <label class="block">
                        <span class="text-sm font-medium text-navy mb-1 block">Upload new image</span>
                        <input type="file" name="image_file" id="image_file" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-medium file:bg-navy file:text-white hover:file:bg-navy-dark file:cursor-pointer">
                    </label>
                    <p class="text-xs text-gray-500">JPG, PNG, GIF or WebP. Max 5MB. Or enter URL below.</p>
                    <div>
                        <label for="image" class="block text-sm font-medium text-navy mb-1">Or use image path/URL</label>
                        <input type="text" name="image" id="image" value="{{ old('image', $p->image) }}" placeholder="e.g. hero.jpg or https://..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Page settings & SEO --}}
    <div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
            <h2 class="text-base font-bold text-navy flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Title, slug & SEO
            </h2>
        </div>
        <div id="seo-section" class="px-6 pb-6 pt-4">
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                </div>
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-navy mb-1">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $p->meta_title) }}" placeholder="e.g. Courses - Bansal Education Group" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
                </div>
                <div>
                    <label for="meta_description" class="block text-sm font-medium text-navy mb-1">Meta Description (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold" placeholder="Short description for search engines">{{ old('meta_description', $p->meta_description) }}</textarea>
                </div>
                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $p->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-navy focus:ring-gold">
                        <span class="text-sm text-gray-600">Published</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="bg-gradient-to-r from-navy to-navy-dark text-white px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition-opacity shadow-card">
            Update Page
        </button>
        <a href="{{ route($p->slug === 'home' ? 'home' : $p->slug) }}" target="_blank" class="text-sm text-navy hover:text-gold font-medium">Preview on site →</a>
    </div>
</form>

{{-- Summernote WYSIWYG - free, no API key --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#body').summernote({
        height: 380,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ],
        placeholder: 'Type or paste content here. Use toolbar to format text, add headings, lists, links.'
    });

    // CRITICAL: Sync Summernote content to textarea before form submit so body is saved
    document.querySelector('form').addEventListener('submit', function() {
        $('#body').val($('#body').summernote('code'));
    });
});
</script>

{{-- Image preview --}}
<script>
document.getElementById('image_file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('preview-placeholder');
    let img = document.getElementById('preview-img');

    if (file) {
        const reader = new FileReader();
        reader.onload = function() {
            if (!img) {
                img = document.createElement('img');
                img.id = 'preview-img';
                img.className = 'w-full h-full object-cover';
                preview.innerHTML = '';
                preview.appendChild(img);
            }
            placeholder?.remove();
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('image').addEventListener('input', function() {
    const val = this.value.trim();
    const preview = document.getElementById('image-preview');
    let img = document.getElementById('preview-img');
    const placeholder = document.getElementById('preview-placeholder');

    if (val) {
        if (!img) {
            img = document.createElement('img');
            img.id = 'preview-img';
            img.className = 'w-full h-full object-cover';
            preview.innerHTML = '';
            preview.appendChild(img);
        }
        img.src = val.startsWith('http') ? val : (window.location.origin + '/' + val.replace(/^\//, ''));
        img.style.display = 'block';
        placeholder?.remove();
    }
});
</script>
@endsection
