<div>
    <x-layouts.dashboard-component-heading
        title="Place your order"
        description="Ensure to select your most convenient method of payment before placing your order"
        icon="shopping-cart"
        iconColor="text-blue-500"
       >

    <div class="p-6 bg-white rounded-xl shadow-md max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Checkout</h2>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 text-red-600">{{ session('error') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="w-full text-left mb-6 border border-gray-300 rounded">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="p-3 border-r">Product</th>
                    <th class="p-3 border-r">Qty</th>
                    <th class="p-3 border-r">Price</th>
                    <th class="p-3">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $productId => $quantity)
                    @php
                        $product = \App\Models\Product::find($productId);
                    @endphp
                    @if ($product)
                        <tr class="border-b">
                            <td class="p-3">{{ $product->name }}</td>
                            <td class="p-3 flex items-center space-x-2">
                                <button wire:click="decreaseQuantity({{ $productId }})" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                <span>{{ $quantity }}</span>
                                <button wire:click="increaseQuantity({{ $productId }})" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                            </td>
                            <td class="p-3">UGX {{ number_format($product->price) }}</td>
                            <td class="p-3">UGX {{ number_format($product->price * $quantity) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        
           
        </div>

        <div class="flex justify-between items-center font-bold text-lg">
            <span>Total: UGX {{ number_format($totalPrice) }}</span>
            <button wire:click="placeOrder" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Order
            </button>
        </div>
    @endif
</div>
    
   
   </x-layouts.dashboard-component-heading>
</div>