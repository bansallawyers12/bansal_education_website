<?php
// Shared layout template for all pages
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($page_title) ? $page_title : 'Bansal Education Group - Australia\'s Most Trusted Education Consultant'; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Australia\'s most trusted education consultant. Expert guidance for university admissions, course selection, and career planning in Australia\'s top universities.'; ?>">
    
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
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-36 py-2">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="index.php" class="flex items-center">
                        <!-- Bansal Education Group Logo -->
                        <div class="flex items-center">
                            <img src="/logo.png?v=3" alt="Bansal Education Group Logo" class="h-32 w-auto" style="height: 128px; width: auto; max-height: none;">
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="index.php" class="<?php echo $current_page == 'index' ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="about.php" class="<?php echo $current_page == 'about' ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">About Us</a>
                        <a href="courses.php" class="<?php echo $current_page == 'courses' ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">Courses</a>
                        <a href="services.php" class="<?php echo $current_page == 'services' ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">Student Services</a>
                        <a href="testimonials.php" class="<?php echo $current_page == 'testimonials' ? 'text-navy border-b-2 border-gold' : 'text-gray-700 hover:text-navy hover:border-b-2 hover:border-gold'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">Success Stories</a>
                        <a href="contact.php" class="<?php echo $current_page == 'contact' ? 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white border-2 border-yellow-500' : 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white hover:from-yellow-500 hover:to-blue-900 border-2 border-yellow-500 hover:border-blue-900'; ?> px-6 py-2.5 text-sm font-bold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 transform">Contact Us</a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-navy hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-navy">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="index.php" class="<?php echo $current_page == 'index' ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50'; ?> block px-3 py-2 text-base font-medium">Home</a>
                <a href="about.php" class="<?php echo $current_page == 'about' ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50'; ?> block px-3 py-2 text-base font-medium">About Us</a>
                <a href="courses.php" class="<?php echo $current_page == 'courses' ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50'; ?> block px-3 py-2 text-base font-medium">Courses</a>
                <a href="services.php" class="<?php echo $current_page == 'services' ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50'; ?> block px-3 py-2 text-base font-medium">Student Services</a>
                <a href="testimonials.php" class="<?php echo $current_page == 'testimonials' ? 'bg-blue-50 text-navy' : 'text-gray-700 hover:text-navy hover:bg-gray-50'; ?> block px-3 py-2 text-base font-medium">Success Stories</a>
                <a href="contact.php" class="<?php echo $current_page == 'contact' ? 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white border-2 border-yellow-500' : 'bg-gradient-to-r from-blue-900 to-yellow-500 text-white hover:from-yellow-500 hover:to-blue-900 border-2 border-yellow-500'; ?> block px-6 py-3 text-base font-bold rounded-lg shadow-lg text-center transition-all duration-300 hover:scale-105 transform">Contact Us</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="/logo.png?v=3" alt="Bansal Education Group Logo" class="h-20 w-auto" style="height: 80px; width: auto;">
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        Your trusted partner for Australian education. Expert guidance for university admissions, course selection, and career planning in Australia's top universities.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="about.php" class="text-gray-300 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="courses.php" class="text-gray-300 hover:text-white transition-colors duration-200">Courses</a></li>
                        <li><a href="services.php" class="text-gray-300 hover:text-white transition-colors duration-200">Student Services</a></li>
                        <li><a href="testimonials.php" class="text-gray-300 hover:text-white transition-colors duration-200">Success Stories</a></li>
                        <li><a href="contact.php" class="text-gray-300 hover:text-white transition-colors duration-200">Contact Us</a></li>
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
                    // Add rotation animation to hamburger icon
                    this.classList.toggle('rotate-90');
                });
            }

            // Form validation and submission
            // Skip forms with ID "consultationForm" - they have their own handler
            const contactForm = document.querySelector('form:not(#consultationForm)');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Basic form validation
                    const requiredFields = this.querySelectorAll('[required]');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('border-red-500', 'animate-pulse');
                            isValid = false;
                        } else {
                            field.classList.remove('border-red-500', 'animate-pulse');
                        }
                    });
                    
                    if (isValid) {
                        // Show success message with animation
                        const submitBtn = this.querySelector('button[type="submit"]');
                        submitBtn.innerHTML = '✓ Sending...';
                        submitBtn.classList.add('animate-pulse');
                        
                        setTimeout(() => {
                            // Success message is now displayed in the page, no alert needed
                            this.reset();
                            submitBtn.innerHTML = 'Book Free Consultation';
                            submitBtn.classList.remove('animate-pulse');
                        }, 1500);
                    } else {
                        // Error message is now displayed in the page, no alert needed
                    }
                });
            }

            // Enhanced scroll effects
            window.addEventListener('scroll', function() {
                const nav = document.querySelector('nav');
                if (nav) {
                    if (window.scrollY > 100) {
                        nav.classList.add('shadow-xl', 'backdrop-blur-sm', 'bg-white/95');
                    } else {
                        nav.classList.remove('shadow-xl', 'backdrop-blur-sm', 'bg-white/95');
                    }
                }

                // Parallax effect for hero sections - disabled to prevent overlap
                // const heroSections = document.querySelectorAll('section[class*="hero"], section[class*="bg-gradient"]');
                // heroSections.forEach(section => {
                //     const scrolled = window.pageYOffset;
                //     const rate = scrolled * -0.5;
                //     section.style.transform = `translateY(${rate}px)`;
                // });

                // Fade in animation for elements
                const elements = document.querySelectorAll('.fade-in');
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('animate-fade-in');
                    }
                });

                // Slide in animation for cards
                const cards = document.querySelectorAll('.slide-in');
                cards.forEach(card => {
                    const cardTop = card.getBoundingClientRect().top;
                    const cardVisible = 200;
                    
                    if (cardTop < window.innerHeight - cardVisible) {
                        card.classList.add('animate-slide-in');
                    }
                });
            });

            // Button click animations
            const buttons = document.querySelectorAll('button, a[class*="btn"], a[class*="bg-gradient"]');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Card hover animations
            const cards = document.querySelectorAll('.card, [class*="rounded-xl"], [class*="shadow-lg"]');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Smooth scroll for anchor links
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

            // Typing animation for hero text - disabled to prevent NaN issues
            // The hero text has complex HTML structure with spans and gradients
            // that don't work well with typewriter animation

            // Counter animation for statistics
            const counters = document.querySelectorAll('[class*="text-4xl"], [class*="text-5xl"]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const originalText = counter.textContent;
                        const target = parseInt(originalText.replace(/\D/g, ''));
                        
                        // Only animate if we have a valid number
                        if (!isNaN(target) && target > 0) {
                            const hasPlus = originalText.includes('+');
                            const hasPercent = originalText.includes('%');
                            const increment = target / 100;
                            let current = 0;
                            
                            const updateCounter = () => {
                                if (current < target) {
                                    current += increment;
                                    counter.textContent = Math.ceil(current) + (hasPlus ? '+' : '') + (hasPercent ? '%' : '');
                                    requestAnimationFrame(updateCounter);
                                } else {
                                    counter.textContent = target + (hasPlus ? '+' : '') + (hasPercent ? '%' : '');
                                }
                            };
                            
                            updateCounter();
                        }
                        observer.unobserve(counter);
                    }
                });
            });
            
            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>

    <!-- Additional CSS for animations -->
    <style>
        /* Ripple effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Fade in animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* Slide in animation */
        .slide-in {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }

        .animate-slide-in {
            opacity: 1;
            transform: translateX(0);
        }

        /* Enhanced button hover effects */
        button:hover, a[class*="btn"]:hover, a[class*="bg-gradient"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Loading animation for forms */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Staggered animation for cards */
        .stagger-animation > * {
            opacity: 0;
            transform: translateY(20px);
            animation: staggerFadeIn 0.6s ease forwards;
        }

        .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
        .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
        .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
        .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }

        @keyframes staggerFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Pulse animation for important elements */
        .pulse-slow {
            animation: pulse 3s infinite;
        }

        /* Bounce animation for call-to-action buttons */
        .bounce-hover:hover {
            animation: bounce 0.6s ease;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Gradient animation for backgrounds */
        .gradient-animate {
            background: linear-gradient(-45deg, #1e3a8a, #ffffff, #1e3a8a, #ffffff);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Float animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float 4s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: float 3s ease-in-out infinite reverse;
        }

        .animate-float-delay {
            animation: float 3s ease-in-out infinite;
            animation-delay: 0.5s;
        }

        .animate-float-delay-2 {
            animation: float 3s ease-in-out infinite;
            animation-delay: 1s;
        }

        .animate-float-delay-3 {
            animation: float 3s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        /* Fade in up */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fade-in-up-delay {
            animation: fadeInUp 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }

        /* Slide in from left */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        /* Slide in from bottom */
        @keyframes slideInBottom {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in-bottom {
            animation: slideInBottom 0.8s ease-out forwards;
        }

        /* Scale in */
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-scale-in {
            animation: scaleIn 0.6s ease-out forwards;
        }

        .animate-scale-in-delay {
            animation: scaleIn 0.6s ease-out 0.2s forwards;
            opacity: 0;
        }

        .animate-scale-in-delay-2 {
            animation: scaleIn 0.6s ease-out 0.4s forwards;
            opacity: 0;
        }

        /* Gradient text animation */
        @keyframes gradientText {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .animate-gradient-text {
            background-size: 200% 200%;
            animation: gradientText 3s ease infinite;
        }

        /* Slow bounce */
        @keyframes bounceSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-bounce-slow {
            animation: bounceSlow 2s ease-in-out infinite;
        }

        .animate-bounce-slow-delay {
            animation: bounceSlow 2s ease-in-out 0.5s infinite;
        }

        .animate-bounce-slow-delay-2 {
            animation: bounceSlow 2s ease-in-out 1s infinite;
        }

        .animate-bounce-slow-delay-3 {
            animation: bounceSlow 2s ease-in-out 1.5s infinite;
        }

        /* Slow spin */
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .animate-spin-slow {
            animation: spinSlow 8s linear infinite;
        }

        /* Card float */
        @keyframes cardFloat {
            0%, 100% { transform: translateY(0px) rotate(3deg); }
            50% { transform: translateY(-10px) rotate(0deg); }
        }

        .animate-card-float {
            animation: cardFloat 4s ease-in-out infinite;
        }

        /* Card hover animation */
        @keyframes cardHover {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .animate-card-hover {
            animation: cardHover 3s ease-in-out infinite;
        }

        /* Fade in with delay */
        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-fade-in-delay {
            animation: fadeInUp 0.6s ease-out 0.3s forwards;
            opacity: 0;
        }

        /* Pulse slow */
        @keyframes pulseSlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .animate-pulse-slow {
            animation: pulseSlow 2s ease-in-out infinite;
        }

        /* Counter animation */
        .counter-animate {
            animation: scaleIn 0.8s ease-out forwards;
        }
    </style>
</body>
</html>
