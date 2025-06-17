<div>
  <div class="max-w-md mx-auto mt-6 p-4 border rounded shadow">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="placeOrder">
        <div class="mb-4">
            <label for="product" class="block font-bold">Select Product:</label>
            <select wire:model="product_id" class="w-full border rounded px-2 py-1">
                <option value="">-- Choose Product --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} (UGX {{ number_format($product->price) }}) - {{ $product->stock }} in stock
                    </option>
                @endforeach
            </select>
            @error('product_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-bold">Quantity:</label>
            <input type="number" wire:model="quantity" min="1" class="w-full border rounded px-2 py-1">
            @error('quantity') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">
            Place Order
        </button>
    </form>
</div>
  {{-- Be like water. --}}
</div>
