<div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-zinc-900 px-4 py-12">
    <div class="w-full max-w-md space-y-6 rounded-xl bg-white dark:bg-zinc-800 p-8 shadow-lg">
        <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-sm text-green-600 dark:text-green-400" :status="session('status')" />

        <form wire:submit="login" class="flex flex-col gap-6">
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute right-0 top-0 mt-2 text-sm text-blue-600 hover:underline dark:text-blue-400" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox wire:model="remember" :label="__('Remember me')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
                {{ __('Don\'t have an account?') }}
                <flux:link class="text-blue-600 hover:underline dark:text-blue-400" :href="route('register')" wire:navigate>
                    {{ __('Sign up') }}
                </flux:link>
            </div>
        @endif
    </div>
</div>
