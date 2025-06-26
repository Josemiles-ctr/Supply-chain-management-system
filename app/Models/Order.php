<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_date', 'status', 'customer_id', 'attribute', 'manufacturer_id', 'password'];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    public function manufacturer()
    {
        return $this->belongsTo(User::class);
    }
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
