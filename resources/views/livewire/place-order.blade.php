<div>
    <x-layouts.dashboard-component-heading
        title="Place your order"
        description="Select the product you want to order and proceed to checkout"
    >

        <!-- Available Products -->
        <div class="mt-6">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Available Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                    @php $stock = $product->inventory->quantity ?? 0; @endphp
                    <div class="border border-gray-200 rounded-lg p-4 shadow-sm bg-white hover:shadow-md transition">
                        <h3 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h3>
                        <p class="text-gray-600 mt-2">
                            Price: <span class="font-medium text-black">${{ number_format($product->price, 2) }}</span>
                        </p>
                        <p class="text-gray-600">
                            In Stock: <span class="text-black">{{ $stock }}</span>
                        </p>
                        <button
                            wire:click="addToCart({{ $product->id }})"
                            class="mt-4 w-full px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed transition"
                            @if($stock == 0) disabled @endif
                        >
                            {{ $stock == 0 ? 'Out of Stock' : 'Add to Cart' }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Shopping Cart -->
        <div class="mt-10">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Cart</h2>

            @if(count($cart) > 0)
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Product</th>
                                <th class="px-6 py-3 text-center">Qty</th>
                                <th class="px-6 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($cart as $productId => $qty)
                                @php $product = \App\Models\Product::find($productId); @endphp
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="inline-flex items-center space-x-2">
                                            <button wire:click="decreaseQuantity({{ $productId }})"
                                                    class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 focus:outline-none"
                                                    title="Decrease quantity">−</button>
                                            <span class="font-medium">{{ $qty }}</span>
                                            <button wire:click="increaseQuantity({{ $productId }})"
                                                    class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 focus:outline-none"
                                                    title="Increase quantity"
                                                    @if($product->inventory->quantity <= $qty) disabled @endif>+</button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">${{ number_format($product->price * $qty, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr class="font-semibold text-black bg-gray-50">
                                <td colspan="2" class="px-6 py-3 text-right">Total:</td>
                                <td class="px-6 py-3">${{ number_format($this->totalPrice, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('checkout') }}"
                       class="bg-green-600 text-white px-8 py-3 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                        Go to Checkout
                    </a>
                </div>
            @else
                <p class="text-gray-600 mt-2">Your cart is empty.</p>
            @endif
        </div>

        <!-- Flash Messages -->
        @if (session()->has('error'))
            <div class="mt-6 bg-red-100 text-red-800 p-4 rounded shadow">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('message'))
            <div class="mt-6 bg-green-100 text-green-800 p-4 rounded shadow">
                {{ session('message') }}
            </div>
        @endif

        <!-- Notifications -->
        @if ($notifications->count())
            <div class="mt-10">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Notifications</h2>
                <div class="space-y-4">
                    @foreach ($notifications as $note)
                        <div class="bg-green-50 border border-green-200 p-4 rounded shadow-sm relative hover:shadow-md transition">
                            <button wire:click="markNotificationAsRead('{{ $note->id }}')"
                                    class="absolute top-3 right-3 text-sm text-gray-500 hover:text-gray-800 hover:underline focus:outline-none"
                                    aria-label="Mark notification as read">✖</button>

                            <p class="font-semibold text-green-800 mb-1">
                                {{ $note->data['message'] ?? 'Notification' }}
                            </p>

                            @if (!empty($note->data['items']) && is_array($note->data['items']))
                                <ul class="list-disc list-inside text-gray-700 mb-2">
                                    @foreach ($note->data['items'] as $item)
                                        <li class="mb-1">
                                            <strong>Product:</strong> {{ $item['product_name'] ?? 'N/A' }}<br>
                                            <strong>Quantity:</strong> {{ $item['quantity'] ?? 'N/A' }}<br>
                                            <strong>Price per item:</strong> ${{ number_format($item['price_per_item'] ?? 0, 2) }}<br>
                                            <strong>Total price:</strong> ${{ number_format($item['total_price'] ?? 0, 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                                <p class="font-semibold text-black mt-2">
                                    Overall Total Price: ${{ number_format($note->data['overall_total_price'] ?? 0, 2) }}
                                </p>
                            @endif

                            <span class="text-xs text-gray-500">
                                Sent {{ \Carbon\Carbon::parse($note->created_at)->diffForHumans() }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </x-layouts.dashboard-component-heading>
</div>
