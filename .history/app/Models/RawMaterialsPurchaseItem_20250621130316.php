<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawMaterialsPurchaseItem extends Model
{
   protected $fillable = [
        'raw_material_id',
        'purchase_order_id',
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
        return $this->rawMaterial ? $this->rawMaterial.getTotalPriceAttribute() : 0;
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
    public function getFormattedPurchaseOrderIdAttribute()
    {
        return 'PO-' . str_pad($this->purchase_order_id, 6, '0', STR_PAD_LEFT);
    }
   
}