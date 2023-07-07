<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Error;
use App\Models\User;
use App\Models\Estado;
use App\Models\Color;
use App\Models\Size;

use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\Crypt;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Estado::create(['valor' => 'ACTIVO']);
        Estado::create(['valor' => 'INACTIVO']);
        Role::create(['name' => 'ADMINISTRADOR']);
        $contra =   Hash::make('admin12345');
        $baseapi = base64_encode("admin@fhope.online:admin12345");
        $ApiToken =  Crypt::encrypt($baseapi);
        $usuario =User::create( ['email'=>"admin@fhope.online",'password'=>$contra,'user'=>'admin','intentos'=>100,'ApiToken'=>$ApiToken,'estado'=>1]);
        $usuario->assignRole('ADMINISTRADOR');

        Error::create(['codigo_error'=>23000,'descripcion'=>'Los datos ingresados no son permitidos para la solicitud, por favor revisar.']);
        Error::create(['codigo_error'=>404,'descripcion'=>'El registro solicitado no fue encontrado porque no existe.']);
        Error::create(['codigo_error'=>2002,'descripcion'=>'Error de conexion hacia la BD']);
        Error::create(['codigo_error'=>22007,'descripcion'=>'El tipo de dato ingresado no es el que se esperaba, revisar datos']);
        Error::create(['codigo_error'=>'01000','descripcion'=>'Hay un valor que excede el limite permitido de tamaño del campo']);
        Error::create(['codigo_error'=>'HY000','descripcion'=>'Se estan enviando campos con valor null']);


        Color::create(['name_color'=>'ROJO','hex'=>'FF0000','estado'=>1]);
        Color::create(['name_color'=>'VERDE MILITAR','hex'=>'667c3e','estado'=>1]);
        Color::create(['name_color'=>'AZUL CLARO','hex'=>'E0FFFF','estado'=>1]);
        Color::create(['name_color'=>'ROSADO','hex'=>'ff0080','estado'=>1]);
        Color::create(['name_color'=>'AMARILLO','hex'=>'FFFF00','estado'=>1]);
        Color::create(['name_color'=>'AZUL OSCURO','hex'=>'191970','estado'=>1]);
        Color::create(['name_color'=>'BLANCO','hex'=>'FFFFFF','estado'=>1]);
        Color::create(['name_color'=>'NEGRO','hex'=>'000000','estado'=>1]);
        Color::create(['name_color'=>'BEIGE','hex'=>'f5f5dc ','estado'=>1]);
        Color::create(['name_color'=>'OCRE','hex'=>'920d3e','estado'=>1]);
        Color::create(['name_color'=>'AZUL ELECTRICO','hex'=>'172bde','estado'=>1]);
        Color::create(['name_color'=>'GRIS','hex'=>'9b9b9b','estado'=>1]);
        Color::create(['name_color'=>'VERDE AQUA','hex'=>'1df8b5','estado'=>1]);
        Color::create(['name_color'=>'AZUL NAVY','hex'=>'00304E','estado'=>1]);

        Size::create(['name_size'=>'XS','estado'=>1]);
        Size::create(['name_size'=>'S','estado'=>1]);
        Size::create(['name_size'=>'M','estado'=>1]);
        Size::create(['name_size'=>'L','estado'=>1]);
        Size::create(['name_size'=>'XL','estado'=>1]);
        Size::create(['name_size'=>'XXL','estado'=>1]);
        Size::create(['name_size'=>'XXXL','estado'=>1]);








    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
