<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class InventoryManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $editId = null;
    public $editStock = null;
    public $lowStockThreshold = 10;
    public $newProductName;
    public $newStock;
    public $lowStock; 

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

        if (
            (Auth::user()->role === 'vendor' && $inventory->vendor_id === Auth::id()) ||
            (Auth::user()->role === 'manufacturer' && $inventory->manufacturer_id === Auth::id())
        ) {
            $this->editId = $id;
            $this->editStock = $inventory->stock;
        } else {
            session()->flash('error', 'Unauthorized access.');
        }
    }

    public function updateStock()
    {
        $inventory = Inventory::findOrFail($this->editId);

        if (
            (Auth::user()->role === 'vendor' && $inventory->vendor_id === Auth::id()) ||
            (Auth::user()->role === 'manufacturer' && $inventory->manufacturer_id === Auth::id())
        ) {
            $inventory->stock = $this->editStock;
            $inventory->save();

            session()->flash('message', 'Stock updated successfully.');
        } else {
            session()->flash('error', 'Unauthorized action.');
        }

        $this->editId = null;
        $this->editStock = null;
    }

    public function cancelEdit()
    {
        $this->editId = null;
        $this->editStock = null;
    }

    public function updatedSearch()
    {
        $this->resetPage(); // reset pagination when search changes
    }

    public function render()
    {
        $user = Auth::user();

        $query = Inventory::with(['product', 'location']);

        if ($user->role === 'vendor') {
            $query->where('vendor_id', $user->id);
        } elseif ($user->role === 'manufacturer') {
            $query->where('manufacturer_id', $user->id);
        }

        if ($this->search) {
            $query->whereHas('product', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $inventories = $query->paginate(15);

        $lowStock = $query->get()->filter(function ($item) {
            return $item->stock <= ($item->reorder_level ?? $this->lowStockThreshold);
        });

        return view('livewire.inventory', compact('inventories', 'lowStock'));
    }
    public function addInventory()
{
    $this->validate([
        'newProductName' => 'required|string|max:255',
        'newStock' => 'required|integer|min:0',
    ]);

    $product = \App\Models\Product::firstOrCreate(['name' => $this->newProductName]);

    Inventory::create([
        'product_id' => $product->id,
        'stock' => $this->newStock,
        'vendor_id' => Auth::user()->role === 'vendor' ? Auth::id() : null,
        'manufacturer_id' => Auth::user()->role === 'manufacturer' ? Auth::id() : null,
    ]);

    $this->reset(['newProductName', 'newStock']);
    $this->loadLowStockItems(); // Refresh
    session()->flash('message', 'Inventory item added successfully.');

}
public function mount()
{
    $this->loadLowStockItems();
}
    public function loadLowStockItems()
    {
        $this->lowStock = Inventory::where('stock', '<=', $this->lowStockThreshold)
            ->where(function ($query) {
                $query->where('vendor_id', Auth::id())
                      ->orWhere('manufacturer_id', Auth::id());
            })
            ->get();
    }
}