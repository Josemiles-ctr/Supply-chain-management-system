<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('inventory_id')->nullable(); // optional inventory relation
            $table->timestamps();

            // foreign key for inventory 
            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};