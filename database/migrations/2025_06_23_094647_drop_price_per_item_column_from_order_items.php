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
        Schema::table('order_items', function (Blueprint $table) {
         if (Schema::hasColumn('order_items', 'price_per_item')) {
                $table->dropColumn('price_per_item');
            }    //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
           $table->decimal('price_per_item', 10, 2)->nullable();  //
        });
    }
};
