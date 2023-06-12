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
        DB::table('estado')->insert([
            ['valor' => 'ACTIVO'],
            ['valor' => 'INACTIVO']]
        );
        $contra =   Hash::make('admin12345');

        DB::table('users')->insert([
          ['email'=>"admin@fhope.online",'password'=>$contra,'user'=>'admin','intentos'=>100,'estado'=>1]

            ]
        );

        DB::table('errores')->insert([
            ['codigo_error'=>23000,'descripcion'=>'Los datos ingresados no son permitidos para la solicitud, por favor revisar.']
            ,['codigo_error'=>404,'descripcion'=>'El registro solicitado no fue encontrado porque no existe.']
            ,['codigo_error'=>2002,'descripcion'=>'Error de conexion hacia la BD']
            ,['codigo_error'=>22007,'descripcion'=>'El tipo de dato ingresado no es el que se esperaba, revisar datos']

            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
