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
        Schema::create('orders', function (Blueprint $table) {
            
            $table->id(); // OrderId
            $table->date('order_date'); // OrderDate
            $table->string('status'); // Status
            $table->unsignedBigInteger('customer_id'); // CustomerId (FK)
            $table->string('attribute')->nullable(); // Attribute
            $table->unsignedBigInteger('manufacturer_id'); // ManufacturerId (FK)
            $table->string('password'); // Password
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('set ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};