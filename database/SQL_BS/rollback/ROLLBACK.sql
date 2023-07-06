drop procedure if exists Obtener_detalleBancarios_entradas_by_cuentabancaria;
drop procedure if exists Obtener_detalleBancarios_salidas_by_cuentabancaria;


drop procedure if exists Obtener_detalleBancarios_entradas_by_fecha;
drop procedure if exists Obtener_detalleBancarios_salidas_by_fecha;


drop procedure if exists Obtener_detalleBancarios_totalEntradas_by_cuentabancaria;
	

drop procedure if exists Obtener_cuentasBancarias_vista;
drop procedure if exists Obtener_cuentaBancaria_vista;


drop procedure if exists Actualizar_detallesBancarios_estado;
drop procedure if exists Obtener_clientes_vista;

drop procedure if exists Obtener_productos_vista;
drop procedure if exists Actualizar_detallesVenta_estado;
drop procedure if exists Obtener_detalleBancarios_totalSalidas_by_cuentabancaria;
drop procedure if exists Obtener_tipo_transaccion_vista;
drop procedure if exists Obtener_usuarios_vista;
drop procedure if exists Obtener_colaboradores_vista;
drop procedure if exists Obtener_puesto_vista;
drop procedure if exists ObtenerCabeceraVentas;
drop procedure if exists ObtenerCabeceraVenta;
drop procedure if exists Obtener_monedas_vista;
drop procedure if exists Obtener_tipo_cuenta_vista;
drop procedure if exists Obtener_tipo_transaccion_vista_all;
drop procedure if exists Obtener_bancos_vista;
drop procedure if exists Obtener_usuarios_vista_all;
drop procedure if exists ObtenerCabeceraVentasAll;
drop procedure if exists Obtener_total_cuentas_bancarias;
drop procedure if exists Obtener_total_detalles_cuentas_bancarias;
drop procedure if exists Obtener_inventories_vista;

/* ------------------------------------------------------------------- */

drop function if exists Funcion_obtener_total_entradas;
drop function if exists Funcion_obtener_total_salidas;

/* ------------------------------------------------------------------- */
drop trigger if exists Actualiza_monto_total_cuentaBancaria;
