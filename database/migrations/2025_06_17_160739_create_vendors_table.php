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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name'); // Vendor name
            $table->string('contact_info')->nullable(); // Email/phone
            $table->string('password'); // Hashed password
            $table->timestamps();

            // Optional unique constraint
            $table->unique(['name', 'contact_info']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};