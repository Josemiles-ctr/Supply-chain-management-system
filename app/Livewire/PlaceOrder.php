<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\DatabaseNotification;

class PlaceOrder extends Component
{
    public $cart = [];
    public $notifications = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->loadNotifications();
    }

    public function updatedCart()
    {
        session()->put('cart', $this->cart);
    }

    public function loadNotifications()
    {
        $user = Auth::user();
        $this->notifications = $user ? $user->unreadNotifications : [];
    }

    public function markNotificationAsRead($notificationId)
    {
        $user = Auth::user();
        if ($user) {
            $notification = $user->unreadNotifications->find($notificationId);
            if ($notification) {
                $notification->markAsRead();
                $this->loadNotifications();
            }
        }
    }

    public function addToCart($productId)
    {
        if (!isset($this->cart[$productId])) {
            $this->cart[$productId] = 1;
        } else {
            $this->cart[$productId]++;
        }

        session()->put('cart', $this->cart);
    }

    public function removeFromCart($productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);
    }

    public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]++;
        }

        session()->put('cart', $this->cart);
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]--;
            if ($this->cart[$productId] <= 0) {
                unset($this->cart[$productId]);
            }
        }

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

    public function render()
    {
        return view('livewire.place-order', [
            'products' => Product::with('inventory')->get(),
        ]);
    }
}