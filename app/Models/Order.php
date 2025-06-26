<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // The customer who placed the order
        'status',
        'order_date',
        'payment_status', // Optional: if you track payment
    ];

    /**
     * The customer who placed the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The items included in this order.
     */
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
