<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class OrderStatusUpdatedNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'message' => "Your order (ID: {$this->order->id}) status has been updated to '{$this->order->status}'.",
            'order_id' => $this->order->id,
            'status' => $this->order->status,
            'updated_at' => now(),
        ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => "Your order status has changed to {$this->order->status}.",
            'order_id' => $this->order->id,
            'status' => $this->order->status,
        ];
    }
}