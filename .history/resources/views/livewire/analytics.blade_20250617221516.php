<div>
    {{-- Be like water. --}}
</div>
<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Analytics') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Overview of user interactions and engagement') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <div class="bg-gray-100 text-gray-800">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Analytics Dashboard</h2>
    
            <!-- Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-blue-600 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Users</h5>
                    <h3 class="text-2xl font-bold">1,240</h3>
                    <p class="text-sm">+8% from last week</p>
                </div>
                <div class="bg-green-600 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Sales</h5>
                    <h3 class="text-2xl font-bold">$4,500</h3>
                    <p class="text-sm">+12% from last month</p>
                </div>
                <div class="bg-yellow-500 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Sessions</h5>
                    <h3 class="text-2xl font-bold">2,340</h3>
                    <p class="text-sm">-4% from last week</p>
                </div>
                <div class="bg-red-600 text-white rounded-lg p-4 shadow">
                    <h5 class="text-lg font-medium">Errors</h5>
                    <h3 class="text-2xl font-bold">23</h3>
                    <p class="text-sm">+18% this week</p>
                </div>
            </div>
    
            <!-- Charts in Same Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Line Chart -->
                <div class="bg-white rounded-lg shadow p-4 h-[350px] flex flex-col">
                    <div class="font-semibold text-gray-700 mb-2">Sales Over Time (Line)</div>
                    <div class="flex-1">
                        <canvas id="lineChart" class="w-full h-full"></canvas>
                    </div>
                </div>
    
                <!-- Pie Chart -->
                <!-- Pie Chart -->
                <div class="bg-white rounded-lg shadow p-4 h-[350px] flex flex-col">
                    <div class="font-semibold text-gray-700 mb-2">Product Share (Pie)</div>
                    <div class="flex-1 flex items-center justify-center">
                        <canvas id="pieChart" class="w-full max-w-xs h-64"></canvas>
                    </div>
                </div>
      
    
                <!-- Bar Chart -->
                <div class="bg-white rounded-lg shadow p-4 h-[350px] flex flex-col">
                    <div class="font-semibold text-gray-700 mb-2">Monthly Visitors (Bar)</div>
                    <div class="flex-1">
                        <canvas id="barChart" class="w-full h-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Chart.js Setup -->
        <script>
            new Chart(document.getElementById("lineChart"), {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                    datasets: [{
                        label: 'Revenue',
                        data: [1200, 1900, 3000, 2500, 3200, 4000],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: true } }
                }
            });
    
            new Chart(document.getElementById("pieChart"), {
                type: 'pie',
                data: {
                    labels: ["Product A", "Product B", "Product C"],
                    datasets: [{
                        data: [45, 25, 30],
                        backgroundColor: ['#3b82f6', '#22c55e', '#eab308']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
    
            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                    datasets: [{
                        label: 'Visitors',
                        data: [300, 400, 320, 500, 450, 600],
                        backgroundColor: '#ef4444'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } }
                }
            });
        </script>
    </div>
</div>

