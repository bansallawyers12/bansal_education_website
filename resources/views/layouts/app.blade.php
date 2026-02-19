<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', optional($sitePage)->meta_title ?? 'Bansal Education Group - Australia\'s Most Trusted Education Consultant')</title>
    <meta name="description" content="@yield('description', optional($sitePage)->meta_description ?? 'Australia\'s most trusted education consultant. Expert guidance for university admissions, course selection, and career planning in Australia\'s top universities.')">

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
                    colors: {
                        'navy': '#1e3a8a',
                        'navy-dark': '#1e40af',
                        'navy-light': '#3b82f6',
                        'navy-lighter': '#60a5fa',
                        'gold': '#f59e0b',
                        'gold-light': '#fbbf24',
                        'primary': '#1e3a8a',
                        'secondary': '#ffffff',
                        'accent': '#f59e0b',
                        'gradient-start': '#1e3a8a',
                        'gradient-end': '#1e40af'
                    },
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        'serif': ['Playfair Display', 'ui-serif', 'Georgia', 'serif'],
                    }
                }
            }
        }
    </script>

    <!-- Additional Meta Tags -->
    <meta property="og:title" content="@yield('title', optional($sitePage)->meta_title ?? 'Bansal Education Group - Australia\'s Most Trusted Education Consultant')">
    <meta property="og:description" content="@yield('description', optional($sitePage)->meta_description ?? 'Expert guidance for university admissions, course selection, and career planning in Australia\'s top universities.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if(optional($sitePage)->image)
    <meta property="og:image" content="{{ str_starts_with($sitePage->image, 'http') ? $sitePage->image : asset(ltrim($sitePage->image, '/')) }}">
    @endif
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-36 py-2">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('logo.png') }}?v=3" alt="Bansal Education Group Logo" class="h-32 w-auto" style="height: 128px; width: auto; max-height: none;">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold' }} px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold' }} px-3 py-2 text-sm font-medium transition-colors duration-200">About Us</a>
                        <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold' }} px-3 py-2 text-sm font-medium transition-colors duration-200">Courses</a>
                        <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold' }} px-3 py-2 text-sm font-medium transition-colors duration-200">Student Services</a>
                        <a href="{{ route('testimonials') }}" class="{{ request()->routeIs('testimonials') ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold' }} px-3 py-2 text-sm font-medium transition-colors duration-200">Success Stories</a>
                        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white border-2 border-yellow-500' : 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white hover:from-yellow-500 hover:to-blue-900 border-2 border-yellow-500 hover:border-blue-900' }} px-6 py-2.5 text-sm font-bold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 transform">Contact Us</a>
                    </div>
                </div>


                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-navy hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-navy" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger icon -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50' }} block px-3 py-2 text-base font-medium">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50' }} block px-3 py-2 text-base font-medium">About Us</a>
                <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50' }} block px-3 py-2 text-base font-medium">Courses</a>
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50' }} block px-3 py-2 text-base font-medium">Student Services</a>
                <a href="{{ route('testimonials') }}" class="{{ request()->routeIs('testimonials') ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50' }} block px-3 py-2 text-base font-medium">Success Stories</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white border-2 border-yellow-500' : 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white hover:from-yellow-500 hover:to-blue-900 border-2 border-yellow-500' }} block px-6 py-3 text-base font-bold rounded-lg shadow-lg text-center transition-all duration-300 hover:scale-105 transform">Contact Us</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('logo.png') }}?v=3" alt="Bansal Education Group Logo" class="h-20 w-auto" style="height: 80px; width: auto;">
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        Your trusted partner for Australian education. Expert guidance for university admissions, course selection, and career planning in Australia's top universities.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="{{ route('courses') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Courses</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Student Services</a></li>
                        <li><a href="{{ route('testimonials') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Success Stories</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>Next to Flight Center</p>
                        <p>Level 8/278 Collins Street</p>
                        <p>Melbourne VIC 3000, Australia</p>
                        <p>03 9602 1330</p>
                        <p>Info@bansaleducation.com.au</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-800">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; {{ date('Y') }} Bansal Education Group. All rights reserved. | Australia's Most Trusted Education Consultant
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for mobile menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>

    <!-- Animation CSS (matches original site) -->
    <style>
        /* Float animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-float-slow { animation: float 4s ease-in-out infinite; }
        .animate-float-reverse { animation: float 3s ease-in-out infinite reverse; }
        .animate-float-delay { animation: float 3s ease-in-out infinite; animation-delay: 0.5s; }
        .animate-float-delay-2 { animation: float 3s ease-in-out infinite; animation-delay: 1s; }
        .animate-float-delay-3 { animation: float 3s ease-in-out infinite; animation-delay: 1.5s; }

        /* Fade in up */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-fade-in-up-delay { animation: fadeInUp 0.8s ease-out 0.3s forwards; opacity: 0; }
        .animate-fade-in { animation: fadeInUp 0.6s ease-out forwards; }
        .animate-fade-in-delay { animation: fadeInUp 0.6s ease-out 0.3s forwards; opacity: 0; }

        /* Slide in from bottom */
        @keyframes slideInBottom {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-in-bottom { animation: slideInBottom 0.8s ease-out forwards; }

        /* Scale in */
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-scale-in { animation: scaleIn 0.6s ease-out forwards; }
        .animate-scale-in-delay { animation: scaleIn 0.6s ease-out 0.2s forwards; opacity: 0; }
        .animate-scale-in-delay-2 { animation: scaleIn 0.6s ease-out 0.4s forwards; opacity: 0; }
        .counter-animate { animation: scaleIn 0.8s ease-out forwards; }

        /* Gradient text animation */
        @keyframes gradientText {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-text { background-size: 200% 200%; animation: gradientText 3s ease infinite; }

        /* Slow bounce */
        @keyframes bounceSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow { animation: bounceSlow 2s ease-in-out infinite; }
        .animate-bounce-slow-delay { animation: bounceSlow 2s ease-in-out 0.5s infinite; }
        .animate-bounce-slow-delay-2 { animation: bounceSlow 2s ease-in-out 1s infinite; }
        .animate-bounce-slow-delay-3 { animation: bounceSlow 2s ease-in-out 1.5s infinite; }

        /* Pulse slow */
        @keyframes pulseSlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .animate-pulse-slow { animation: pulseSlow 2s ease-in-out infinite; }
    </style>
</body>
</html>

