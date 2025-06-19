<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-900">
    <div class="w-full max-w-md bg-white/90 dark:bg-zinc-900/90 rounded-2xl shadow-2xl p-8 md:p-10 flex flex-col gap-8 border border-zinc-100 dark:border-zinc-800">
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
                class="rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400"
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
                    class="rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400"
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute end-0 top-0 text-sm text-indigo-600 hover:underline" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <flux:checkbox wire:model="remember" :label="__('Remember me')" class="mr-2" />
            </div>

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-md transition">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
                {{ __('Don\'t have an account?') }}
                <flux:link :href="route('register')" wire:navigate class="text-indigo-600 hover:underline font-medium">{{ __('Sign up') }}</flux:link>
            </div>
        @endif
    </div>
</div>
