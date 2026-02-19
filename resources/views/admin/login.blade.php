<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Bansal Education</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#1e3a8a',
                        'navy-dark': '#1e40af',
                        'gold': '#f59e0b',
                        'gold-light': '#fbbf24',
                    },
                    fontFamily: { 'sans': ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                    boxShadow: {
                        'card': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05)',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased min-h-screen flex flex-col" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #fef3c7 100%);">

    <header class="bg-white/80 backdrop-blur shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <a href="{{ route('home') }}" class="flex items-center group">
                <img src="{{ asset('logo.png') }}?v=3" alt="Bansal Education" class="h-16 w-auto" onerror="this.style.display='none'">
                <span class="text-xl font-bold text-navy ml-2 font-serif">Bansal Education World</span>
            </a>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-card rounded-2xl p-8 border border-gray-100">
                <div class="text-center mb-8">
                    <span class="inline-block bg-gold/20 text-navy text-xs font-semibold px-3 py-1 rounded-full mb-4">Admin Area</span>
                    <h1 class="text-2xl font-bold text-navy font-serif">Admin Login</h1>
                    <p class="text-gray-600 mt-1">Sign in to manage your website</p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                        <ul class="text-sm text-red-700 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-navy mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-gold focus:border-navy/50 transition-colors">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-navy mb-1">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-gold focus:border-navy/50 transition-colors">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-navy focus:ring-gold">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-navy to-navy-dark text-white py-3.5 rounded-lg font-bold shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gold hover:from-gold hover:to-gold-light hover:text-navy hover:border-navy">
                        Sign in
                    </button>
                </form>

                <p class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-sm text-navy hover:text-gold font-medium transition-colors">← Back to site</a>
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-navy text-white/80 py-4 text-center text-sm">
        &copy; {{ date('Y') }} Bansal Education. All rights reserved.
    </footer>
</body>
</html>
