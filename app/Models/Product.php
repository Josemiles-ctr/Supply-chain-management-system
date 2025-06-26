<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'price', 
        'vendor_id',    // Optional, can be null
        'inventory_id'  // Optional, can be null
    ];

    // Relationships

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'User_id');
    }
    public function manufacture(){
        return $this->belongsTo(User::class,'User_id',);
    }

    // A product can belong to many orders through order items
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}