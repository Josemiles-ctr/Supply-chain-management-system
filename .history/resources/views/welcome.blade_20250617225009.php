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
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                light: '#F53003',
                                dark: '#F61500'
                            },
                            dark: {
                                bg: '#0a0a0a',
                                card: '#161615',
                                text: '#EDEDEC'
                            },
                            light: {
                                bg: '#FDFDFC',
                                card: '#FFFFFF',
                                text: '#1b1b18'
                            }
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-light-bg dark:bg-dark-bg text-light-text dark:text-dark-text min-h-screen flex flex-col">
        <!-- Header with navigation -->
        <header class="w-full py-4 px-6 lg:px-8 bg-white dark:bg-dark-card shadow-sm">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="text-xl font-semibold">OptiWare</div>
                
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-primary-light dark:bg-primary-dark text-white hover:bg-opacity-90 transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Main content -->
        <main class="flex-grow flex items-center justify-center p-6 lg:p-8">
            <div class="w-full max-w-4xl flex flex-col-reverse lg:flex-row gap-6">
                <!-- Content card -->
                <div class="flex-1 p-6 text-4xl font-bold text-gray-700 dark:text-gray-300 opacity-30 lg:p-10 bg-light-card dark:bg-dark-card rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    G-20
                </div>
                
                <!-- Image/illustration placeholder -->
                <div class="w-full lg:w-1/2 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg overflow-hidden relative min-h-[300px] lg:min-h-[400px]">
                    <!-- You can replace this with your own illustration -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-4xl font-bold text-gray-700 dark:text-gray-300 opacity-30">
                            G-20
                        </div>
                    </div>
                    <div class="absolute inset-0 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-6 px-6 lg:px-8 bg-white dark:bg-dark-card border-t border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto text-center text-gray-600 dark:text-gray-400 text-sm">
                &copy; 2025 OptiWare. All rights reserved.
            </div>
        </footer>
    </body>
</html>