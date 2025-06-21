<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawMaterialsPurchaseOrder extends Model
{
    protected $fillable = [
        'raw_material_id',
        'supplier_id',
        'quantity',
        'price_per_unit',
        'total_price',
        'order_date',
        'expected_delivery_date',
        'status',
        'notes',
        'delivery_option',
        'expected_quantity',
        'created_by',
    ];
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function getRawMaterialNameAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->name : 'Unknown Raw Material';
    }
    public function getSupplierNameAttribute()
    {
        return $this->supplier ? $this->supplier->name : 'Unknown Supplier';
    }
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price_per_unit;
    }
}