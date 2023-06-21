<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('estado')->create([
            ['valor' => 'ACTIVO'],
            ['valor' => 'INACTIVO']]
        );
        $contra =   Hash::make('admin12345');
        $baseapi = base64_encode("admin@fhope.online:admin12345");
        $ApiToken =  Crypt::encrypt($baseapi);

        DB::table('users')->create([
          ['email'=>"admin@fhope.online",'password'=>$contra,'user'=>'admin','intentos'=>100,'ApiToken'=>$ApiToken,'estado'=>1]

            ]
        );

        DB::table('errores')->create([
            ['codigo_error'=>23000,'descripcion'=>'Los datos ingresados no son permitidos para la solicitud, por favor revisar.']
            ,['codigo_error'=>404,'descripcion'=>'El registro solicitado no fue encontrado porque no existe.']
            ,['codigo_error'=>2002,'descripcion'=>'Error de conexion hacia la BD']
            ,['codigo_error'=>22007,'descripcion'=>'El tipo de dato ingresado no es el que se esperaba, revisar datos']
            ,['codigo_error'=>'01000','descripcion'=>'Hay un valor que excede el limite permitido de tamaño del campo']
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
