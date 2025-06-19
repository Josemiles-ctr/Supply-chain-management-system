<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;



class InventoryController extends Controller
{
    // List all inventory items
    public function index()
    {
        return Inventory::with('product')->get();
    }

    // Show specific inventory item
    public function show($id)
    {
        return Inventory::with('product')->findOrFail($id);
    }

    // Add new inventory record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'location'   => 'required|string',
            'quantity'   => 'required|integer|min:0',
        ]);

        return Inventory::create($validated);
    }

    // Update existing inventory
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $validated = $request->validate([
            'quantity' => 'nullable|integer|min:0',
            'location' => 'nullable|string',
        ]);

        $inventory->update($validated);

        return $inventory;
    }

    // Delete inventory record
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return response()->json(['message' => 'Inventory deleted.']);
    }

    // Get low-stock items
    public function lowStockAlerts()
    {
        return Inventory::with('product')
            ->whereColumn('quantity', '<', 'reorder_level')
            ->get();
    }

    // Trigger reorder logic (simplified)
    public function triggerReorder($id)
    {
        $inventory = Inventory::with('product')->findOrFail($id);

        // Example: create a new order record (pseudo-code)
        // Order::create([...]);

        return response()->json([
            'message' => 'Reorder triggered for product: ' . $inventory->product->name,
            ]);
    }
    
//

public function dashboard()
{
    $productsCount = \App\Models\Product::count();
    $totalStock = \App\Models\Product::all()->sum(fn($p) => $p->currentStock());
    $stockValue = \App\Models\Product::all()->sum(fn($p) => $p->currentStock() * $p->price);
    $recentProducts = \App\Models\Product::latest()->take(5)->get();

    return view('inventory.dashboard', compact('productsCount', 'totalStock', 'stockValue', 'recentProducts'));
}

// ...existing code...
}
