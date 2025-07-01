<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('raw_materials_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table  ->unsignedBigInteger('raw_material_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('quantity', 10, 2); // Quantity of raw material ordered
            $table->decimal('price_per_unit', 10, 2); // Price per unit of raw material
            $table->decimal('total_price', 10, 2); // Total price for the order
            $table->date('order_date'); // Date when the order was placed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials_purchase_orders');
    }
};