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
    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return 'Pending';
            case 'approved':
                return 'Approved';
            case 'rejected':
                return 'Rejected';
            case 'delivered':
                return 'Delivered';
            default:
                return 'Unknown Status';
        }
    }
    public function getDeliveryOptionLabelAttribute()
    {
        return $this->delivery_option === 'standard' ? 'Standard Delivery' : 'Express Delivery';
    }
    public function getFormattedOrderDateAttribute()
    {
        return $this->order_date ? $this->order_date->format('Y-m-d') : 'N/A';
    }
}