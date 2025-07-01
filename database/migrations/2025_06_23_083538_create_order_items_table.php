<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            // Quantity of the product in the order
            $table->integer('quantity')->default(1);

            // Price per item at the time of order (in case prices change later)
            $table->decimal('price_per_item', 10, 2);

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Optionally, prevent duplicate product entries per order
            $table->unique(['order_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};