@extends('admin.layout')

@section('title', $caseStudy->title)

@section('content')
<div class="mb-6 flex justify-between items-start">
    <div>
        <a href="{{ route('admin.case-studies.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Case Studies</a>
        <h1 class="text-2xl font-bold text-navy mt-2">{{ $caseStudy->title }}</h1>
        <p class="text-gray-500 text-sm">{{ $caseStudy->date?->format('F j, Y') ?? '—' }} · {{ $caseStudy->is_published ? 'Published' : 'Draft' }}</p>
    </div>
    <a href="{{ route('admin.case-studies.edit', $caseStudy) }}" class="bg-gold text-navy px-4 py-2 rounded-lg font-medium hover:bg-gold-light">Edit</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-4xl">
    <div class="prose max-w-none text-gray-700 whitespace-pre-wrap">{{ $caseStudy->content ?: 'No content.' }}</div>
</div>
@endsection
