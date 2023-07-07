DELIMITER //
create trigger Actualiza_monto_total_cuentaBancaria after insert on detallebanco
for each row 
begin 
	declare totalEntradas double;
	declare totalSalidas double;
	set totalEntradas =(select Funcion_obtener_total_entradas(new.id_cuentaBancaria));
	set totalSalidas = (select Funcion_obtener_total_salidas(new.id_cuentaBancaria));
	update cuentaBancaria set cBancaria_total =  (totalEntradas - totalSalidas) where id=new.id_cuentaBancaria;
end//
DELIMITER //



select * from detalleventa d 

DELIMITER //
create trigger Actualiza_inventario_venta_estado after update on detalleventa
for each row 
	begin 
		declare totalStock int;
		declare newtotalStock int;
		if (new.estado = 1) 
		Then 	
				set totalStock =(select Funcion_obtener_total_stock_by_producto(new.producto_id));
				set newtotalStock =totalStock-new.cantidad;
				update inventory_header  set total_stock  = newtotalStock where id=new.producto_id;
		elseif (new.estado = 2) then 
				set totalStock =(select Funcion_obtener_total_stock_by_producto(new.producto_id));
				set newtotalStock =totalStock+new.cantidad;
				update inventory_header  set total_stock  = newtotalStock where id=new.producto_id;
		end if;
	end//
DELIMITER //


DELIMITER //
create trigger Actualiza_inventario_venta_nueva after insert on detalleventa
for each row 
	begin 
		declare totalStock int;
		declare newtotalStock int;
		set totalStock =(select Funcion_obtener_total_stock_by_producto(new.producto_id));
		set newtotalStock =totalStock-new.cantidad;
		update inventory_header  set total_stock  = newtotalStock where id=new.producto_id;
	end//
DELIMITER //
