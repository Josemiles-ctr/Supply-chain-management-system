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
}