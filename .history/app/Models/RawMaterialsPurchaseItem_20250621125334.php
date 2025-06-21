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
    public function getRawMaterialPriceAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->price : 0;
    }
    public function getRawMaterialDescriptionAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->description : 'No Description';
    }
    public function getRawMaterialSupplierNameAttribute()
    {
        return $this->rawMaterial && $this->rawMaterial->supplier ? $this->rawMaterial->supplier->name : 'Unknown Supplier';
    }
    public function getRawMaterialSupplierIdAttribute()
    {
        return $this->rawMaterial && $this->rawMaterial->supplier ? $this->rawMaterial->supplier->id : null;
    }
    public function getRawMaterialCategoryIdAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->category_id : null;
    }
    public function getRawMaterialCategoryNameAttribute()
    {
        return $this->rawMaterial && $this->rawMaterial->category ? $this->rawMaterial->category->name : 'Unknown Category';
    }
    public function getRawMaterialManufacturerNameAttribute()
    {
        return $this->rawMaterial && $this->rawMaterial->manufacturer ? $this->rawMaterial->manufacturer->name : 'Unknown Manufacturer';
    }
    public function getRawMaterialManufacturerIdAttribute()
    {
        return $this->rawMaterial && $this->rawMaterial->manufacturer ? $this->rawMaterial->manufacturer->id : null;
    }
    public function getFormattedTotalPriceAttribute()
    {
        return number_format($this->total_price, 2);
    }
    public function getFormattedUnitPriceAttribute()
    {
        return number_format($this->unit_price, 2);
    }
    public function getFormattedQuantityAttribute()
    {
        return number_format($this->quantity);
    }   
}