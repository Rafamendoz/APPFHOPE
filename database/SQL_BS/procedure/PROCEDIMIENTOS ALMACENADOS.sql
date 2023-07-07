DELIMITER //
CREATE procedure ObtenerCabeceraVenta (IN idventa INT )
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, v.total, DATE(v.fecha) as 'date', DATE_FORMAT(v.fecha, "%H:%i:%S" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            WHERE v.id = idventa and v.estado=1;
        end//
DELIMITER ;
        
DELIMITER //
 CREATE procedure ObtenerCabeceraVentas ()
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, e.valor, v.total, DATE(v.fecha) as 'date', DATE_FORMAT(v.fecha, "%H:%i:%S" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            inner join estado e on e.id = v.estado 
            WHERE v.estado = 1;
        end//
DELIMITER ;


DELIMITER //
 CREATE procedure ObtenerCabeceraVentasAll ()
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, e.valor, v.total, DATE(v.fecha) as 'date', DATE_FORMAT(v.fecha, "%H:%i:%S" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            inner join estado e on e.id = v.estado;
        end//
DELIMITER ;
        
DELIMITER //
 CREATE PROCEDURE Obtener_monedas_vista (in estado TEXT)
        begin 
	        select m.id, m.moneda_nombre,m.estado, e.valor, m.created_at, m.updated_at  from moneda m
	        inner join estado e on m.estado = e.id 
	        where e.valor=estado;
        end //
DELIMITER ;
        
DELIMITER //
        create procedure Obtener_tipo_cuenta_vista (in estado TEXT)
        begin
            select c.id, c.cuenta_nombre, e.valor, c.created_at, c.updated_at from cuenta c
            inner join estado e on c.estado = e.id
            where e.valor = estado;
        end//
DELIMITER ;     

DELIMITER //
create procedure Actualizar_detallesBancarios_estado(in CuentaB int, in estado int)
begin
	update detallebanco db set db.estado = estado
	where db.id_cuentaBancaria = CuentaB;
end//
DELIMITER ;  

DELIMITER //

create procedure Actualizar_detallesVenta_estado(in VentaId int, in estado int)
begin
		update detalleventa dv set dv.estado = estado
		where dv.venta_id = VentaId;
end//
DELIMITER ;  

DELIMITER //

create procedure Obtener_cuentasBancarias_vista(in idestado int)
begin
		select cb.id,cb.cBancaria_nCuenta , b.banco_nombre, c.cuenta_nombre, m.moneda_nombre, e.valor, cb.created_at, cb.updated_at  from cuentaBancaria cb
		inner join cuenta c on c.id = cb.cBancaria_tipoCuenta 
		inner join moneda m on m.id = cb.cBancaria_tipoMoneda 
		inner join banco b on b.id = cb.cBancaria_idBanco 
		inner join estado e on e.id = cb.estado
		where cb.estado =idestado;
end//
DELIMITER ;


DELIMITER //

create procedure Obtener_cuentaBancaria_vista(in CuentaB int)
begin
	select cb.id,cb.cBancaria_nCuenta , b.banco_nombre, c.cuenta_nombre, m.moneda_nombre, ifnull(cb.cBancaria_total ,0.00) as '	cBancaria_total' , e.valor, cb.created_at, cb.updated_at  from cuentaBancaria cb
	inner join cuenta c on c.id = cb.cBancaria_tipoCuenta 
	inner join moneda m on m.id = cb.cBancaria_tipoMoneda 
	inner join banco b on b.id = cb.cBancaria_idBanco 
	inner join estado e on e.id = cb.estado
	where cb.estado =1 and cb.id =CuentaB;
end//
DELIMITER ;


DELIMITER //

create procedure Obtener_detalleBancarios_entradas_by_cuentabancaria(in CuentaB int)
begin
	 select d.referencia, d.id_cuentaBancaria, d.monto, d.descripcion, date_format(d.fecha, '%Y-%m-%d') as 'fecha', t.trans_nombre from detallebanco d
	 inner join transaccion t on t.id = d.id_tipoTransaccion 
	 where d.estado =1 and d.id_tipoTransaccion =1  and d.id_cuentaBancaria = CuentaB
	order by d.fecha ASC;
end//
DELIMITER ;

DELIMITER //

create procedure Obtener_detalleBancarios_salidas_by_cuentabancaria(in CuentaB int)
begin
	 select d.referencia,d.id_cuentaBancaria, d.monto, d.descripcion, date_format(d.fecha, '%Y-%m-%d') as 'fecha', t.trans_nombre from detallebanco d
	 inner join transaccion t on t.id = d.id_tipoTransaccion 
	 where d.estado =1 and d.id_tipoTransaccion =2  and d.id_cuentaBancaria = CuentaB
	order by d.fecha ASC;
end//
DELIMITER ;

DELIMITER //

create procedure Obtener_detalleBancarios_entradas_by_fecha(in FechaIni varchar(12), in FechaFina varchar(12), in CuentaB int)
begin
	select d.referencia, d.id_cuentaBancaria, d.monto, d.descripcion, d.fecha, t.trans_nombre from detallebanco d
	inner join transaccion t on t.id = d.id_tipoTransaccion 
	where date_format(d.fecha, '%Y-%m-%d')  between FechaIni  and  FechaFina and d.estado =1 and d.id_tipoTransaccion =1 and d.id_cuentaBancaria = CuentaB
	order by d.fecha asc;
end//
DELIMITER ;

DELIMITER //

create procedure Obtener_detalleBancarios_salidas_by_fecha(in FechaIni varchar(12), in FechaFina  varchar(12),in CuentaB int)
begin
	 select d.referencia,d.id_cuentaBancaria, d.monto, d.descripcion,d.fecha, t.trans_nombre from detallebanco d
	 inner join transaccion t on t.id = d.id_tipoTransaccion 
	 where date_format(d.fecha, '%Y-%m-%d')  between FechaIni  and  FechaFina and d.estado =1 and d.id_tipoTransaccion =2  and d.id_cuentaBancaria = CuentaB
	order by d.fecha asc;
end//
DELIMITER ;

DELIMITER //


create procedure Obtener_detalleBancarios_totalEntradas_by_cuentabancaria(in CuentaB int )
begin
	select ifnull(SUM(d.monto),0.00) as 'totalEntradas' from detallebanco d
	where d.id_tipoTransaccion = 1 and d.id_cuentaBancaria =CuentaB and d.estado=1;
end//
DELIMITER ;


DELIMITER //
create procedure Obtener_detalleBancarios_totalSalidas_by_cuentabancaria(in CuentaB int )
begin
	select ifnull(SUM(d.monto),0.00) as 'totalSalidas' from detallebanco d
	where d.id_tipoTransaccion = 2 and d.id_cuentaBancaria =CuentaB and d.estado=1;
end//
DELIMITER ;



DELIMITER //

create procedure Obtener_tipo_transaccion_vista (in estado TEXT )
begin
	select t.id, t.trans_nombre, e.valor, t.created_at, t.updated_at from transaccion t
	inner join estado e on t.estado = e.id
	where e.valor = estado;
end//
DELIMITER ;

DELIMITER //

create procedure Obtener_tipo_transaccion_vista_all ()
begin
	select t.id, t.trans_nombre, e.valor, t.created_at, t.updated_at from transaccion t
	inner join estado e on t.estado = e.id;
end//
DELIMITER ;



DELIMITER //

create procedure Obtener_bancos_vista (in estado TEXT )
begin
	select b.id, b.banco_nombre, e.valor, b.created_at, b.updated_at  from banco b
	inner join estado e on b.estado = e.id
	where e.valor = estado;
end//
DELIMITER ;



DELIMITER //

create procedure Obtener_clientes_vista (in estado TEXT )
begin
	select c.id, c.cliente_nom, c.cliente_tel, ifnull(c.cliente_correo, "N/A") as 'cliente_correo',ifnull(c.cliente_DNI, "N/A") as 'cliente_DNI', 
	e.valor, c.created_at, c.updated_at from cliente c 
	inner join estado e on c.estado = e.id
	where e.valor = estado;
end//
DELIMITER ;



DELIMITER //

create procedure Obtener_productos_vista (in estado TEXT )
begin
	select p.id, p.producto_nom, p.producto_des ,p.precio,e.valor, p.created_at, p.updated_at from producto p
	inner join estado e on p.estado = e.id
	where e.valor = estado;
end//
DELIMITER ;

DELIMITER //

create procedure Obtener_usuarios_vista (in estado TEXT )
begin
	select u.id,u.email,u.`user`,u.intentos,e.valor,u.created_at, u.updated_at  from users u
	inner join estado e on e.id = u.estado
	where e.valor = estado;
end//
DELIMITER ;


DELIMITER //

create procedure Obtener_usuarios_vista_all ()
begin
	select u.id,u.email,u.`user`,u.intentos,e.valor,u.created_at, u.updated_at  from users u
	inner join estado e on e.id = u.estado;
end//
DELIMITER ;


DELIMITER //

create procedure Obtener_colaboradores_vista (in estado TEXT )
begin
	select c.id, c.colaborador_nombres, c.colaborador_apellidos, c.colaborador_DNI, p.puesto_nombre, u.`user`, e.valor, c.created_at, c.updated_at  from colaborador c 
	inner join puesto p on p.id = c.colaborador_puesto 
	inner join users u on u.id  = c.colaborador_idusuario 
	inner join estado e on e.id  = c.estado
	where e.valor = estado;
end//
DELIMITER ;

DELIMITER //


create procedure Obtener_puesto_vista (in estado TEXT )
begin
	select p.id, p.puesto_nombre, e.valor, p.created_at, p.updated_at  from puesto p 
	inner join estado e ON e.id = p.estado
	where e.valor = estado;
end//
DELIMITER ;




DELIMITER //
create procedure Obtener_inventories_vista (in idProducto int )
begin
	select i.id,i.id_producto, p.producto_nom, c.name_color,c.`hex`, s.name_size, i.stock, e.valor ,i.created_at, i.updated_at  from inventory i
	inner join color c ON i.id_color = c.id
	inner join `size` s on i.id_size = s.id
	inner join producto p on p.id = i.id_producto
	inner join estado e on e.id  = i.estado 
	where i.id_producto = idProducto and i.estado=1
	order by c.name_color, c.name_color  ;
end//
DELIMITER ;


DELIMITER //
create procedure Obtener_inventoriesHeader_vista ()
begin
	select ih.id, ih.id_producto, p.producto_nom , ih.total_stock, e.valor, ih.created_at, ih.updated_at  from inventory_header ih 
	inner join producto p on p.id = ih.id_producto
	inner join estado e on e.id  = ih.estado 
	where ih.estado = 1;
end//
DELIMITER ;


DELIMITER //
create procedure Obtener_colors_vista ()
begin
	select c.id, c.name_color,c.`hex`, e.valor, c.created_at, c.updated_at  from color c
	inner join estado e on e.id = c.estado 
	where c.estado = 1;
end//
DELIMITER ;
