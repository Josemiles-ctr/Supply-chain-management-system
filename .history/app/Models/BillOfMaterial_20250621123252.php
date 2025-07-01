<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillOfMaterial extends Model
{
    $table->enum('role', ['admin','vendor','customer','manufacturer','supplier'])->default('customer');
}