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
        Schema::create('cuentaBancaria', function (Blueprint $table) {
            $table->id();
            $table->string('cBancaria_nCuenta');
            $table->unsignedBigInteger('cBancaria_idBanco');
            $table->unsignedBigInteger('cBancaria_tipoCuenta');
            $table->unsignedBigInteger('cBancaria_tipoMoneda');
            $table->float('cBancaria_total')->nullable();
            $table->unsignedBigInteger('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banco');
    }
};
