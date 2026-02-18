<?php
// Simple PHP version of the website (without Laravel)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bansal Education Group - Australia's Most Trusted Education Consultant</title>
    <meta name="description" content="Australia's most trusted education consultant. Expert guidance for university admissions, course selection, and career planning in Australia's top universities.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        'serif': ['Playfair Display', 'ui-serif', 'Georgia', 'serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-36 py-2">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="flex items-center">
                        <!-- Bansal Education Group Logo -->
                        <div class="flex items-center">
                            <img src="/logo.png?v=3" alt="Bansal Education Group Logo" class="h-32 w-auto" style="height: 128px; width: auto; max-height: none;">
                        </div>
                        <span class="ml-4 text-sm text-blue-700 font-medium">Australia's Most Trusted Education Consultant</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#" class="text-blue-900 border-b-2 border-yellow-500 px-3 py-2 text-sm font-medium">Home</a>
                        <a href="#about" class="text-gray-700 hover:text-blue-900 hover:border-b-2 hover:border-yellow-500 px-3 py-2 text-sm font-medium transition-colors duration-200">About Us</a>
                        <a href="#courses" class="text-gray-700 hover:text-blue-900 hover:border-b-2 hover:border-yellow-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Courses</a>
                        <a href="#services" class="text-gray-700 hover:text-blue-900 hover:border-b-2 hover:border-yellow-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Student Services</a>
                        <a href="#testimonials" class="text-gray-700 hover:text-blue-900 hover:border-b-2 hover:border-yellow-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Success Stories</a>
                        <a href="#contact" class="text-gray-700 hover:text-blue-900 hover:border-b-2 hover:border-yellow-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Contact Us</a>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="#contact" class="bg-gradient-to-r from-blue-900 to-blue-800 text-white px-6 py-2 rounded-lg text-sm font-medium hover:from-yellow-500 hover:to-yellow-400 hover:text-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl border border-yellow-500">
                        Book Free Consultation
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

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
                        <a href="#contact" class="bg-gradient-to-r from-blue-900 to-blue-800 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-yellow-500 hover:to-yellow-400 hover:text-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 border border-yellow-500">
                            Book Free Consultation
                        </a>
                        <a href="#about" class="border-2 border-blue-900 text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-900 hover:text-white transition-all duration-200">
                            Learn More
                        </a>
                    </div>
                    <!-- Trust Badges -->
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
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20"></div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-pink-400 rounded-full opacity-20"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Our Student Services
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Comprehensive support services designed to guide you through every step of your educational journey in Australia.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-yellow-50 p-8 rounded-xl hover:shadow-lg transition-shadow duration-300 border border-yellow-200">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Education Counselling</h3>
                    <ul class="space-y-3 text-gray-600 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            University selection guidance
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Course recommendation based on career goals
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Application assistance
                        </li>
                    </ul>
                    <div class="bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-semibold text-center">
                        Complete guidance in 2-4 weeks
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-gradient-to-br from-yellow-50 to-blue-50 p-8 rounded-xl hover:shadow-lg transition-shadow duration-300 border border-blue-200">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Admission Support</h3>
                    <ul class="space-y-3 text-gray-600 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Document preparation
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Statement of Purpose writing
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Interview preparation
                        </li>
                    </ul>
                    <div class="bg-gradient-to-r from-yellow-500 to-blue-900 text-white px-4 py-2 rounded-lg text-sm font-semibold text-center">
                        Application process in 3-6 weeks
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-gradient-to-br from-blue-50 to-yellow-50 p-8 rounded-xl hover:shadow-lg transition-shadow duration-300 border border-yellow-200">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Career Guidance</h3>
                    <ul class="space-y-3 text-gray-600 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Industry-focused course selection
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Job market analysis
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Skill development guidance
                        </li>
                    </ul>
                    <div class="bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-semibold text-center">
                        Career support throughout your journey
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Popular Australian Courses
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore top courses offered by Australia's leading universities and institutions
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Course 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-yellow-200">
                    <div class="h-48 bg-gradient-to-br from-blue-900 to-yellow-500 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Engineering Programs</h3>
                        <p class="text-gray-600 mb-4">
                            Civil, Mechanical, Software Engineering from top Australian universities.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-500">Duration: 2-4 Years</div>
                            <div class="text-sm text-gray-500">Universities: UNSW, UTS, Monash</div>
                        </div>
                        <a href="#contact" class="w-full bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-yellow-500 hover:to-blue-900 transition-colors duration-200 text-center block">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-blue-200">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-blue-900 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Business & Management</h3>
                        <p class="text-gray-600 mb-4">
                            MBA, Accounting, Marketing from leading Australian business schools.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-500">Duration: 1.5-3 Years</div>
                            <div class="text-sm text-gray-500">Universities: UQ, UWA, ANU</div>
                        </div>
                        <a href="#contact" class="w-full bg-gradient-to-r from-yellow-500 to-blue-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-900 hover:to-yellow-500 transition-colors duration-200 text-center block">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-yellow-200">
                    <div class="h-48 bg-gradient-to-br from-blue-900 to-yellow-500 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Healthcare & Nursing</h3>
                        <p class="text-gray-600 mb-4">
                            Nursing, Physiotherapy, Medicine from accredited Australian institutions.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-500">Duration: 2-6 Years</div>
                            <div class="text-sm text-gray-500">Universities: UQ, Griffith, Deakin</div>
                        </div>
                        <a href="#contact" class="w-full bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-yellow-500 hover:to-blue-900 transition-colors duration-200 text-center block">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Course 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-blue-200">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-blue-900 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Information Technology</h3>
                        <p class="text-gray-600 mb-4">
                            Computer Science, Data Science, Cybersecurity from tech-focused universities.
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-500">Duration: 1.5-3 Years</div>
                            <div class="text-sm text-gray-500">Universities: UTS, RMIT, UNSW</div>
                        </div>
                        <a href="#contact" class="w-full bg-gradient-to-r from-yellow-500 to-blue-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-900 hover:to-yellow-500 transition-colors duration-200 text-center block">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gradient-to-r from-blue-900 to-yellow-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Why Choose Bansal Education Group?
                </h2>
                <p class="text-xl text-white">
                    Australia's most trusted education consultancy with proven results
                </p>
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

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Success Stories
                </h2>
                <p class="text-xl text-gray-600">
                    Hear from our successful students who achieved their dreams in Australia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-lg">A</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Aisha Patel</h4>
                            <p class="text-gray-600 text-sm">University of Melbourne - Engineering</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Bansal Education Group helped me secure admission to University of Melbourne for Civil Engineering. Their guidance throughout the application process was exceptional. I couldn't have done it without them!"
                    </p>
                    <div class="mt-4 flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-xl border border-blue-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-lg">R</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Rajesh Kumar</h4>
                            <p class="text-gray-600 text-sm">UNSW Sydney - Computer Science</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "The team at Bansal Education Group made my dream of studying at UNSW a reality. Their expertise in Australian university admissions is unmatched. Highly recommended!"
                    </p>
                    <div class="mt-4 flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-8 rounded-xl border border-yellow-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-lg">S</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-gray-600 text-sm">University of Queensland - MBA</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "From course selection to visa application, Bansal Education Group provided comprehensive support. I'm now pursuing my MBA at UQ and couldn't be happier with my choice!"
                    </p>
                    <div class="mt-4 flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Book Your Free Educational Consultation Today
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Get expert guidance for your Australian education journey. Our experienced consultants are here to help you succeed.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" id="firstName" name="firstName" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <div>
                            <label for="preferredCourse" class="block text-sm font-medium text-gray-700 mb-2">Preferred Course</label>
                            <select id="preferredCourse" name="preferredCourse" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                                <option value="">Select a course</option>
                                <option value="engineering">Engineering Programs</option>
                                <option value="business">Business & Management</option>
                                <option value="healthcare">Healthcare & Nursing</option>
                                <option value="it">Information Technology</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="educationLevel" class="block text-sm font-medium text-gray-700 mb-2">Current Education Level</label>
                            <select id="educationLevel" name="educationLevel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                                <option value="">Select your education level</option>
                                <option value="high-school">High School</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelor">Bachelor's Degree</option>
                                <option value="master">Master's Degree</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Tell us about your goals *</label>
                            <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200" placeholder="What are your educational and career goals? How can we help you achieve them?"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-yellow-500 hover:to-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl">
                            Book Free Consultation
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <div class="space-y-8">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Sydney Office</h3>
                                <p class="text-gray-600">
                                    Level 15, 123 George Street<br>
                                    Sydney NSW 2000<br>
                                    Australia
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Phone</h3>
                                <p class="text-gray-600">
                                    +61 2 9876 5432<br>
                                    <span class="text-sm text-gray-500">Mon-Fri 9:30AM-5:30PM (AEST)</span>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                                <p class="text-gray-600">
                                    Info@bansaleducation.com.au<br>
                                    Admissions@bansaleducation.com.au
                                </p>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-blue-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">WhatsApp</h3>
                                <p class="text-gray-600">
                                    +61 412 345 678<br>
                                    <span class="text-sm text-gray-500">Instant queries & support</span>
                                </p>
                            </div>
                        </div>

                        <!-- Other Locations -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Other Locations</h3>
                                <p class="text-gray-600">
                                    <strong>Melbourne:</strong> Level 8, 123 Collins Street<br>
                                    <strong>Brisbane:</strong> Level 12, 123 Queen Street<br>
                                    <strong>Perth:</strong> Level 6, 123 St Georges Terrace
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex flex-col items-center justify-center">
                                <!-- Book Icon -->
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                    <!-- Book pages with alternating blue and gold lines -->
                                    <path d="M4 6h16v12H4z" fill="#1e40af" stroke="#1e40af" stroke-width="1"/>
                                    <path d="M4 6h16v2H4z" fill="#fbbf24"/>
                                    <path d="M4 8h16v2H4z" fill="#1e40af"/>
                                    <path d="M4 10h16v2H4z" fill="#fbbf24"/>
                                    <path d="M4 12h16v2H4z" fill="#1e40af"/>
                                    <path d="M4 14h16v2H4z" fill="#fbbf24"/>
                                    <path d="M4 16h16v2H4z" fill="#1e40af"/>
                                    <!-- Book spine -->
                                    <path d="M4 6h2v12H4z" fill="#fbbf24"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <div class="text-xl font-bold text-white" style="font-family: 'Playfair Display', serif;">BANSAL</div>
                                <div class="flex items-center">
                                    <div class="w-6 h-0.5 bg-yellow-500"></div>
                                    <div class="text-xs font-semibold text-yellow-300 px-2" style="font-family: 'Playfair Display', serif; letter-spacing: 1px;">EDUCATION GROUP</div>
                                    <div class="w-6 h-0.5 bg-yellow-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        Your trusted partner for Australian education. Expert guidance for university admissions, course selection, and career planning in Australia's top universities.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-gray-300 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="#courses" class="text-gray-300 hover:text-white transition-colors duration-200">Courses</a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors duration-200">Student Services</a></li>
                        <li><a href="#testimonials" class="text-gray-300 hover:text-white transition-colors duration-200">Success Stories</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors duration-200">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>Level 15, 123 George Street</p>
                        <p>Sydney NSW 2000, Australia</p>
                        <p>+61 2 9876 5432</p>
                        <p>Info@bansaleducation.com.au</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-800">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; 2024 Bansal Education Group. All rights reserved. | Australia's Most Trusted Education Consultant
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Form validation and submission
            const contactForm = document.querySelector('form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Basic form validation
                    const requiredFields = this.querySelectorAll('[required]');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('border-red-500');
                            isValid = false;
                        } else {
                            field.classList.remove('border-red-500');
                        }
                    });
                    
                    if (isValid) {
                        alert('Thank you for your message! We will get back to you soon.');
                        this.reset();
                    } else {
                        alert('Please fill in all required fields.');
                    }
                });
            }
        });
    </script>
</body>
</html>
