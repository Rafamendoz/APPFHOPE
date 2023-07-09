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
        Schema::create('inventory_header', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto')->unique();
            $table->integer('total_stock');
            $table->unsignedBigInteger('estado');
            $table->string('test')->nullable();
            $table->string('test1')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_header');
    }
};
