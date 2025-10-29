<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Job Portal') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<!-- Navigation -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h1 class="text-xl font-bold text-gray-800">Job Portal</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('job-offers.index') }}" class="text-gray-600 hover:text-gray-900">Browse Jobs</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-500 to-purple-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                Find Your Dream Job
            </h1>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                Connect with top employers and discover opportunities that match your skills and ambitions. Join thousands of job seekers and entrepreneurs building their careers.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300">
                        Get Started
                    </a>
                    <a href="{{ route('job-offers.index') }}" class="border-2 border-white text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300">
                        Browse Jobs
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Our Job Portal?</h2>
            <p class="text-lg text-gray-600">Everything you need to find the perfect job or hire the best talent</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- For Job Seekers -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">For Job Seekers</h3>
                <p class="text-gray-600 mb-6">Create your professional profile, upload your CV, and apply to jobs across multiple industries.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>✓ Easy application process</li>
                    <li>✓ Track your applications</li>
                    <li>✓ Direct communication with employers</li>
                </ul>
            </div>

            <!-- For Employers -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h2M7 7h10M7 11h10M7 15h10"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">For Employers</h3>
                <p class="text-gray-600 mb-6">Post job openings, manage applications, and find the perfect candidates for your company.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>✓ Easy job posting</li>
                    <li>✓ Manage all applications</li>
                    <li>✓ Company profile visibility</li>
                </ul>
            </div>

            <!-- Multiple Industries -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Multiple Industries</h3>
                <p class="text-gray-600 mb-6">From IT to hospitality, find opportunities across all major industry sectors.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>✓ Technology & IT</li>
                    <li>✓ Education & Training</li>
                    <li>✓ Healthcare & Finance</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Recent Jobs Preview -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Latest Job Opportunities</h2>
            <p class="text-lg text-gray-600">Discover the newest positions available</p>
        </div>

        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No job offers available yet. Be the first to post one!</p>
            @auth
                @if(auth()->user()->isEntrepreneur())
                    <a href="{{ route('job-offers.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Post the First Job
                    </a>
                @endif
            @endauth
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('job-offers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                Browse All Jobs
            </a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-xl text-gray-300 mb-8">Join our community of job seekers and employers today</p>
        @guest
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    Sign Up Now
                </a>
                <a href="{{ route('job-offers.index') }}" class="border-2 border-gray-300 text-gray-300 font-bold py-3 px-8 rounded-lg hover:bg-gray-300 hover:text-gray-900 transition duration-300">
                    Browse Jobs First
                </a>
            </div>
        @endguest
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h3 class="text-lg font-semibold mb-4">Job Portal</h3>
            <p class="text-gray-400">Connecting talent with opportunity</p>
            <p class="text-gray-500 text-sm mt-4">&copy; {{ date('Y') }} Job Portal. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>
