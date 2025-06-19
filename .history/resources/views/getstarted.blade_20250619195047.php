<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>
    <script>
    // Enable dark mode by default if user prefers dark or previously selected dark
    if (
        localStorage.theme === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center font-sans">

    <div class="relative max-w-4xl mx-auto text-center p-10 bg-white dark:bg-gray-900 shadow-2xl rounded-3xl border border-blue-200 dark:border-gray-700 overflow-hidden">

        <!-- Decorative Blobs -->
        <div class="absolute -top-16 -left-16 w-56 h-56 bg-blue-100 dark:bg-blue-900 rounded-full opacity-40 blur-2xl z-0"></div>
        <div class="absolute -bottom-16 -right-16 w-56 h-56 bg-indigo-100 dark:bg-indigo-900 rounded-full opacity-40 blur-2xl z-0"></div>

        <!-- G-20 Logo Text -->
        <h1 class="relative z-10 text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 mb-4 drop-shadow-lg">
            G-20
        </h1>

        <!-- Subheading -->
        <h2 class="relative z-10 text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-4 tracking-wide">
            Welcome to the Future
        </h2>

        <p class="relative z-10 text-gray-600 dark:text-gray-300 text-lg mb-8 max-w-2xl mx-auto leading-relaxed">
            Start your journey with us. Explore powerfully designed T-shirt styles to elevate your wardrobe.<br>
            Our collection is crafted with the finest materials, ensuring comfort and style for every occasion.<br>
            Whether you're looking for casual wear or something more sophisticated, we have the perfect T-shirt for you.
        </p>

        <!-- CTA Button -->
        <a href="{{ route('welcome') }}"
            class="relative z-10 inline-block px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-500 dark:to-indigo-500 text-white text-lg font-semibold rounded-full shadow-lg hover:scale-105 hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
            Get Started
        </a>

        <!-- Decorative Divider -->
        <div class="relative z-10 mt-10 flex items-center justify-center">
            <span class="h-1 w-24 bg-gradient-to-r from-blue-400 via-indigo-400 to-blue-400 rounded-full opacity-60"></span>
        </div>

        <!-- Features Section -->
        <div class="relative z-10 mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-50 dark:bg-gray-800 rounded-xl p-6 shadow hover:shadow-lg transition">
                <svg class="mx-auto mb-3 w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 20l9-5-9-5-9 5 9 5z" />
                    <path d="M12 12V4l9 5-9 5-9-5 9-5z" />
                </svg>
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100 mb-1">Premium Quality</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Only the best materials for lasting comfort and style.</p>
            </div>
            <div class="bg-blue-50 dark:bg-gray-800 rounded-xl p-6 shadow hover:shadow-lg transition">
                <svg class="mx-auto mb-3 w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M8 12l2 2 4-4" />
                </svg>
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100 mb-1">Modern Designs</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Trendy, versatile styles for every occasion.</p>
            </div>
            <div class="bg-blue-50 dark:bg-gray-800 rounded-xl p-6 shadow hover:shadow-lg transition">
                <svg class="mx-auto mb-3 w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100 mb-1">Satisfaction Guaranteed</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">We stand by our products and your happiness.</p>
            </div>
        </div>
    </div>

</body>

</html>