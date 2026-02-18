@extends('admin.layout')

@section('title', 'Case Studies')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Dashboard</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Case Studies</h1>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center text-gray-500">
    <p>No case studies yet. Add a case study model when ready.</p>
</div>
@endsection
