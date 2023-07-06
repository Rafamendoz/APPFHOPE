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
        Schema::table('colaborador', function (Blueprint $table) {
         
            $table->foreign('colaborador_puesto')->references('id')->on('puesto')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('cuentaBancaria', function (Blueprint $table) {
            $table->foreign('cBancaria_idBanco')->references('id')->on('banco')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('cBancaria_tipoCuenta')->references('id')->on('cuenta')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('cBancaria_tipoMoneda')->references('id')->on('moneda')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('users', function (Blueprint $table) {
         
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('detallebanco', function (Blueprint $table) {
         
            $table->foreign('id_cuentaBancaria')->references('id')->on('cuentaBancaria')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('id_tipoTransaccion')->references('id')->on('transaccion')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('venta', function (Blueprint $table) {
         
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('detalleventa', function (Blueprint $table) {
         
            $table->foreign('venta_id')->references('id')->on('venta')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('puesto', function (Blueprint $table) {
         
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('moneda', function (Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('cuenta', function (Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('transaccion', function (Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('cliente', function (Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('colaborador', function(Blueprint $table){
            $table->foreign('colaborador_idusuario')->references('id')->on('users')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('producto', function(Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('banco', function(Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });

        Schema::table('color', function(Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });
        
        Schema::table('size', function(Blueprint $table){
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
        });
        
        Schema::table('inventory', function(Blueprint $table){
            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('id_color')->references('id')->on('color')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('id_size')->references('id')->on('size')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
            
        
        });

        Schema::table('inventory_header', function(Blueprint $table){
            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');
            
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreighkeys');
    }
};
