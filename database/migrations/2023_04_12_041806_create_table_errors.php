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
        Schema::create('errores', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('id')->unique();
            $table->string('codigo_error');
            $table->string("descripcion");
            $table->string("subcodigo")->unique();
            $table->integer("errorApp");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_errors');
    }
};
