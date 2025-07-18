@props(['title' => 'Settings',
'description'=> 'Manage your profile and account settings'])

<div class="relative mb-6 w-full bg-blue-300 ro">
    <flux:heading size="xl" level="1">{{ __($title) }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __($description) }}</flux:subheading>
    <flux:separator variant="subtle" />
    {{ $slot }}
</div>
