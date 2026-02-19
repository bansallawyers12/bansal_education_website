@extends('layouts.app')

@section('title', 'Success Stories - Bansal Education Group')
@section('description', 'Read inspiring success stories from our students who achieved their dreams in Australia\'s top universities with our expert guidance.')

@section('content')
@if($page && $page->body)
{{-- Custom content from Admin: Edit in Site Pages → Success Stories --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none text-gray-700">{!! $page->body !!}</div>
    </div>
</section>
@endif
<!-- Success Stories Hero Section -->
<section class="relative bg-gradient-to-br from-blue-50 to-indigo-100 py-20 lg:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($page && $page->image)
        <div class="mb-8 max-w-2xl mx-auto">
            <img src="{{ str_starts_with($page->image, 'http') ? $page->image : asset(ltrim($page->image, '/')) }}" alt="{{ $page->title ?? 'Success Stories' }}" class="rounded-2xl shadow-xl w-full object-cover">
        </div>
        @endif
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                Student
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-yellow-500">
                    Success Stories
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Hear from our successful students who achieved their dreams in Australia's top universities.
            </p>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">A</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Aisha Patel</h4>
                        <p class="text-gray-600 text-sm">University of Melbourne - Engineering</p>
                    </div>
                </div>
                <p class="text-gray-700 italic mb-4">"Bansal Education Group helped me secure admission to University of Melbourne for Civil Engineering. Their guidance throughout the application process was exceptional. I couldn't have done it without them!"</p>
                <div class="flex text-yellow-400 mb-2">★★★★★</div>
                <div class="text-sm text-gray-500">Admitted: 2023 | Course: Bachelor of Civil Engineering</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-blue-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">R</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Rajesh Kumar</h4>
                        <p class="text-gray-600 text-sm">UNSW Sydney - Computer Science</p>
                    </div>
                </div>
                <p class="text-gray-700 italic mb-4">"The team at Bansal Education Group made my dream of studying at UNSW a reality. Their expertise in Australian university admissions is unmatched. Highly recommended!"</p>
                <div class="flex text-yellow-400 mb-2">★★★★★</div>
                <div class="text-sm text-gray-500">Admitted: 2023 | Course: Master of Computer Science</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">S</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                        <p class="text-gray-600 text-sm">University of Queensland - MBA</p>
                    </div>
                </div>
                <p class="text-gray-700 italic mb-4">"From course selection to visa application, Bansal Education Group provided comprehensive support. I'm now pursuing my MBA at UQ and couldn't be happier with my choice!"</p>
                <div class="flex text-yellow-400 mb-2">★★★★★</div>
                <div class="text-sm text-gray-500">Admitted: 2023 | Course: Master of Business Administration</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-blue-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">M</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Michael Chen</h4>
                        <p class="text-gray-600 text-sm">Monash University - Medicine</p>
                    </div>
                </div>
                <p class="text-gray-700 italic mb-4">"Getting into medical school seemed impossible, but Bansal Education Group made it happen. Their interview preparation and application support were outstanding."</p>
                <div class="flex text-yellow-400 mb-2">★★★★★</div>
                <div class="text-sm text-gray-500">Admitted: 2022 | Course: Bachelor of Medicine</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">P</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Priya Sharma</h4>
                        <p class="text-gray-600 text-sm">University of Sydney - Data Science</p>
                    </div>
                </div>
                <p class="text-gray-700 italic mb-4">"The career guidance I received helped me choose the perfect course. Now I'm working as a Data Scientist at a top tech company in Sydney!"</p>
                <div class="flex text-yellow-400 mb-2">★★★★★</div>
                <div class="text-sm text-gray-500">Admitted: 2022 | Course: Master of Data Science</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-blue-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">D</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">David Wilson</h4>
                        <p class="text-gray-600 text-sm">RMIT University - Architecture</p>
                    </div>
                </div>
                <p class="text-gray-700 italic mb-4">"Bansal Education Group's support didn't end with admission. They helped me with accommodation and settling into Melbourne. Truly comprehensive service!"</p>
                <div class="flex text-yellow-400 mb-2">★★★★★</div>
                <div class="text-sm text-gray-500">Admitted: 2023 | Course: Bachelor of Architecture</div>
            </div>
        </div>
    </div>
</section>

<!-- Success Statistics Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Success in Numbers</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">The results speak for themselves - our track record of student success is unmatched.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center bg-white p-8 rounded-xl shadow-lg">
                <div class="text-4xl font-bold text-blue-900 mb-2">10,000+</div>
                <div class="text-gray-600">Students Successfully Placed</div>
            </div>
            <div class="text-center bg-white p-8 rounded-xl shadow-lg">
                <div class="text-4xl font-bold text-blue-900 mb-2">95%</div>
                <div class="text-gray-600">University Admission Success Rate</div>
            </div>
            <div class="text-center bg-white p-8 rounded-xl shadow-lg">
                <div class="text-4xl font-bold text-blue-900 mb-2">100+</div>
                <div class="text-gray-600">Partner Universities</div>
            </div>
            <div class="text-center bg-white p-8 rounded-xl shadow-lg">
                <div class="text-4xl font-bold text-blue-900 mb-2">10+</div>
                <div class="text-gray-600">Years of Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-yellow-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Write Your Success Story?</h2>
        <p class="text-xl text-white mb-8 max-w-3xl mx-auto">Join thousands of successful students who achieved their dreams with our expert guidance and support.</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl">Start Your Journey Today</a>
    </div>
</section>
@endsection
