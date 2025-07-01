<div class="overflow-x-auto">
    <table class="w-full border text-sm text-left">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="border px-4 py-2">Product</th>
                <th class="border px-4 py-2">Location</th>
                <th class="border px-4 py-2">Stock</th>
                <th class="border px-4 py-2">Reorder Level</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventories as $item)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $item->item_name }}</td>
                    <td class="border px-4 py-2">{{ $item->location->name ?? 'N/A' }}</td>

                    {{-- Editable Stock Field --}}
                    <td class="border px-4 py-2">
                        @if ($editId === $item->id)
                            <input
                                type="number"
                                wire:model.defer="editStock"
                                class="w-20 p-1 border border-gray-300 rounded"
                            />
                        @else
                            {{ $item->stock }}
                        @endif
                    </td>

                    <td class="border px-4 py-2">{{ $item->reorder_level }}</td>

                    <td class="border px-4 py-2">
                        @if ($item->stock <= $item->reorder_level)
                            <span class="text-red-600 font-semibold">Low</span>
                        @else
                            <span class="text-green-600 font-semibold">OK</span>
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td class="border px-4 py-2">
                        @if ($editId === $item->id)
                            <button
                                wire:click="updateStock"
                                class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700"
                            >
                                Save
                            </button>
                            <button
                                wire:click="cancelEdit"
                                class="px-3 py-1 bg-gray-500 text-white text-xs rounded hover:bg-gray-600 ml-2"
                            >
                                Cancel
                            </button>
                        @else
                            <button
                                wire:click="edit({{ $item->id }})"
                                class="px-3 py-1 bg-gray-700 text-white text-xs rounded hover:bg-gray-800"
                            >
                                Edit
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">
                        No inventory records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>