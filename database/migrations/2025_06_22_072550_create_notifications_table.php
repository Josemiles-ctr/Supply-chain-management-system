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
<<<<<<<< HEAD:database/migrations/2025_06_22_072550_create_notifications_table.php
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
========
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
>>>>>>>> 89496a456b9c2a8f6cc7644fef748e677c99e898:.history/database/migrations/2025_06_21_085837_create_raw_materials_table_20250621115836.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2025_06_22_072550_create_notifications_table.php
        Schema::dropIfExists('notifications');
========
        Schema::dropIfExists('raw_materials');
>>>>>>>> 89496a456b9c2a8f6cc7644fef748e677c99e898:.history/database/migrations/2025_06_21_085837_create_raw_materials_table_20250621115836.php
    }
};
