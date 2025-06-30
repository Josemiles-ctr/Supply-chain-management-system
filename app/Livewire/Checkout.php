<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewOrderNotification;
use App\Models\User;

class Checkout extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]++;
            session()->put('cart', $this->cart);
        }
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]--;
            if ($this->cart[$productId] <= 0) {
                unset($this->cart[$productId]);
            }
            session()->put('cart', $this->cart);
        }
    }

    public function removeFromCart($productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);
    }

    public function getTotalPriceProperty()
    {
        $total = 0;
        foreach ($this->cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $total += $product->price * $quantity;
            }
        }
        return $total;
    }

    public function placeOrder()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Your cart is empty.');
            return;
        }

        $user = Auth::user();

        // Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'order_date' => now(),
        ]);

        $manufacturerId = null;

        // Add items to order
        foreach ($this->cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'order_date' => now(),
                ]);

                // Set manufacturerId from the first product
                if (is_null($manufacturerId)) {
                    $manufacturerId = $product->user_id;
                }
            }
        }

        // Load relationships for the notification
        $order->load('user', 'orderitems.product');

        // Notify the manufacturer
        if ($manufacturerId) {
            $manufacturer = User::find($manufacturerId);
            if ($manufacturer && $manufacturer->role === 'manufacturer') {
                $manufacturer->notify(new NewOrderNotification($order));
            }
        }

        // Clear cart
        session()->forget('cart');
        $this->cart = [];

        session()->flash('success', 'Order placed successfully!');
    }

    public function render()
    {
        return view('livewire.checkout', [
            'cart' => $this->cart,
            'totalPrice' => $this->totalPrice,
        ]);
    }
} 