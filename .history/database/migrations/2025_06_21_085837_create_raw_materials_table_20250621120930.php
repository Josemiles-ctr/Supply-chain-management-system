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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('current_stock')->default(0);
            $table->integer('reorder_level')->default(0);
            $table->enum('unit_of_measure', ['kg', 'g', 'liter', 'meter','pieces'])->default('kg'); // Default unit of measure
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials');
    }
};