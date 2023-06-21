<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use App\Models\Usuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
})->name('Login');

Route::middleware('auth')->group( function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name("Dashboard");

    




});



Route::group(["middleware" => "auth"], function () {
    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   
   
    Route::get('cuentasBancarias', 'App\Http\Controllers\CuentaBancariaController@getCuentasBancarias')->name("cuentasBancarias");
    Route::get('cuentasBancarias/addCuentaBancaria', 'App\Http\Controllers\CuentaBancariaController@AddCuentaBancaria')->name("addCuentaBancaria");

    Route::get('detalleBancario/{id}', 'App\Http\Controllers\DetalleBancoController@getDetalleBancario')->name("detalleBancario");

   
    Route::get('monedas', 'App\Http\Controllers\MonedaController@getMonedas')->name("Monedas");
        /* RUTA PARA AGREGER NUEVA MONEDA*/
    Route::get('monedas/addmoneda', 'App\Http\Controllers\MonedaController@addMoneda')->name("AddMoneda");


      
    Route::get('tipocuentas', 'App\Http\Controllers\TipoCuentaController@getTipoCuentas')->name("TipoCuentas");
        /* RUTA PARA AGREGER NUEVA MONEDA*/
    Route::get('tipocuentas/addtipocuenta', 'App\Http\Controllers\TipoCuentaController@addTipoCuenta')->name("AddTipoCuenta");

    Route::get('/recibo', 'App\Http\Controllers\CreatePdf@crearRecibo');
    Route::get('ver/recibo/{id}', 'App\Http\Controllers\CreatePdf@verRecibo')->name('VerRecibo');
    

    Route::get('puestos', 'App\Http\Controllers\PuestoController@getPuestos')->name('Puestos');
    Route::get('puestos/addpuesto', 'App\Http\Controllers\PuestoController@addPuesto')->name('AddPuesto');
    //RUTAS PARA ENTIDAD Estado
   
     /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
    Route::get('estado', 'App\Http\Controllers\EstadoController@getEstado');
      
   
      //RUTAS PARA ENTIDAD Puesto
   
       /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
    Route::get('puesto', 'App\Http\Controllers\PuestoController@getPuesto');
       /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  
      
    
         //RUTAS PARA ENTIDAD Cuenta
    Route::get('cuentaR', 'App\Http\Controllers\CuentaController@getCuentasRest');

   
         //RUTAS PARA ENTIDAD Transaccion
    Route::get('tipotransaccion', 'App\Http\Controllers\TransaccionController@getTipoTransaccion')->name('tipoTransaccion');

   
      //RUTAS PARA ENTIDAD Banco
    Route::get('bancoR', 'App\Http\Controllers\BancoController@getBancosRest');
    
   
      //RUTAS PARA ENTIDAD DetalleBanco
    Route::get('dbancoR', 'App\Http\Controllers\DetalleBancoController@getDetallesBancoRest');
     
   
   
     
     
       //RUTAS PARA ENTIDAD CLIENTE
        /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
    Route::get('cliente', 'App\Http\Controllers\ClienteController@getCliente');
    Route::get('apiCredenciales', 'App\Http\Controllers\CredencialesConsumoController@GetCredencialesConsumo');

      
      /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   
   

    //CRUD USUARIO//
    Route::get('usuarios', 'App\Http\Controllers\UsuarioController@getUsuario')->name('Usuarios');
    Route::get('usuarios/addusuario', 'App\Http\Controllers\UsuarioController@addUsuario')->name('AddUsuario');

    //CRUD CLIENTE//
    Route::get('clientes', 'App\Http\Controllers\ClienteController@getClientes')->name('Clientes');
    Route::get('clientes/addcliente', 'App\Http\Controllers\ClienteController@addCliente')->name('AddCliente');

    //CRUD PRODUCTOS//
    Route::get('productos', 'App\Http\Controllers\ProductoController@getProductos')->name('Productos');
    Route::get('productos/addproducto', 'App\Http\Controllers\ProductoController@addProducto')->name('AddProducto');

    //CRUD COLABORADORES//
    Route::get('colaboradores', 'App\Http\Controllers\ColaboradorController@getColaboradores')->name('Colaboradores');
    Route::get('colaboradores/addcolaborador', 'App\Http\Controllers\ColaboradorController@addColaborador')->name('AddColaborador');

    //CRUD VENTAS//
    Route::get('ventas', 'App\Http\Controllers\VentaController@getVentas')->name('Ventas');
    Route::get('ventas/addventa', 'App\Http\Controllers\VentaController@addVentas')->name('AddVenta');

    //CRUD POS//
    Route::get('pos', 'App\Http\Controllers\POSController@getPOS')->name('POS');

    //CRUD BANCOS//
    Route::get('bancos', 'App\Http\Controllers\ColaboradorController@getBancos')->name('Bancos');


    Route::get('tipocuentasbancarias', 'App\Http\Controllers\ColaboradorController@getTipoCuentasBancarias')->name('TipoCuentasBancarias');


    Route::get('tipomonedas', 'App\Http\Controllers\MonedaController@getVentas')->name('TipoMonedas');
    Route::get('tipotransaccion', 'App\Http\Controllers\TransaccionController@getTipoTransaccion')->name('TipoTransaccion');
    Route::get('tipotransaccion/addtipotransaccion', 'App\Http\Controllers\TransaccionController@addTipoTransaccion')->name('AddTipoTransaccion');
     
   
      
   
 
    
   
   
   
   
});









   












//CRUD PUESTO//


Route::post('validate', 'App\Http\Controllers\LoginController@login')->name('Validate');




Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('Logout');




Route::get('/startApp/12106', function(){
    Artisan::call('migrate');
    dd(Artisan::output());
});


Route::get('/startApp/rollback/12106', function(){
    Artisan::call('migrate:fresh');
    dd(Artisan::output());
});


