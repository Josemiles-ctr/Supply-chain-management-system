<?php

namespace App\Models;

use App\Models\RawMaterialCategory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $fillable = [
    'name',
    'supplier_id',
    'description',
    'price',
    'category_id',
    'current_stock',
    'reorder_level',
    'unit_of_measure',
   ];
   public function manufacturer() {
       return $this->hasMany(User::class, 'id');
   }
   public function category(){
    return $this->belongsTo(RawMaterialCategory::class,'id');
   }
   public function getCategoryName(){
    return $this->category ? $this->category->name: "Unknown Category Namw"
   }
   
}