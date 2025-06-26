<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'status',
        'customer_id',
        'manufacturer_id',
        
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(User::class, 'manufacturer_id');
    }

    // Remove this if using order_items for products
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

public function vendor()
{
    return $this->belongsTo(Vendor::class);
}
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}