<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Product;
use App\Models\User;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'location_id',
        'stock',              // rename quantity to stock for clarity
        'reorder_level',
        'vendor_id',
        'manufacturer_id'
    ];

    // Inventory belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Inventory is stored at a location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Vendor who owns this inventory
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    // Manufacturer who owns this inventory
    public function manufacturer()
    {
        return $this->belongsTo(User::class, 'manufacturer_id');
    }
}