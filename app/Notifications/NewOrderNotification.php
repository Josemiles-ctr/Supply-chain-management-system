<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct(Order $order)
    {
        // Load relationships needed for notification
        $this->order = $order->loadMissing('orderitems.product', 'user');
    }

    protected function formatOrderItems(): array
    {
        return $this->order->orderitems->map(function ($item) {
            $product = $item->product;
            $price = $item->price ?? ($product->price ?? 0);

            return [
                'product_name'   => $product->name ?? 'Unknown',
                'quantity'       => $item->quantity,
                'price_per_item' => $price,
                'total_price'    => $price * $item->quantity,
            ];
        })->toArray();
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        $buyerName = $this->order->user->name ?? 'Unknown Customer';

        $items = $this->formatOrderItems();
        $overallTotal = array_sum(array_column($items, 'total_price'));

        return new DatabaseMessage([
            'message'             => 'A new order has been placed.',
            'buyer_name'          => $buyerName,
            'items'               => $items,
            'order_id'            => $this->order->id,
            'overall_total_price' => $overallTotal,
        ]);
    }

    public function toArray($notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'buyer_name' => $this->order->user->name ?? 'Unknown Customer',
        ];
    }
}
