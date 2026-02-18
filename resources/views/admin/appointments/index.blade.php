@extends('admin.layout')

@section('title', 'Appointments')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-navy mt-2">Appointments</h1>
    </div>
    <a href="{{ route('admin.appointments.create') }}" class="bg-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-navy-dark">Add Appointment</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded text-green-800">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center text-gray-500">
    <p>No appointments yet. Add an appointment or connect an appointments model when ready.</p>
</div>
@endsection
