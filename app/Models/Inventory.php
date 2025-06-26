<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $fillable = ['name', 'quantity', 'location'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
