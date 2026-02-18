@extends('layouts.app')

@section('title', 'Email - Bansal Education Group')
@section('description', 'Email management and CRM integration for Bansal Education Group.')

@section('content')
<div class="min-h-[calc(100vh-12rem)]">
    <iframe
        src="{{ config('services.crm_ses_url', 'http://localhost/CRM-SES/public') }}"
        class="w-full border-0 rounded-lg"
        style="min-height: calc(100vh - 12rem); height: 800px;"
        title="Email CRM Dashboard"
    ></iframe>
</div>
@endsection
