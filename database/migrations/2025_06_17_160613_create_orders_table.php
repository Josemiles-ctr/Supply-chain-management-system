<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Order ID
            $table->date('order_date');
            $table->string('status');           
            $table->unsignedBigInteger('user_id');
            $table->string('attribute')->nullable(); // Optional field
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders'); // Correct table name
    }
};