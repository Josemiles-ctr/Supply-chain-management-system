<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'price',
        'order_id',
        'vendor_id',
        'inventory_id',
        'production_cost',
        'current_stock',
        'unit_of_measure',
        'reorder_level',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}