<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    //mass assignment
    protected $fillable = ['user_id', 'product_id','quantity','total_price',];
//an order belongs to one product
public function product(){
    return $this->belongsTo(Product::class);
}
//an order belongs to one user
public function user(){
    return $this->belongsTo(User::class);
}
}