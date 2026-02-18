@extends('admin.layout')

@section('title', $p->title)

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.cms-pages.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to CMS Pages</a>
    <h1 class="text-2xl font-bold text-navy mt-2">{{ $p->title }}</h1>
    <p class="text-gray-500 text-sm">Slug: {{ $p->slug }} · {{ $p->is_published ? 'Published' : 'Draft' }}</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    @if($p->image)
        <img src="{{ $p->image }}" alt="" class="max-h-64 object-cover rounded-lg mb-4">
    @endif
    <div class="prose max-w-none">
        {!! $p->body !!}
    </div>
    <p class="mt-6">
        <a href="{{ route('admin.cms-pages.edit', $p) }}" class="text-gold hover:underline font-medium">Edit page</a>
    </p>
</div>
@endsection
