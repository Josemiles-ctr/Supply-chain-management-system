<div>
    <x-layouts.dashboard-component-heading
        title="Orders to Manufacturer"
        description="Manage your orders and update their status"
        icon="shopping-cart"
        iconColor="text-blue-500"
    >
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">My Orders</h1>

            @if (session()->has('message'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-4 shadow">
                    {{ session('message') }}
                </div>
            @endif

            <div wire:poll.5s>
                <!-- Orders Table -->
                <table class="w-full border border-gray-300 rounded-md mb-6">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border-b text-left">Order ID</th>
                            <th class="p-3 border-b text-left">Products</th>
                            <th class="p-3 border-b text-center">Quantity</th>
                            <th class="p-3 border-b text-left">Status</th>
                            <th class="p-3 border-b text-left">Action</th>
                            <th class="p-3 border-b text-left">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr wire:key="order-{{ $order->id }}" class="border-b hover:bg-gray-50">
                                <td class="p-3 align-top font-medium">{{ $order->id }}</td>
                                <td class="p-3 align-top">
                                    @foreach ($order->orderitems as $item)
                                        <div>{{ $item->product->name ?? 'N/A' }}</div>
                                    @endforeach
                                </td>
                                <td class="p-3 text-center align-top">
                                    @foreach ($order->orderitems as $item)
                                        <div>{{ $item->quantity }}</div>
                                    @endforeach
                                </td>
                                <td class="p-3 align-top capitalize font-semibold">{{ $order->status }}</td>
                                <td class="p-3 align-top">
                                    <select 
                                        wire:change="updateStatus({{ $order->id }}, $event.target.value)" 
                                        class="border rounded px-2 py-1 text-sm w-full"
                                    >
                                        <option value="" selected disabled>--Change Status--</option>
                                        <option value="pending" @selected($order->status == 'pending')>Pending</option>
                                        <option value="confirmed" @selected($order->status == 'confirmed')>Confirmed</option>
                                        <option value="cancelled" @selected($order->status == 'cancelled')>Cancelled</option>
                                        <option value="out for delivery" @selected($order->status == 'out for delivery')>Out for Delivery</option>
                                        <option value="delivered" @selected($order->status == 'delivered')>Delivered</option>
                                        <option value="returned" @selected($order->status == 'returned')>Returned</option>
                                    </select>
                                </td>
                                <td class="p-3 align-top">
                                    <div class="mt-1">
                                        <select wire:change="updatePaymentStatus({{ $order->id }}, $event.target.value)" class="border rounded px-2 py-1 text-sm">
                                            <option value="" disabled selected>--Change Status--</option>
                                            <option value="unpaid" @selected($order->payment_status === 'unpaid')>Unpaid</option>
                                            <option value="paid" @selected($order->payment_status === 'paid')>Paid</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-6 text-gray-600">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Notifications -->
                <div>
                    <h3 class="text-lg font-semibold mb-3 text-gray-800">Notifications</h3>

                    @forelse ($notifications as $notification)
                        <div class="p-4 bg-yellow-100 rounded shadow flex justify-between items-start mb-3">
                            <div>
                                <strong class="block text-yellow-800">
                                    {{ $notification->data['message'] ?? 'Notification' }}
                                </strong>

                                <small class="block">Buyer: {{ $notification->data['buyer_name'] ?? 'Unknown' }}</small>

                                @if (!empty($notification->data['items']) && is_array($notification->data['items']))
                                    <ul class="list-disc list-inside text-sm text-gray-700 mt-2">
                                        @foreach ($notification->data['items'] as $item)
                                            <li>
                                                {{ $item['product_name'] ?? 'N/A' }} –
                                                Qty: {{ $item['quantity'] }},
                                                Price: ${{ number_format($item['price_per_item'] ?? 0, 2) }},
                                                Total: ${{ number_format($item['total_price'] ?? 0, 2) }}
                                            </li>
                                        @endforeach
                                    </ul>

                                    <p class="mt-2 text-sm text-gray-800 font-semibold">
                                        Overall Total: ${{ number_format($notification->data['overall_total_price'] ?? 0, 2) }}
                                    </p>
                                @endif

                                <small class="text-xs text-gray-500 block mt-1">
                                    Sent {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                </small>
                            </div>

                            <button wire:click="markNotificationAsRead('{{ $notification->id }}')"
                                    class="ml-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Mark as Read
                            </button>
                        </div>
                    @empty
                        <p class="text-gray-600">No new notifications.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </x-layouts.dashboard-component-heading>
</div>