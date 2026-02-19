@extends('layouts.app')

@section('title', 'Contact Us - Bansal Education Group')
@section('description', 'Get in touch with Australia\'s most trusted education consultant. Book your free consultation today for expert guidance on your Australian education journey.')

@section('content')
@if($page && $page->body)
{{-- Custom content from Admin: Edit in Site Pages → Contact Us --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none text-gray-700">{!! $page->body !!}</div>
    </div>
</section>
@endif
<!-- Contact Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-yellow-500 py-20 lg:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float blur-2xl"></div>
        <div class="absolute bottom-10 right-20 w-40 h-40 bg-yellow-300 rounded-full animate-float-reverse blur-2xl"></div>
        <div class="absolute top-1/2 left-1/2 w-24 h-24 bg-white rounded-full animate-pulse-slow blur-2xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        @if($page && $page->image)
        <div class="mb-8 max-w-2xl mx-auto">
            <img src="{{ str_starts_with($page->image, 'http') ? $page->image : asset(ltrim($page->image, '/')) }}" alt="{{ $page->title ?? 'Contact' }}" class="rounded-2xl shadow-xl w-full object-cover">
        </div>
        @endif
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6 animate-fade-in-up">
                Get in
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-100 animate-gradient-text">
                    Touch
                </span>
            </h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto animate-fade-in-up-delay">
                We're here to help you every step of the way. Reach out to us and let's start your Australian education journey together.
            </p>
        </div>
    </div>
</section>

<!-- Quick Contact Cards -->
<section class="py-16 bg-white -mt-8 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-yellow-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-500 border-l-4 border-blue-900 group animate-fade-in-up">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center group-hover:rotate-360 transition-transform duration-700">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Call Us</h3>
                        <a href="tel:0396021330" class="text-blue-900 font-semibold hover:text-yellow-600 transition-colors">03 9602 1330</a>
                        <p class="text-sm text-gray-600">Mon-Fri 9:30AM-5:30PM</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-yellow-50 to-blue-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-500 border-l-4 border-yellow-500 group animate-fade-in-up-delay">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center group-hover:rotate-360 transition-transform duration-700">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Email Us</h3>
                        <a href="mailto:Info@bansaleducation.com.au" class="text-blue-900 font-semibold hover:text-yellow-600 transition-colors break-all">Info@bansaleducation.com.au</a>
                        <p class="text-sm text-gray-600">We reply within 24hrs</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-yellow-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-500 border-l-4 border-blue-900 group animate-fade-in-up-delay">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center group-hover:rotate-360 transition-transform duration-700">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">WhatsApp</h3>
                        <a href="https://wa.me/61406660960" class="text-blue-900 font-semibold hover:text-yellow-600 transition-colors">0406 660 960</a>
                        <p class="text-sm text-gray-600">Instant support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl p-8 md:p-10 shadow-xl">
                    <div class="mb-8">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Book Your Free Consultation</h2>
                        <p class="text-lg text-gray-600">Fill out the form below and our expert consultants will get back to you within 24 hours.</p>
                    </div>

                    @if(session('success'))
                        <div class="mb-6 p-6 bg-green-50 border-l-4 border-green-500 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <p class="text-xl font-semibold text-green-800">Thank You!</p>
                                    <p class="text-green-700">{{ session('success') }}</p>
                                    <p class="text-gray-600 mt-1">We will get back to you within 24 hours.</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-red-800 font-semibold">Please fix the errors below.</p>
                            </div>
                            <ul class="mt-2 list-disc list-inside text-red-700 text-sm">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @unless(session('success'))
                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6" id="consultationForm">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="firstName" class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                                <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="preferredCourse" class="block text-sm font-semibold text-gray-700 mb-2">Preferred Course</label>
                                <select id="preferredCourse" name="preferredCourse" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    <option value="">Select a course</option>
                                    <option value="engineering" {{ old('preferredCourse') == 'engineering' ? 'selected' : '' }}>Engineering Programs</option>
                                    <option value="business" {{ old('preferredCourse') == 'business' ? 'selected' : '' }}>Business & Management</option>
                                    <option value="healthcare" {{ old('preferredCourse') == 'healthcare' ? 'selected' : '' }}>Healthcare & Nursing</option>
                                    <option value="it" {{ old('preferredCourse') == 'it' ? 'selected' : '' }}>Information Technology</option>
                                    <option value="hospitality" {{ old('preferredCourse') == 'hospitality' ? 'selected' : '' }}>Hospitality & Tourism</option>
                                    <option value="trades" {{ old('preferredCourse') == 'trades' ? 'selected' : '' }}>Trade Courses (VET)</option>
                                    <option value="other" {{ old('preferredCourse') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="educationLevel" class="block text-sm font-semibold text-gray-700 mb-2">Current Education Level</label>
                                <select id="educationLevel" name="educationLevel" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    <option value="">Select your education level</option>
                                    <option value="high-school" {{ old('educationLevel') == 'high-school' ? 'selected' : '' }}>High School</option>
                                    <option value="diploma" {{ old('educationLevel') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                                    <option value="bachelor" {{ old('educationLevel') == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <option value="master" {{ old('educationLevel') == 'master' ? 'selected' : '' }}>Master's Degree</option>
                                    <option value="other" {{ old('educationLevel') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Tell us about your goals *</label>
                            <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-none" placeholder="What are your educational and career goals? How can we help you achieve them?">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-yellow-500 hover:to-blue-900 transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-105 transform">
                            Submit & Book Free Consultation
                        </button>
                    </form>
                    @endunless
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-6 shadow-xl border-t-4 border-blue-900 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Melbourne Office</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Next to Flight Center<br>
                                Level 8/278 Collins Street<br>
                                Melbourne VIC 3000<br>
                                Australia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-yellow-50 rounded-2xl p-6 shadow-xl border-t-4 border-yellow-500 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Office Hours
                    </h3>
                    <div class="space-y-3 text-gray-700">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold">Monday - Friday</span>
                            <span>9:30 AM - 5:30 PM</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold">Saturday</span>
                            <span class="text-red-600">Closed</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold">Sunday</span>
                            <span class="text-red-600">Closed</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-300">
                            <p class="text-sm text-blue-900 font-semibold">AEST (UTC+10)</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-xl border-t-4 border-blue-900 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Why Contact Us?</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Free consultation with expert counsellors</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Personalized course recommendations</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Fast response within 24 hours</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Ongoing support throughout your journey</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-yellow-500 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float blur-2xl"></div>
        <div class="absolute bottom-10 right-20 w-40 h-40 bg-white rounded-full animate-float-reverse blur-2xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 animate-fade-in-up">
            Have Questions? We're Here to Help!
        </h2>
        <p class="text-xl text-white mb-8 max-w-3xl mx-auto animate-fade-in-up-delay">
            Our team is ready to assist you with any questions about studying in Australia. Reach out to us today!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:0396021330" class="bg-white text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-110 transform">Call Us Now</a>
            <a href="https://wa.me/61406660960" class="bg-green-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-600 transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-110 transform">WhatsApp Us</a>
            <a href="mailto:Info@bansaleducation.com.au" class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-blue-900 transition-all duration-300">Send Email</a>
        </div>
    </div>
</section>
@endsection
