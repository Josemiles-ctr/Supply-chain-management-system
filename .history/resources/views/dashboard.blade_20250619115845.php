<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Welcome Message -->
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('Welcome,') }} {{ Auth::user()->name ?? 'User' }}!
            </h2>
            <p class="text-gray-600 dark:text-gray-300">
                {{ __("Here's a quick overview of your account.") }}
            </p>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- User Info Card -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-6 flex flex-col justify-center">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ Auth::user()->name ?? 'User' }}
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{ Auth::user()->email ?? '-' }}
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-400">
                    {{ __('Member since') }} {{ Auth::user()->created_at ? Auth::user()->created_at->format('M Y') : '-' }}
                </div>
            </div>
            <!-- Placeholder Cards -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <!-- Main Content Placeholder -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 mt-4">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
