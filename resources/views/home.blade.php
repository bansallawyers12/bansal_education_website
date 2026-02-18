@extends('layouts.app')

@section('title', 'Home - Bansal Education Group')
@section('description', 'Australia\'s most trusted education consultant. Expert guidance for university admissions, course selection, and career planning in Australia\'s top universities.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-50 to-indigo-100 py-20 lg:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <div class="mb-4">
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-2 rounded-full">
                        🇦🇺 Australia's Most Trusted Education Consultant
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                    Your Pathway to
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-yellow-500">
                        Quality Education
                    </span>
                </h1>
                <p class="mt-6 text-xl text-gray-600 leading-relaxed">
                    Expert guidance for university admissions, course selection, and career planning in Australia's top universities.
                    Join thousands of successful students who achieved their dreams with our proven consultancy services.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('contact') }}" class="bg-gradient-to-r from-blue-900 to-blue-800 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-yellow-500 hover:to-yellow-400 hover:text-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 border border-yellow-500">
                        Book Free Consultation
                    </a>
                    <a href="{{ route('about') }}" class="border-2 border-blue-900 text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-900 hover:text-white transition-all duration-200">
                        Learn More
                    </a>
                </div>
                <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-900">10+</div>
                        <div class="text-sm text-gray-600">Years Experience</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-900">10,000+</div>
                        <div class="text-sm text-gray-600">Students Placed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-900">95%</div>
                        <div class="text-sm text-gray-600">Success Rate</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-white rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Trusted by Students</h3>
                        <p class="text-gray-600">Proven track record of successful university placements in Australia's top institutions.</p>
                        <div class="mt-4 flex justify-center space-x-4">
                            <div class="text-center">
                                <div class="text-lg font-bold text-blue-900">100+</div>
                                <div class="text-xs text-gray-500">Partner Universities</div>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-blue-900">Free</div>
                                <div class="text-xs text-gray-500">Consultation</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-pink-400 rounded-full opacity-20"></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Student Services -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Student Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive support services designed to guide you through every step of your educational journey in Australia.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-50 to-yellow-50 p-8 rounded-xl hover:shadow-lg transition-shadow duration-300 border border-yellow-200">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Education Counselling</h3>
                <ul class="space-y-3 text-gray-600 mb-6">
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>University selection guidance</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Course recommendation based on career goals</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Application assistance</li>
                </ul>
                <div class="bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-semibold text-center">Complete guidance in 2-4 weeks</div>
            </div>
            <div class="bg-gradient-to-br from-yellow-50 to-blue-50 p-8 rounded-xl hover:shadow-lg transition-shadow duration-300 border border-blue-200">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Admission Support</h3>
                <ul class="space-y-3 text-gray-600 mb-6">
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Document preparation</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Statement of Purpose writing</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Interview preparation</li>
                </ul>
                <div class="bg-gradient-to-r from-yellow-500 to-blue-900 text-white px-4 py-2 rounded-lg text-sm font-semibold text-center">Application process in 3-6 weeks</div>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-yellow-50 p-8 rounded-xl hover:shadow-lg transition-shadow duration-300 border border-yellow-200">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Career Guidance</h3>
                <ul class="space-y-3 text-gray-600 mb-6">
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Industry-focused course selection</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Job market analysis</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Skill development guidance</li>
                </ul>
                <div class="bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-semibold text-center">Career support throughout your journey</div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Australian Courses -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Popular Australian Courses</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Explore top courses offered by Australia's leading universities and institutions</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-yellow-200">
                <div class="h-48 bg-gradient-to-br from-blue-900 to-yellow-500 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Engineering Programs</h3>
                    <p class="text-gray-600 mb-4">Civil, Mechanical, Software Engineering from top Australian universities.</p>
                    <a href="{{ route('contact') }}" class="w-full bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-yellow-500 hover:to-blue-900 transition-colors duration-200 text-center block">Learn More</a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-blue-200">
                <div class="h-48 bg-gradient-to-br from-yellow-500 to-blue-900 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Business & Management</h3>
                    <p class="text-gray-600 mb-4">MBA, Accounting, Marketing from leading Australian business schools.</p>
                    <a href="{{ route('contact') }}" class="w-full bg-gradient-to-r from-yellow-500 to-blue-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-900 hover:to-yellow-500 transition-colors duration-200 text-center block">Learn More</a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-yellow-200">
                <div class="h-48 bg-gradient-to-br from-blue-900 to-yellow-500 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Healthcare & Nursing</h3>
                    <p class="text-gray-600 mb-4">Nursing, Physiotherapy, Medicine from accredited Australian institutions.</p>
                    <a href="{{ route('contact') }}" class="w-full bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-yellow-500 hover:to-blue-900 transition-colors duration-200 text-center block">Learn More</a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-blue-200">
                <div class="h-48 bg-gradient-to-br from-yellow-500 to-blue-900 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Information Technology</h3>
                    <p class="text-gray-600 mb-4">Computer Science, Data Science, Cybersecurity from tech-focused universities.</p>
                    <a href="{{ route('contact') }}" class="w-full bg-gradient-to-r from-yellow-500 to-blue-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-900 hover:to-yellow-500 transition-colors duration-200 text-center block">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Bansal Education Group -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-yellow-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Why Choose Bansal Education Group?</h2>
            <p class="text-xl text-white">Australia's most trusted education consultancy with proven results</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">10+</div>
                <div class="text-white text-lg">Years of Educational Experience</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">10,000+</div>
                <div class="text-white text-lg">Students Placed Successfully</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">95%</div>
                <div class="text-white text-lg">University Admission Success Rate</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">100+</div>
                <div class="text-white text-lg">Partnerships with Australian Universities</div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Success Stories</h2>
            <p class="text-xl text-gray-600">Hear from our successful students who achieved their dreams in Australia</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">A</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Aisha Patel</h4>
                        <p class="text-gray-600 text-sm">University of Melbourne - Engineering</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"Bansal Education Group helped me secure admission to University of Melbourne for Civil Engineering. Their guidance throughout the application process was exceptional. I couldn't have done it without them!"</p>
                <div class="mt-4 flex text-yellow-400">★★★★★</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-blue-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">R</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Rajesh Kumar</h4>
                        <p class="text-gray-600 text-sm">UNSW Sydney - Computer Science</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"The team at Bansal Education Group made my dream of studying at UNSW a reality. Their expertise in Australian university admissions is unmatched. Highly recommended!"</p>
                <div class="mt-4 flex text-yellow-400">★★★★★</div>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center"><span class="text-white font-semibold text-lg">S</span></div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                        <p class="text-gray-600 text-sm">University of Queensland - MBA</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"From course selection to visa application, Bansal Education Group provided comprehensive support. I'm now pursuing my MBA at UQ and couldn't be happier with my choice!"</p>
                <div class="mt-4 flex text-yellow-400">★★★★★</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Book Your Free Educational Consultation Today</h2>
        <p class="text-xl text-gray-600 mb-8">Get expert guidance for your Australian education journey. Our experienced consultants are here to help you succeed.</p>
        <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-yellow-500 hover:to-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl">Book Free Consultation</a>
    </div>
</section>
@endsection
