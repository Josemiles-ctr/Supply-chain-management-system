<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillOfMaterial extends Model
{
    protected $fillable = [
        'product_id',
        'raw_material_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }
    public function getProductNameAttribute()
    {
        return $this->product ? $this->product->name : 'Unknown Product';
    }
    public function getRawMaterialNameAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->name : 'Unknown Raw Material';
    }
    public function getProductPriceAttribute()
    {
        return $this->product ? $this->product->price : 0;
    }
    public function getRawMaterialPriceAttribute()
    {
        return $this->rawMaterial ? $this->rawMaterial->price : 0;
    }
    public function getProductUnitOfMeasureAttribute()
    {
        return $this->product ? $this->product->unit_of_measure : 'N/A';
    }
}