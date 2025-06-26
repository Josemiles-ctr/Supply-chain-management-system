<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'contact_info',
        // It's generally not recommended to store passwords here directly,
        // consider handling vendor authentication separately if needed.
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}