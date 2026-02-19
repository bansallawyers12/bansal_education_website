@extends('admin.layout')

@section('title', 'CMS Pages')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-navy hover:text-gold font-medium text-sm transition-colors mb-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Dashboard
        </a>
        <h1 class="text-2xl font-bold text-navy font-display">All CMS Pages</h1>
    </div>
    <a href="{{ route('admin.cms-pages.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-navy text-white font-medium hover:bg-navy-dark shadow-card transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add Page
    </a>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-xl text-emerald-800 text-sm font-medium">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-hidden">
    @if($pages->isEmpty())
        <div class="p-16 text-center">
            <div class="w-20 h-20 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <p class="text-gray-600 font-medium">No pages yet</p>
            <p class="text-gray-500 text-sm mt-1"><a href="{{ route('admin.cms-pages.create') }}" class="text-navy hover:text-gold font-medium">Create one</a></p>
        </div>
    @else
        <table class="min-w-full">
            <thead class="bg-gray-50/80 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($pages as $p)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $p->title }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->slug }}</td>
                        <td class="px-6 py-4">
                            @if($p->is_published)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">Published</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.cms-pages.show', $p) }}" class="text-gray-600 hover:text-navy font-medium text-sm">View</a>
                            <a href="{{ route('admin.cms-pages.edit', $p) }}" class="text-gold hover:text-gold-dark font-medium text-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">{{ $pages->links() }}</div>
    @endif
</div>
@endsection
