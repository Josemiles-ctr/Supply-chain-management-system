<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

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
                <div class="text-xl font-semibold">OptiWa</div>
                
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
                <div class="flex-1 p-6 lg:p-10 bg-light-card dark:bg-dark-card rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                    <h1 class="text-xl font-medium mb-2">Let's get started</h1>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">We have an incredibly rich ecosystem. We suggest starting with the following.</p>
                    
                    <ul class="flex flex-col mb-6 space-y-4">
                        <li class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-4 h-4 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-gray-500 dark:bg-gray-400"></div>
                                </div>
                            </div>
                            <div>
                                Read the
                                <a href="#" target="_blank" class="inline-flex items-center font-medium text-primary-light dark:text-primary-dark hover:underline gap-1">
                                    <span>Documentation</span>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none" class="w-3 h-3">
                                        <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor" stroke-linecap="square"/>
                                    </svg>
                                </a>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-4 h-4 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-gray-500 dark:bg-gray-400"></div>
                                </div>
                            </div>
                            <div>
                                Watch video tutorials at
                                <a href="#" target="_blank" class="inline-flex items-center font-medium text-primary-light dark:text-primary-dark hover:underline gap-1">
                                    <span>Tutorials</span>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none" class="w-3 h-3">
                                        <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor" stroke-linecap="square"/>
                                    </svg>
                                </a>
                            </div>
                        </li>
                    </ul>
                    
                    <div>
                        <a href="#" class="inline-block px-5 py-2 bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 rounded-md hover:bg-gray-800 dark:hover:bg-gray-200 transition">
                            Get Started
                        </a>
                    </div>
                </div>
                
                <!-- Image/illustration placeholder -->
                <div class="w-full lg:w-1/2 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg overflow-hidden relative min-h-[300px] lg:min-h-[400px]">
                    <!-- You can replace this with your own illustration -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-4xl font-bold text-gray-700 dark:text-gray-300 opacity-30">
                            Your Illustration Here
                        </div>
                    </div>
                    <div class="absolute inset-0 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-6 px-6 lg:px-8 bg-white dark:bg-dark-card border-t border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto text-center text-gray-600 dark:text-gray-400 text-sm">
                &copy; 2025 OptiWa. All rights reserved.
            </div>
        </footer>
    </body>
</html>