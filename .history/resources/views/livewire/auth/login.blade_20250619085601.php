<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-zinc-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-900">
    <div class="w-full max-w-md bg-white dark:bg-zinc-900 rounded-2xl shadow-xl p-8 sm:p-10 border border-zinc-200 dark:border-zinc-800">
        <div class="flex flex-col gap-6">
            <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

            <!-- Session Status -->
            <x-auth-session-status class="text-center" :status="session('status')" />

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
                    class="rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
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
                        class="rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
                    />

                    @if (Route::has('password.request'))
                        <flux:link class="absolute end-0 top-0 text-sm text-blue-600 hover:underline dark:text-blue-400" :href="route('password.request')" wire:navigate>
                            {{ __('Forgot your password?') }}
                        </flux:link>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <flux:checkbox wire:model="remember" :label="__('Remember me')" class="mr-2" />
                </div>

                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full py-3 rounded-lg text-base font-semibold shadow-md hover:bg-blue-700 transition-colors duration-200">
                        {{ __('Log in') }}
                    </flux:button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400 mt-4">
                    {{ __('Don\'t have an account?') }}
                    <flux:link :href="route('register')" wire:navigate class="text-blue-600 hover:underline dark:text-blue-400">{{ __('Sign up') }}</flux:link>
                </div>
            @endif
        </div>
    </div>
</div>
