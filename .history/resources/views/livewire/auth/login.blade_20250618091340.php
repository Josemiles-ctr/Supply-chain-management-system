<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-zinc-900 px-4">
    <div class="w-full max-w-md bg-white dark:bg-zinc-800 rounded-xl shadow-lg p-8 space-y-8">
        <!-- Header -->
        <div class="text-center space-y-2">
            <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">
                {{ __('Log in to your account') }}
            </h2>
            <p class="text-zinc-500 dark:text-zinc-400">
                {{ __('Enter your email and password below to log in') }}
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="text-center text-green-600 dark:text-green-400 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form wire:submit="login" class="space-y-6">
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                    {{ __('Email address') }}
                </label>
                <input
                    wire:model="email"
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                    {{ __('Password') }}
                </label>
                <input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="{{ __('Password') }}"
                    class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="absolute right-0 top-0 text-sm text-indigo-600 dark:text-indigo-400 hover:underline"
                        wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    wire:model="remember"
                    id="remember"
                    name="remember"
                    type="checkbox"
                    class="h-4 w-4 text-indigo-600 border-zinc-300 dark:border-zinc-700 rounded focus:ring-indigo-500"
                />
                <label for="remember" class="ml-2 block text-sm text-zinc-700 dark:text-zinc-200">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline" wire:navigate>
                    {{ __('Sign up') }}
                </a>
            </div>
        @endif
    </div>
</div>
