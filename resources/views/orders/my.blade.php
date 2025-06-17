<x-app-layout>
    <h2 class="text-xl font-bold mb-4">My Orders</h2>

    @foreach ($orders as $order)
        <div class="border p-4 mb-3 rounded shadow">
            <p><strong>Product:</strong> {{ $order->product->name }}</p>
            <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
            <p><strong>Total:</strong> UGX {{ $order->total_price }}</p>
            <p><strong>Ordered on:</strong> {{ $order->created_at->format('d M Y h:i A') }}</p>
        </div>
    @endforeach
</x-app-layout>