<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <flux:heading size="xl" level="1">{{ __('Order Management') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Overview of user orders') }}</flux:subheading>
    <flux:separator variant="subtle" />


    <h1>Place Orders Here</h1>
</div>
    <div class="bg-gray-100 text-gray-800 border rounded-xl shadow overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Order Dashboard</h2>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-blue-600 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Total Orders</h5>
                    <h3 class="text-2xl font-bold">1,240</h3>
                    <p class="text-sm">+8% from last week</p>
                </div>
                <div class="bg-green-600 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Pending Orders</h5>
                    <h3 class="text-2xl font-bold">450</h3>
                    <p class="text-sm">+12% from last month</p>
                </div>
                <div class="bg-yellow-500 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Completed Orders</h5>
                    <h3 class="text-2xl font-bold">790</h3>
                    <p class="text-sm">-4% from last week</p>
                </div>
                <div class="bg-red-600 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Cancelled Orders</h5>
                    <h3 class="text-2xl font-bold">23</h3>
                    <p class="text-sm">+18% this week</p>
                </div>
            </div>

            <!-- Charts in Same Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Line Chart -->
                <div class="bg-white rounded-lg shadow p-4 h-[350px] flex flex-col">
                    <div class="font-semibold text-gray-700 mb-2">Orders Over Time (Line)</div>
                    <div class="flex-1">
                        <canvas id="lineChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Pie Chart -->