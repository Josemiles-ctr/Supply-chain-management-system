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
    $table->id();
    $table->unsignedBigInteger('user_id')->nullable();  // <-- remove ->after('id')
    $table->string('name');
    $table->string('contact_info');
    $table->string('password');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};  
