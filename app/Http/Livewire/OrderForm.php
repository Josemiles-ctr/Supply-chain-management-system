<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product; // Required
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderForm extends Component
{
    public $products;
    public $product_id;
    public $quantity;

    public function mount()
    {
        $this->products = Product::all(); // ✅ LINE 14
        $this->quantity = 1;
    }

    public function placeOrder()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($this->product_id);

        if ($product->stock < $this->quantity) {
            $this->addError('quantity', 'Not enough stock.');
            return;
        }

        $total = $product->price * $this->quantity;

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $this->quantity,
            'total_price' => $total,
        ]);

        $product->stock -= $this->quantity;
        $product->save();

        session()->flash('message', 'Order placed!');
        $this->reset(['product_id', 'quantity']);
        $this->mount(); // Refresh products
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
