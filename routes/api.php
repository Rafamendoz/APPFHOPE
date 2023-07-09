<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('ventaR', 'App\Http\Controllers\VentaController@getVentasRest')->middleware('auth.guest');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS PARA ENTIDAD USUARIO
Route::group(["middleware" => "auth.basic1"], function () {
 /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/

 Route::get('usuarioR', 'App\Http\Controllers\UsuarioController@getUsuarioRest');
 /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
Route::get('usuarioR/{id}', 'App\Http\Controllers\UsuarioController@getUsuarioRestById');

Route::get('usuarioR/user/{id}', 'App\Http\Controllers\UsuarioController@getUsuarioRestByUsuario');

 /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
Route::post('usuarioR/add', 'App\Http\Controllers\UsuarioController@setUsuario');
 /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
Route::put('usuarioR/update/{id}', 'App\Http\Controllers\UsuarioController@putUsuario');
 /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
Route::put('usuarioR/delete/{id}', 'App\Http\Controllers\UsuarioController@deleteUsuario');

Route::post('usuarioR/loggin/validate', 'App\Http\Controllers\UsuarioController@logginUsuario');

//RUTAS PARA ENTIDAD Colaborador

    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('colaborador', 'App\Http\Controllers\ColaboradorController@getColaborador');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('colaboradorR', 'App\Http\Controllers\ColaboradorController@getColaboradoresRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('colaboradorR/{id}', 'App\Http\Controllers\ColaboradorController@getColaboradorRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('colaboradorR/add', 'App\Http\Controllers\ColaboradorController@setColaborador');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('colaboradorR/update/{id}', 'App\Http\Controllers\ColaboradorController@putColaborador');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::put('colaboradorR/delete/{id}', 'App\Http\Controllers\ColaboradorController@deleteColaborador');
   


   Route::get('moneda', 'App\Http\Controllers\MonedaController@getMoneda');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('monedaR', 'App\Http\Controllers\MonedaController@getMonedasRest');
  /* RUTA PARA OBTENER LAS MONEDAS ACTIVAS */
  Route::get('monedaR/active', 'App\Http\Controllers\MonedaController@getMonedasRestActive');
  Route::get('monedaR/noactive', 'App\Http\Controllers\MonedaController@getMonedasRestNoActive');

   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('monedaR/{id}', 'App\Http\Controllers\MonedaController@getMonedaRestById');
   /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
  Route::post('monedaR/add', 'App\Http\Controllers\MonedaController@setMoneda');
   /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
  Route::put('monedaR/update/{id}', 'App\Http\Controllers\MonedaController@putMoneda');
   /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
  Route::put('monedaR/delete/{id}', 'App\Http\Controllers\MonedaController@deleteMoneda');
  

//RUTAS PARA ENTIDAD Estado

    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('estado', 'App\Http\Controllers\EstadoController@getEstado');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('estadoR', 'App\Http\Controllers\EstadoController@getEstadosRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('estadoR/{id}', 'App\Http\Controllers\EstadoController@getEstadoRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('estadoR/add', 'App\Http\Controllers\EstadoController@setEstado');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('estadoR/update/{id}', 'App\Http\Controllers\EstadoController@putEstado');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::delete('estadoR/delete/{id}', 'App\Http\Controllers\EstadoController@deleteEstado');
   
 


   //RUTAS PARA ENTIDAD Puesto

    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('puesto', 'App\Http\Controllers\PuestoController@getPuesto');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('puestoR', 'App\Http\Controllers\PuestoController@getPuestosRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('puestoR/{id}', 'App\Http\Controllers\PuestoController@getPuestoRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('puestoR/add', 'App\Http\Controllers\PuestoController@setPuesto');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('puestoR/update/{id}', 'App\Http\Controllers\PuestoController@putPuesto');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::put('puestoR/delete/{id}', 'App\Http\Controllers\PuestoController@deletePuesto');
   
 
      //RUTAS PARA ENTIDAD TipoCuenta
   Route::get('cuentaR', 'App\Http\Controllers\TipoCuentaController@getTipoCuentasRest');
   Route::get('cuentaR/{id}', 'App\Http\Controllers\TipoCuentaController@getTipoCuentaRestById');
   Route::post('cuentaR/add', 'App\Http\Controllers\TipoCuentaController@setTipoCuenta');
   Route::put('cuentaR/update/{id}', 'App\Http\Controllers\TipoCuentaController@putTipoCuenta');
   Route::put('cuentaR/delete/{id}', 'App\Http\Controllers\TipoCuentaController@deleteTipoCuenta');

      //RUTAS PARA ENTIDAD Transaccion
   Route::get('transaccionR', 'App\Http\Controllers\TransaccionController@getTransaccionesRest');
   Route::get('transaccionR/{id}', 'App\Http\Controllers\TransaccionController@getTransaccionRestById');
   Route::post('transaccionR/add', 'App\Http\Controllers\TransaccionController@setTransaccion');
   Route::put('transaccionR/update/{id}', 'App\Http\Controllers\TransaccionController@putTransaccion');
   Route::put('transaccionR/delete/{id}', 'App\Http\Controllers\TransaccionController@deleteTransaccion');

 //RUTAS PARA ENTIDAD CUENTA BANCARIA
 Route::get('cuentaBancariaR', 'App\Http\Controllers\CuentaBancariaController@getCuentasBancariasRest');
 Route::get('cuentaBancariaR/{id}', 'App\Http\Controllers\CuentaBancariaController@getCuentaBancariaRestById');
 Route::post('cuentaBancariaR/add', 'App\Http\Controllers\CuentaBancariaController@setCuentaBancaria');
 Route::put('cuentaBancariaR/update/{id}', 'App\Http\Controllers\CuentaBancariaController@putCuentaBancaria');
 Route::put('cuentaBancariaR/delete/{id}', 'App\Http\Controllers\CuentaBancariaController@deleteCuentaBancaria');


   //RUTAS PARA ENTIDAD Banco
   Route::get('bancoR', 'App\Http\Controllers\BancoController@getBancosRest');
   Route::get('bancoR/{id}', 'App\Http\Controllers\BancoController@getBancoRestById');
   Route::post('bancoR/add', 'App\Http\Controllers\BancoController@setBanco');
   Route::put('bancoR/update/{id}', 'App\Http\Controllers\BancoController@putBanco');
   Route::put('bancoR/delete/{id}', 'App\Http\Controllers\BancoController@deleteBanco');

   //RUTAS PARA ENTIDAD DetalleBanco
   Route::get('dbancoR', 'App\Http\Controllers\DetalleBancoController@getDetallesBancoRest');
   Route::get('dbancoR/{id}', 'App\Http\Controllers\DetalleBancoController@getDetalleBancoRestById');
   Route::post('dbancoR/add', 'App\Http\Controllers\DetalleBancoController@setDetalleBanco');
   Route::get('dbancoR/transaccion/{id}', 'App\Http\Controllers\DetalleBancoController@getDetalleBancoRestByTipoTransaccion');
   Route::get('dbancoR/salidas/{id}', 'App\Http\Controllers\DetalleBancoController@getSalidasBancariasRestByCuenta');
   Route::get('dbancoR/entradas/{id}', 'App\Http\Controllers\DetalleBancoController@getEntradasBancariasRestByCuenta');
   Route::post('dbancoR/salidas/date/{id}', 'App\Http\Controllers\DetalleBancoController@getSalidasBancariasRestByFecha');
   Route::post('dbancoR/entradas/date/{id}', 'App\Http\Controllers\DetalleBancoController@getEntradasBancariasRestByFecha');


  
  
    //RUTAS PARA ENTIDAD CLIENTE
     /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('cliente', 'App\Http\Controllers\ClienteController@getCliente');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('clienteR', 'App\Http\Controllers\ClienteController@getClientesRest');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('clienteR/{id}', 'App\Http\Controllers\ClienteController@getClienteRestById');

  Route::get('clienteR/active/{id}', 'App\Http\Controllers\ClienteController@getClienteActiveRestById');


  Route::get('clienteR/dni/{id}', 'App\Http\Controllers\ClienteController@getClienteRestByDNI');

   /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
  Route::post('clienteR/add', 'App\Http\Controllers\ClienteController@setCliente');
   /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
  Route::put('clienteR/update/{id}', 'App\Http\Controllers\ClienteController@putCliente');
   /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
  Route::put('clienteR/delete/{id}', 'App\Http\Controllers\ClienteController@deleteCliente');

      //RUTAS PARA ENTIDAD PRODUCTO
     /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
     /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
    Route::get('productoR', 'App\Http\Controllers\ProductoController@getProductosRest');
     /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
    Route::get('productoR/{id}', 'App\Http\Controllers\ProductoController@getProductoRestById');
     /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
    Route::post('productoR/add', 'App\Http\Controllers\ProductoController@setProducto');
     /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
    Route::put('productoR/update/{id}', 'App\Http\Controllers\ProductoController@putProducto');
     /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
    Route::put('productoR/delete/{id}', 'App\Http\Controllers\ProductoController@deleteProducto');
  
  

    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('ventaR/{id}', 'App\Http\Controllers\VentaController@getVentaRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('ventaR/add', 'App\Http\Controllers\VentaController@setVenta');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('ventaR/update/{id}', 'App\Http\Controllers\VentaController@putVenta');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::put('ventaR/delete/{id}', 'App\Http\Controllers\VentaController@deleteVenta');


   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('detalleVentaR', 'App\Http\Controllers\DetalleVentaController@getDetallesVentaRest');

  Route::get('detalleVentaR/{id}', 'App\Http\Controllers\DetalleVentaController@getDetalleVentaRestByVentaId');
   /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
  Route::post('detalleVentaR/add', 'App\Http\Controllers\DetalleVentaController@setDetalleVenta');
   /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
  Route::put('detalleVentaR/delete/{id}', 'App\Http\Controllers\DetalleVentaController@deleteDetalleVenta');

  Route::get('detalleProductoR', 'App\Http\Controllers\DetalleProductoController@getDetallesProductoRest');

  Route::get('detalleProductoR/{id}', 'App\Http\Controllers\DetalleProductoController@getDetalleProductoRestByVentaId');
   /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
  Route::post('detalleProductoR/add', 'App\Http\Controllers\DetalleProductoController@setDetalleProducto');
   /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
  Route::put('detalleProductoR/delete/{id}', 'App\Http\Controllers\DetalleProductoController@deleteDetalleProducto');



 
 //RUTAS PARA ENTIDAD COLOR//

 Route::get('colorR', 'App\Http\Controllers\ColorController@getColorsRest');
 Route::get('colorR/{id}', 'App\Http\Controllers\ColorController@getColorRestById');
 Route::post('colorR/add', 'App\Http\Controllers\ColorController@setColor');
 Route::put('colorR/update/{id}', 'App\Http\Controllers\ColorController@putColor');
 Route::put('colorR/delete/{id}', 'App\Http\Controllers\ColorController@deleteColor');


 //RUTAS PARA ENTIDAD SIZE//
 Route::get('sizeR', 'App\Http\Controllers\SizeController@getSizesRest');
 Route::get('sizeR/{id}', 'App\Http\Controllers\SizeController@getSizeRestById');
 Route::post('sizeR/add', 'App\Http\Controllers\SizeController@setSize');
 Route::put('sizeR/update/{id}', 'App\Http\Controllers\SizeController@putSize');
 Route::put('sizeR/delete/{id}', 'App\Http\Controllers\SizeController@deleteSize');


 //RUTAS PARA ENTIDAD DETALLE INVENTARIO//
 Route::get('inventoryR', 'App\Http\Controllers\InventoryController@getInventoriesRest');
 Route::get('inventoryR/{id}', 'App\Http\Controllers\InventoryController@getInventoryRestById');
 Route::post('inventoryR/add', 'App\Http\Controllers\InventoryController@setInventory');
 Route::put('inventoryR/update/{id}', 'App\Http\Controllers\InventoryController@putInventory');
 Route::put('inventoryR/delete/{id}', 'App\Http\Controllers\InventoryController@deleteInventory');
 Route::get('inventoryR/sizesWithOutStock/{idproducto}/{idcolor}', 'App\Http\Controllers\InventoryController@getSizesWithoutStockRest');
 Route::get('inventoryR/sizesWithStock/{idproducto}/{idcolor}', 'App\Http\Controllers\InventoryController@getSizesWithStockRest');
 Route::get('inventoryR/stockDisponible/{idproducto}/{idcolor}/{idsize}', 'App\Http\Controllers\InventoryController@getInventoryByProductColorSizeRest');


  //RUTAS PARA ENTIDAD CABECERA INVENTARIO//

 Route::get('inventoryHeaderR', 'App\Http\Controllers\InventoryHeaderController@getInventoriesHeaderRest');
 Route::get('inventoryHeaderR/{id}', 'App\Http\Controllers\InventoryHeaderController@getInventoryHeaderRestById');
 Route::post('inventoryHeaderR/add', 'App\Http\Controllers\InventoryHeaderController@setInventoryHeader');
 Route::put('inventoryHeaderR/update/{id}', 'App\Http\Controllers\InventoryHeaderController@putInventoryHeader');
 Route::put('inventoryHeaderR/delete/{id}', 'App\Http\Controllers\InventoryHeaderController@deleteInventoryHeader');



});


 /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
