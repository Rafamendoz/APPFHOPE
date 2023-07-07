DELIMITER //

create function Funcion_obtener_total_entradas(cuentaB int) returns double
begin
	declare total double;
	select ifnull(SUM(d.monto),0.00) into total from detallebanco d where d.id_tipoTransaccion = 1 and d.id_cuentaBancaria =cuentaB and d.estado=1;
	return total;
end//

DELIMITER ;


DELIMITER //

create function Funcion_obtener_total_salidas(cuentaB int) returns double
begin
	declare total double;
	select ifnull(SUM(d.monto),0.00) into total from detallebanco d where d.id_tipoTransaccion = 2 and d.id_cuentaBancaria =cuentaB and d.estado=1;
	return total;
end//

DELIMITER ;



DELIMITER //

create function Funcion_obtener_total_stock_by_producto_size_color(idProducto int, idColor int, idSize int) returns int
begin
	declare total int;
	select ifnull(i.stock,0) into total from inventory i 
	where i.id_producto = idProducto and i.id_size =idSize and i.id_color =idColor;
	return total;
end//

DELIMITER ;

DELIMITER //

create function Funcion_obtener_total_stock_by_producto(idProducto int) returns int
begin
	declare total int;
	select ifnull(ih.total_stock ,0) into total from inventory_header ih 
	where ih.id_producto  = idProducto;
	return total;
end//

DELIMITER ;


