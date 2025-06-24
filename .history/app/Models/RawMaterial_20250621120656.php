<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $fillable = [
        'supp',
       'receiver_id',
       'message',
   ];
   public function sender() {
       return $this->belongsTo(User::class, 'sender_id');
   }

   public function receiver() {
       return $this->belongsTo(User::class, 'receiver_id');
   }
}