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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->decimal('production_cost', 10, 2)->nullable(); // Optional
            $table->timestamps();
            $table->integer('current_stock')->default(0); 
            $table->integer('reorder_level')->default(50); // Minimum stock level before reorder
            $table->enum('unit_of_measure', ['pcs', 'boxes'])->default('pcs'); // Current stock of the product

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade'); // assumes vendors are users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};