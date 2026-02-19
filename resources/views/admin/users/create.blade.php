@extends('admin.layout')

@section('title', 'Add Admin User')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-navy hover:text-gold font-medium text-sm transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Admin Users
    </a>
    <h1 class="text-2xl font-bold text-navy font-display mt-2">Add New Admin</h1>
</div>

<form method="POST" action="{{ route('admin.users.store') }}" class="bg-white rounded-2xl shadow-card border border-gray-100 p-8 space-y-5 max-w-md">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-navy mb-1">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-navy mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-navy mb-1">Password</label>
        <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-navy mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
    </div>
    <button type="submit" class="bg-navy text-white px-6 py-3 rounded-xl font-semibold hover:bg-navy-dark shadow-card transition-all">Create Admin</button>
</form>
@endsection
