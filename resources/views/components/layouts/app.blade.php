<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- CSS and Fonts -->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    
    @livewireStyles
</head>
<body class="bg-gray-100">

    <!-- Sidebar and Page Content -->
    <x-layouts.app.sidebar :title="$title ?? null">
        <flux:main>
            {{ $slot }}
        </flux:main>
    </x-layouts.app.sidebar>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @livewireScripts
</body>
</html>