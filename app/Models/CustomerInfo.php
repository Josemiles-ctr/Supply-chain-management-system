<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerInfo extends Model
{
     use HasFactory;
protected $table = 'customer_info';
    protected $fillable = [
        'user_id',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
