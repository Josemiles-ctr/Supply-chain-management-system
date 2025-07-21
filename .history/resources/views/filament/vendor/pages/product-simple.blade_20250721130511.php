<x-filament-panels::page>
<div>
    <div class="flex justify-end mb-4">
        <a href="{{ url('/vendor/place-order') }}" title="View Cart">
            <x-filament::button color="primary" size="lg" icon="heroicon-o-shopping-cart">
                Cart ({{ $cartCount }}) Items
            </x-filament::button>
        </a>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($products as $product)
        <div class="bg-white p-4 rounded shadow">
            <div class="w-full h-40 bg-gray-100 rounded mb-2 flex items-center justify-center">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-auto object-contain">
                @else
                    <span class="text-gray-500">No Image</span>
                @endif
            </div>
            <h3 class="font-semibold">{{ $product->name }}</h3>
            <p class="text-sm text-gray-600">SKU: {{ $product->sku }}</p>
            <p class="text-sm font-medium">Price: UGX {{ number_format($product->price) }}</p>
            
            <select class="w-full p-2 border rounded my-2" style="background: #119ae9; color: white;" id="bale_{{ $product->id }}">
                <option value="">Select Bale Size</option>
                <option value="100">Starter: 100 pieces</option>
                <option value="350">Classic: 350 pieces</option>
                <option value="750">Premium: 750 pieces</option>
            </select>
            
            <button onclick="addToCartSimple({{ $product->id }})" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded transition-colors">
                Add to Cart
            </button>
        </div>
        @endforeach
    </div>
</div>

<script>
function addToCartSimple(productId) {
    const select = document.getElementById('bale_' + productId);
    const baleSize = select.value;
    
    if (!baleSize) {
        alert('Please select a bale size first!');
        return;
    }
    
    // Call Livewire method
    @this.call('addToCartJS', productId, baleSize);
}
</script>
</x-filament-panels::page>
