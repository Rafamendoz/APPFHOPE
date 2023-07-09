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
				update inventory_header  set total_stock  = newtotalStock where id_producto=new.producto_id;
		elseif (new.estado = 2) then 
				set totalStock =(select Funcion_obtener_total_stock_by_producto(new.producto_id));
				set newtotalStock =totalStock+new.cantidad;
				update inventory_header  set total_stock  = newtotalStock where id_producto=new.producto_id;
		end if;
	end//
DELIMITER //


DELIMITER //
create trigger Actualiza_inventario_detalle_producto_venta_estado after update on detalle_producto_venta
for each row 
	begin 
		declare totalStock int;
		declare newtotalStock int;
		if (new.estado = 1) 
		Then 	
				set totalStock =(select Funcion_obtener_total_stock_by_producto_size_color(new.producto_id, new.color_id,new.size_id));
				set newtotalStock =totalStock-new.cantidad;
				update inventory  set stock  = newtotalStock where id_producto = new.producto_id and id_size = new.size_id and id_color =new.color_id;
		elseif (new.estado = 2) then 
				set totalStock =(select Funcion_obtener_total_stock_by_producto_size_color(new.producto_id, new.color_id,new.size_id));
				set newtotalStock =totalStock+new.cantidad;
				update inventory  set stock  = newtotalStock where id_producto = new.producto_id and id_size = new.size_id and id_color =new.color_id;
		end if;
	end//
DELIMITER //



DELIMITER //
create trigger Actualiza_inventario_venta_nueva_by_detalles after insert on detalle_producto_venta
for each row 
	begin 
		declare totalStock int;
		declare newtotalStock int;
		set totalStock =(select Funcion_obtener_total_stock_by_producto_size_color(new.producto_id, new.color_id,new.size_id));
		set newtotalStock =totalStock-new.cantidad;
		update inventory  set stock  = newtotalStock where id_producto = new.producto_id and id_size = new.size_id and id_color =new.color_id;
	end//
DELIMITER //


DELIMITER //
create trigger Inserta_nuevo_inventario_after_producto after insert on producto
for each row 
	begin 
		insert into inventory_header(id_producto, total_stock, estado,created_at ,updated_at) values(new.id, 0, 1, curdate(), curdate());
	end//
DELIMITER //


DELIMITER //
create trigger Actualiza_inventario_size_color_estado after update on inventory
for each row 
	begin 
		declare totalStockProducto int;
		declare newtotalStock int;
		if (new.estado = old.estado) then
			set totalStockProducto =(select Funcion_obtener_total_stock_by_producto(new.id_producto));
			set newtotalStock =totalStockProducto - abs(old.stock-new.stock);
			update inventory_header  set total_stock  = newtotalStock where id_producto =new.id_producto;
		elseif(new.estado = 1) then 	
					set totalStockProducto =(select Funcion_obtener_total_stock_by_producto(new.id_producto));
					set newtotalStock =totalStockProducto+abs(old.stock-new.stock);
					update inventory_header  set total_stock  = newtotalStock where id_producto=new.id_producto;
			elseif (new.estado = 2) then 
					set totalStockProducto =(select Funcion_obtener_total_stock_by_producto(new.id_producto));
					set newtotalStock =totalStockProducto - abs(old.stock-new.stock);
					update inventory_header  set total_stock  = newtotalStock where id_producto =new.id_producto;
		end if;
	end//
DELIMITER //	


DELIMITER //
create trigger Actualiza_inventario_size_color after insert on inventory
for each row 
	begin 
		declare totalStockProducto int;
		declare total int;
		set totalStockProducto =(select Funcion_obtener_total_stock_by_producto(new.id_producto));
		set total = totalStockProducto +new.stock;
		update inventory_header  set total_stock  = total where id_producto =new.id_producto;	
		end//
DELIMITER //


