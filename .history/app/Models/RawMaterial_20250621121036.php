<?php

namespace App\Models;

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
   public function sender() {
       return $this->belongsTo(User::class, 'sender_id');
   }

   public function receiver() {
       return $this->belongsTo(User::class, 'receiver_id');
   }
}