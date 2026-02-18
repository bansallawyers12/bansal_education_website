<?php
// BACKUP: Original plain PHP homepage - kept for reference
// Rename back to index.php only if you need to revert to plain PHP
$page_title = "Home - Bansal Education Group";
$page_description = "Australia's most trusted education consultant. Expert guidance for university admissions, course selection, and career planning in Australia's top universities.";

ob_start();
?>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-50 to-indigo-100 py-20 lg:py-32 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left fade-in slide-in-left">
                <div class="mb-4 animate-float">
                    <span class="inline-block bg-yellow-500 text-blue-900 text-sm font-semibold px-4 py-2 rounded-full pulse-slow animate-bounce-slow">
                        🇦🇺 Australia's Most Trusted Education Consultant
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight animate-fade-in-up">
                    Your Pathway to 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-yellow-500 animate-gradient-text">
                        Quality Education
                    </span>
                </h1>
                <p class="mt-6 text-xl text-gray-600 leading-relaxed animate-fade-in-up-delay">
                    Expert guidance for university admissions, course selection, and career planning in Australia's top universities. 
                    Join thousands of successful students who achieved their dreams with our proven consultancy services.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="contact.php" class="bg-gradient-to-r from-blue-900 to-yellow-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-yellow-500 hover:to-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 bounce-hover">
                            Book Free Consultation
                        </a>
                        <a href="about.php" class="border-2 border-blue-900 text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-900 hover:text-white transition-all duration-200 bounce-hover">
                            Learn More
                        </a>
                </div>
                <!-- Trust Badges - rest of content truncated for backup -->
                <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-6 stagger-animation">
                    <div class="text-center animate-scale-in hover:scale-110 transition-transform duration-300">
                        <div class="text-2xl font-bold text-blue-900 counter-animate">10+</div>
                        <div class="text-sm text-gray-600">Years Experience</div>
                    </div>
                    <div class="text-center animate-scale-in-delay hover:scale-110 transition-transform duration-300">
                        <div class="text-2xl font-bold text-blue-900 counter-animate">10,000+</div>
                        <div class="text-sm text-gray-600">Students Placed</div>
                    </div>
                    <div class="text-center animate-scale-in-delay-2 hover:scale-110 transition-transform duration-300">
                        <div class="text-2xl font-bold text-blue-900 counter-animate">95%</div>
                        <div class="text-sm text-gray-600">Success Rate</div>
                    </div>
                </div>
            </div>
            <p>See full backup in version control or index.php history.</p>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); include 'layout.php'; ?>
