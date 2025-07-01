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
<<<<<<< HEAD
            $table->enum('size', ['XS','S','M','L','XL','XXL'])->default('M');
            $table->decimal('production_cost', 10, 2)->nullable(); // Optional
            $table->string('category');

            $table->timestamps();
            $table->integer('current_stock')->default(0); 
            $table->integer('reorder_point')->default(50); // Minimum stock level before reorder
            $table->enum('unit_of_measure', ['pcs', 'boxes'])->default('pcs'); // Current stock of the product

<<<<<<< HEAD
            // Foreign key constraints
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade'); // assumes vendors are users
=======
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade'); // assumes vendors are users
>>>>>>> master
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