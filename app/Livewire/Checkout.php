<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewOrderNotification;
use App\Models\User;
use App\Models\Customer;

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
    if (!$user) {
        session()->flash('error', 'You must be logged in.');



// Create the order
$order = Order::create([
    'customer_id' => $customer->id,
    'manufacturer_id' => 32, // or get from logic
    'status' => 'pending',
    'order_date' => now(),
]);

    // Add order items
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
            
        }
    }

    // Load customer and item details for notification
    $order->load('customer', 'items.product');

    // Notify manufacturer (user)
    if ($order->manufacturer) {
        $order->manufacturer->notify(new NewOrderNotification($order));
    }

    // Clear cart
    session()->forget('cart');
    $this->cart = [];

    session()->flash('success', 'Order placed successfully!');
   // return redirect()->to('/checkout');
}

    public function render()
    {
        return view('livewire.checkout', [      
            'cart' => $this->cart,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}