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
}