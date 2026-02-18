@extends('admin.layout')

@section('title', 'Contact Message')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.contacts.index') }}" class="text-navy hover:text-gold font-medium text-sm">← Back to Contacts</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-2xl">
    <h1 class="text-2xl font-bold text-navy mb-4">Contact Submission</h1>

    <dl class="space-y-3">
        <div>
            <dt class="text-xs font-medium text-gray-500 uppercase">Name</dt>
            <dd class="text-gray-900">{{ $sub->full_name }}</dd>
        </div>
        <div>
            <dt class="text-xs font-medium text-gray-500 uppercase">Email</dt>
            <dd class="text-gray-900"><a href="mailto:{{ $sub->email }}" class="text-navy hover:underline">{{ $sub->email }}</a></dd>
        </div>
        @if($sub->phone)
        <div>
            <dt class="text-xs font-medium text-gray-500 uppercase">Phone</dt>
            <dd class="text-gray-900">{{ $sub->phone }}</dd>
        </div>
        @endif
        @if($sub->subject)
        <div>
            <dt class="text-xs font-medium text-gray-500 uppercase">Subject</dt>
            <dd class="text-gray-900">{{ $sub->subject }}</dd>
        </div>
        @endif
        <div>
            <dt class="text-xs font-medium text-gray-500 uppercase">Date</dt>
            <dd class="text-gray-900">{{ $sub->created_at->format('M j, Y H:i') }}</dd>
        </div>
        @if($sub->message)
        <div>
            <dt class="text-xs font-medium text-gray-500 uppercase">Message</dt>
            <dd class="text-gray-900 whitespace-pre-wrap">{{ $sub->message }}</dd>
        </div>
        @endif
    </dl>
</div>
@endsection
