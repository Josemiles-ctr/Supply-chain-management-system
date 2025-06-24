<x-layouts.dashboard-component-heading  
    title="Inventory Management"
    description="Manage your inventory items and monitor stock levels"
>
    @php
        $role = auth()->user()->role;
    @endphp

    @if(in_array($role, ['vendor', 'manufacturer']))
        {{-- Inventory Search and Management --}}
        <div class="mb-6">
            <input
                type="text"
                wire:model.debounce.500ms="search"
                placeholder="Search by product name..."
                class="border px-4 py-2 rounded w-full sm:w-1/3"
            />
        </div>

        {{-- Flash Messages --}}
        @if (session()->has('message'))
            <div class="text-green-600 mb-2">{{ session('message') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="text-red-600 mb-2">{{ session('error') }}</div>
        @endif

        {{-- Sidebar Overview (Polls every 10s) --}}
        <aside class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-sm" wire:poll.10s>
            <h3 class="text-lg font-semibold mb-2">📦 Inventory Overview</h3>

            <ul class="space-y-1 text-sm text-gray-700 mb-4">
                @forelse($lowStock as $item)
                    <li>
                        {{ $item->product->name ?? $item->item_name }} 
                        ({{ $item->location->name ?? 'N/A' }}): 
                        <span @class(['text-red-600 font-semibold' => $item->stock <= ($item->reorder_level ?? 10)])>
                            {{ $item->stock }}
                        </span>
                    </li>
                @empty
                    <li class="text-gray-500">No inventory records available.</li>
                @endforelse
            </ul>

            <h4 class="text-md font-bold text-red-600 mb-2">⚠️ Low Stock Alerts</h4>
            <ul class="space-y-1 text-sm text-gray-700">
                @forelse($lowStock as $item)
                    <li>
                        <strong>{{ $item->product->name ?? $item->item_name }}</strong> at 
                        {{ $item->location->name ?? 'N/A' }} 
                        (<span class="text-red-600 font-semibold">{{ $item->stock }} left</span>)
                    </li>
                @empty
                    <li class="text-green-600">No low stock items.</li>
                @endforelse
            </ul>
        </aside>
        {{-- Add Inventory Form --}}
<div class="mb-6 bg-white p-4 rounded shadow-sm border border-gray-200">
    <h3 class="font-bold text-md mb-4">➕ Add New Inventory Item</h3>

    @if (session()->has('message'))
        <div class="mb-2 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="addInventory">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="product" class="block text-sm font-medium">Product Name</label>
                <input type="text" wire:model="newProductName" id="product" class="w-full border-gray-300 rounded-md shadow-sm" />
                @error('newProductName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium">Stock Quantity</label>
                <input type="number" wire:model="newStock" id="stock" class="w-full border-gray-300 rounded-md shadow-sm" />
                @error('newStock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Item
            </button>
        </div>
    </form>
</div>

        {{-- Inventory Table --}}
        <div class="bg-white p-4 rounded-md shadow-sm border border-gray-200 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Reorder Level</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inventories as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $item->product->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item->location->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                @if ($editId === $item->id)
                                    <input type="number" wire:model="editStock" class="border px-2 py-1 rounded w-24" />
                                @else
                                    {{ $item->stock }}
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $item->reorder_level ?? '-' }}</td>
                            <td class="px-4 py-2">
                                @if ($editId === $item->id)
                                    <button wire:click="updateStock" class="bg-green-500 text-white px-2 py-1 rounded mr-2">Save</button>
                                    <button wire:click="cancelEdit" class="bg-gray-400 text-white px-2 py-1 rounded">Cancel</button>
                                @else
                                    <button wire:click="edit({{ $item->id }})" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">No inventory items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $inventories->links() }}
        </div>
    @else
        {{-- Unauthorized --}}
        <div class="p-6 bg-yellow-50 border border-yellow-200 rounded-md">
            <p class="text-yellow-700 font-semibold">
                You do not have access to the inventory section.
            </p>
        </div>
    @endif
</x-layouts.dashboard-component-heading>