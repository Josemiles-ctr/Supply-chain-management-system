<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Get Started | G-20</title>
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
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'blob-move': 'blobMove 12s infinite ease-in-out',
                        'fade-in': 'fadeIn 1.2s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        blobMove: {
                            '0%, 100%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -20px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.95)' },
                        },
                        fadeIn: {
                            '0%': { opacity: 0, transform: 'translateY(20px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        },
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center font-sans transition-colors duration-500">

    <div class="relative max-w-3xl w-full mx-auto text-center p-10 bg-white/90 dark:bg-gray-900/90 shadow-2xl rounded-3xl border border-blue-200 dark:border-gray-700 overflow-hidden">
        <!-- Decorative Blobs -->
        <div class="absolute -top-20 -left-20 w-60 h-60 bg-blue-400 opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-indigo-400 opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <svg class="absolute right-0 top-0 w-32 h-32 opacity-10" fill="none" viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="100" fill="url(#paint0_radial)" />
                <defs>
                    <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientTransform="translate(100 100) scale(100)" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#6366F1"/>
                        <stop offset="1" stop-color="#3B82F6" stop-opacity="0"/>
                    </radialGradient>
                </defs>
            </svg>
        </div>

        <!-- G-20 Logo Text -->
        <h1 class="text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600 mb-4 drop-shadow-lg">
            G-20
        </h1>

        <!-- Subheading -->
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-4 tracking-tight">
            Welcome to the Future
        </h2>

        <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 max-w-2xl mx-auto leading-relaxed">
            Start your journey with us. Explore powerfully designed T-shirt styles to elevate your wardrobe.<br>
            Our collection is crafted with the finest materials, ensuring comfort and style for every occasion.<br>
            Whether you're looking for casual wear or something more sophisticated, we have the perfect T-shirt for you.
        </p>

        <!-- CTA Button -->
        <a href="{{ route('welcome') }}"
            class="inline-flex items-center gap-2 px-10 py-3 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white text-lg font-semibold rounded-full shadow-xl hover:scale-105 hover:from-blue-700 hover:to-purple-700 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-indigo-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
            Get Started
        </a>
    </div>

</body>

</html>