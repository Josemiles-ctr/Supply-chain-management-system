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
    <style>
        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(16px) saturate(180%);
            border: 1px solid rgba(200, 220, 255, 0.3);
        }
        .dark .glass {
            background: rgba(30,41,59,0.7);
            border: 1px solid rgba(51,65,85,0.3);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-100 via-white to-indigo-200 dark:from-slate-900 dark:via-slate-800 dark:to-blue-900 min-h-screen flex items-center justify-center font-sans">

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-400 opacity-30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400 opacity-30 rounded-full blur-3xl"></div>
    </div>

    <main class="relative z-10 w-full max-w-3xl mx-auto px-6 py-12 glass rounded-3xl shadow-2xl flex flex-col items-center">

        <!-- Logo -->
        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full p-3 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 40 40">
                    <circle cx="20" cy="20" r="18" stroke="white" stroke-width="3" fill="none"/>
                    <text x="50%" y="55%" text-anchor="middle" fill="white" font-size="18" font-family="Arial" dy=".3em">G</text>
                </svg>
            </div>
            <span class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent tracking-tight">G-20</span>
        </div>

        <!-- Headline -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4 leading-tight">
            Welcome to the Future of Style
        </h1>

        <!-- Subheading -->
        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-8 max-w-2xl">
            Discover T-shirts that blend comfort, quality, and modern design. Elevate your wardrobe with our exclusive collection, crafted for every occasion.
        </p>

        <!-- Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 w-full">
            <div class="flex flex-col items-center text-center">
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full mb-2">
                    <svg class="w-7 h-7 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2l4 4-4 4-4-4z"/><circle cx="12" cy="14" r="7"/>
                    </svg>
                </div>
                <span class="font-semibold text-gray-800 dark:text-white">Premium Quality</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Soft, durable fabrics</span>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="bg-indigo-100 dark:bg-indigo-900 p-3 rounded-full mb-2">
                    <svg class="w-7 h-7 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="10"/>
                    </svg>
                </div>
                <span class="font-semibold text-gray-800 dark:text-white">Modern Designs</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Trendy & timeless</span>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full mb-2">
                    <svg class="w-7 h-7 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"/><circle cx="12" cy="12" r="10"/>
                    </svg>
                </div>
                <span class="font-semibold text-gray-800 dark:text-white">Satisfaction Guaranteed</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Easy returns & support</span>
            </div>
        </div>

        <!-- CTA Button -->
        <a href="{{ route('welcome') }}"
            class="inline-block px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-lg font-semibold rounded-full shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-200">
            Get Started
        </a>

        <!-- Secondary CTA -->
        <p class="mt-6 text-gray-500 dark:text-gray-400 text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">Sign in</a>
        </p>
    </main>
</body>
</html>