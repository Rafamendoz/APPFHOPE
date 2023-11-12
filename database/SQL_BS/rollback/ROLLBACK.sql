/*--------------------------ROLLBACK SP----------------------------------------*/
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
drop procedure if exists Obtener_inventoriesHeader_vista;
drop procedure if exists Obtener_colors_vista;
drop procedure if exists Actualizar_detallesproductos_estado;
drop procedure if exists Obtener_sizes_without_stock;
drop procedure if exists Actualizar_inventory_estado;
drop procedure if exists Obtener_sizes_vista;
drop procedure if exists Obtener_sizes_with_stock;
drop procedure if exists Obtener_stock_disponible_by_size_product_color;
drop procedure if exists ObtenerEstadoResultado;
drop procedure if exists ObtenerTotalesEnt;
drop procedure if exists Obtener_detalleBancarios_by_referencia;
drop procedure if exists Mapeo_Error;


/* -------------------------ROLLBACK FUNCIONES------------------------------------------ */
drop function if exists Funcion_obtener_total_entradas;
drop function if exists Funcion_obtener_total_salidas;
drop function if exists Funcion_obtener_total_stock_by_producto;
drop function if exists Funcion_obtener_total_stock_by_producto_size_color;

/* -----------------------ROLLBACK TRIGGERS-------------------------------------------- */
drop trigger if exists Actualiza_monto_total_cuentaBancaria;
drop trigger if exists Actualiza_inventario_venta_nueva_by_detalles;
drop trigger if exists Actualiza_inventario_detalle_producto_venta_estado;
drop trigger if exists Actualiza_inventario_size_color;
drop trigger if exists Actualiza_inventario_size_color_estado;
drop trigger if exists Inserta_nuevo_inventario_after_producto;
