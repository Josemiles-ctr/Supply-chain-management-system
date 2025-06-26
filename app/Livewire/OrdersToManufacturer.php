<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderStatusUpdatedNotification;

class OrdersToManufacturer extends Component
{
    public $orders = [];
    public $notifications = [];

    public function mount()
    {
        $this->refreshOrders();
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        $this->notifications = Auth::user()->unreadNotifications;
    }

    public function markNotificationAsRead($notificationId)
    {
        $notification = Auth::user()->unreadNotifications->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            $this->loadNotifications();
        }
    }

    #[\Livewire\Attributes\On('orderPlaced')]
    public function refreshOrders()
    {
        $this->orders = Order::with(['items.product.inventory', 'customer.user'])
            ->where('manufacturer_id', Auth::id())
            ->latest()
            ->get();

        $this->loadNotifications();
    }

   public function updateStatus($orderId, $status)
{
    $order = Order::with(['items.product.inventory', 'customer.user'])->find($orderId);

    if (!$order || $order->manufacturer_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    if ($order->status === $status) {
        session()->flash('error', "Order is already marked as '$status'.");
        return;
    }

    // Handle inventory decrement only if status becomes 'confirmed'
    if ($status === 'confirmed') {
        foreach ($order->items as $item) {
            $inventory = $item->product?->inventory;

            if (!$inventory) {
                session()->flash('error', "No inventory found for {$item->product?->name}.");
                return;
            }

            if ($inventory->quantity < $item->quantity) {
                session()->flash('error', "Insufficient stock for {$item->product->name}. Available: {$inventory->quantity}");
                return;
            }

            $inventory->decrement('quantity', $item->quantity);
        }
    }

    // Update the status
    $order->status = $status;
    $order->save();

    // Notify the customer of the status change
    if ($order->customer && $order->customer->user) {
        $order->customer->user->notify(new OrderStatusUpdatedNotification($order));
    }

    session()->flash('message', 'Order status updated to ' . ucfirst($status) . '.');
    $this->refreshOrders();
}
public function updatePaymentStatus($orderId, $status)
{
    $order = Order::find($orderId);

    if (!$order || $order->manufacturer_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    $order->payment_status = $status;
    $order->save();

    session()->flash('message', 'Payment status updated successfully.');
    $this->refreshOrders(); // if you're using a method to reload orders
}

    public function render()
    {
        return view('livewire.orders-to-manufacturer', [
    'orders' => $this->orders,
    'notifications' => $this->notifications,
        ]);
    }
};