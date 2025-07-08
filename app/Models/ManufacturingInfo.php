<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManufacturingInfo extends Model
{
        use HasFactory;

    protected $fillable = [
        'user_id',
        'factory_name',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
