@extends('layouts.app')

@section('title', 'Student Services - Bansal Education Group')
@section('description', 'Comprehensive student services including education counselling, admission support, and career guidance for your Australian education journey.')

@section('content')
<!-- Services Hero Section -->
<section class="relative bg-gradient-to-br from-blue-50 to-indigo-100 py-20 lg:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        @if($page && $page->image)
        <div class="mb-8 max-w-2xl mx-auto">
            <img src="{{ str_starts_with($page->image, 'http') ? $page->image : asset(ltrim($page->image, '/')) }}" alt="{{ $page->title ?? 'Student Services' }}" class="rounded-2xl shadow-xl w-full object-cover">
        </div>
        @endif
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                Our
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-yellow-500">
                    Student Services
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive support designed to guide you through every step of your educational journey in Australia.
            </p>
        </div>
    </div>
</section>

@if($page && $page->body)
{{-- Content from Admin: what you edit here is what visitors see --}}
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg prose-headings:text-navy prose-headings:font-bold prose-p:text-gray-700 prose-strong:text-blue-900 max-w-none">{!! $page->body !!}</div>
    </div>
</section>
@else
{{-- Default content when nothing is edited in admin --}}
<!-- Introduction Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-blue-50 to-yellow-50 rounded-2xl p-8 md:p-12 border-l-4 border-yellow-500">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                </div>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed max-w-4xl mx-auto text-center">
                    At Bansal Education, we provide <span class="font-semibold text-blue-900">personalised and reliable student services</span> to ensure your study experience in Australia is smooth, stress-free, and successful. From choosing the right course to securing admission and building your future career, our expert team supports you at every stage.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Main Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-20">
            <div class="bg-gradient-to-br from-blue-50 to-yellow-50 rounded-2xl p-8 md:p-10 shadow-lg border-l-4 border-blue-900">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Education Counselling</h2>
                        <p class="text-xl text-gray-700 mb-6">Personalised guidance to help you make confident academic decisions.</p>
                        <p class="text-lg text-gray-600 mb-6">Our education counselling services are designed to match you with the right course, university, and career pathway. We offer university selection, course recommendations, application assistance, and scholarship guidance. End-to-end support completed within 2–4 weeks.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-yellow-50 to-blue-50 rounded-2xl p-8 md:p-10 shadow-lg border-l-4 border-yellow-500">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Admission Support</h2>
                        <p class="text-xl text-gray-700 mb-6">Smooth, accurate, and hassle-free admission processing.</p>
                        <p class="text-lg text-gray-600 mb-6">We ensure your application is professionally prepared, error-free, and submitted on time. Our support includes document preparation, Statement of Purpose (SOP) writing, interview training, and application tracking. Process completed within 3–6 weeks.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-yellow-50 rounded-2xl p-8 md:p-10 shadow-lg border-l-4 border-blue-900">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Career Guidance</h2>
                        <p class="text-xl text-gray-700 mb-6">Helping you build a strong foundation for your future career in Australia.</p>
                        <p class="text-lg text-gray-600 mb-6">Our career-focused support includes industry-aligned course selection, job market trends, skill development guidance, and resume or portfolio building. Support continues throughout your journey in Australia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-yellow-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Get Started?</h2>
        <p class="text-xl text-white mb-8 max-w-3xl mx-auto">Book your free consultation today and let our experts guide you through your Australian education journey.</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">Book Free Consultation</a>
    </div>
</section>
@endsection
