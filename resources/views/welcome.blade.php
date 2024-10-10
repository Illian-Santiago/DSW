<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Welcome2</title>

    <!--Favicon layout-->
    <link rel="icon" href="{{asset('images/logo_community_links.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Main Container -->
    <div class="flex flex-col items-center justify-center min-h-screen">

        <!-- Navigation -->
        <div class="w-full max-w-6xl mx-auto p-6">
            <nav class="flex justify-between items-center">
            <img src="{{asset('images/logo_community_links.png') }}" alt="Logo"
            class="w-16 h-auto sm:w-24 md:w-32 lg:w-40 mr-4">
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </div>

        <!-- Hero Section -->
        <div class="flex flex-col items-center justify-center space-y-6 text-center">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white">
                Welcome to <span class="text-red-500">Laravel</span>
            </h1>
            <p class="text-lg max-w-xl text-gray-600 dark:text-gray-400">
                Build amazing web applications with a powerful PHP framework and integrated modern front-end tools.
            </p>
            <div class="space-x-4">
                <a href="https://laravel.com/docs" class="px-8 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                    Documentation
                </a>
                <a href="https://laravel-news.com" class="px-8 py-3 bg-gray-100 text-gray-800 rounded-lg shadow hover:bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition">
                    Laravel News
                </a>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="w-full max-w-6xl mx-auto p-6 mt-16">
            <div class="text-center text-gray-600 dark:text-gray-400">
                &copy; {{ date('Y') }} My Laravel App. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>