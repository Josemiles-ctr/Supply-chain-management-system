<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawMaterialsPurchaseItem extends Model
{
   $protected $fillable = [
        'raw_material_id',
        'purchase_order_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function getRawMaterialNameAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->name : 'Unknown Raw Material';
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}