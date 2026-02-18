@extends('admin.layout')

@section('title', 'Add Appointment')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.appointments.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Appointments</a>
    <h1 class="text-2xl font-bold text-navy mt-2">Add Appointment</h1>
</div>

<form method="POST" action="{{ route('admin.appointments.store') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4 max-w-md">
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
        <label for="phone" class="block text-sm font-medium text-navy mb-1">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
    </div>
    <div>
        <label for="date" class="block text-sm font-medium text-navy mb-1">Date</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
        @error('date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="time_slot" class="block text-sm font-medium text-navy mb-1">Time slot</label>
        <input type="text" name="time_slot" id="time_slot" value="{{ old('time_slot') }}" placeholder="e.g. 10:00 AM" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">
    </div>
    <div>
        <label for="message" class="block text-sm font-medium text-navy mb-1">Message</label>
        <textarea name="message" id="message" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold">{{ old('message') }}</textarea>
    </div>
    <button type="submit" class="bg-navy text-white px-6 py-2 rounded-lg font-medium hover:bg-navy-dark">Create Appointment</button>
</form>
@endsection
