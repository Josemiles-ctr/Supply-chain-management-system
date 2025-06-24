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
    public function getUnitPriceAttribute()
    {
        return $this->unit_price;
    }
    public function getQuantityAttribute()
    {
        return $this->quantity;
    }
    public function getPurchaseOrderIdAttribute()
    {
        return $this->purchase_order_id;
    }
    public function getRawMaterialUnitOfMeasureAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->unit_of_measure : 'N/A';
    }
    public function getRawMaterialCurrentStockAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->current_stock : 0;
    }
    public function getRawMaterialReorderLevelAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->reorder_level : 0;
    }   
}