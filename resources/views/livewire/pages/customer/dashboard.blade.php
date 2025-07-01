<x-layouts.dashboard-component-heading
    title="Welcome, {{ auth()->user()->name }}!"
    description="Here's a quick overview of your account."
><h1>THIS IS CUSTOMER DASHBOARD</h1>
    {{-- You can add summary cards or quick stats here, but DO NOT include inventory --}}
</x-layouts.dashboard-component-heading>
