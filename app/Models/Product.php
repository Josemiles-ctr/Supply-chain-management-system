<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;
    //mass assignment
    protected $fillable = ['name','price','stock',];
    public function orders(){

    
    return 
    $this->hasMany(Order::class);
    //
}  
}