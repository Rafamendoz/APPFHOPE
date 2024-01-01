-- Active: 1681235059242@@127.0.0.1@3306@proyecto_gestion_fhope
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
create trigger Actualiza_inventario_detalle_producto_venta_delete before delete on detalle_producto_venta
for each row 
	begin 
		declare totalStock int;
		declare newtotalStock int;
		set totalStock =(select Funcion_obtener_total_stock_by_producto_size_color(old.producto_id, old.color_id,old.size_id));
		set newtotalStock =totalStock+old.cantidad;
		update inventory  set stock  = newtotalStock where id_producto = old.producto_id and id_size = old.size_id and id_color =old.color_id;
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
		if newtotalStock >=0 then
				update inventory  set stock  = newtotalStock where id_producto = new.producto_id and id_size = new.size_id and id_color =new.color_id;
		else 
				call Mapeo_Error('CP-E1-T01');
		end if;
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
		if (new.stock < old.stock) then
			set totalStockProducto =(select Funcion_obtener_total_stock_by_producto(new.id_producto));
			set newtotalStock = totalStockProducto -(old.stock-new.stock);
			update inventory_header  set total_stock  = newtotalStock where id_producto =new.id_producto;
		elseif(new.stock > old.stock) then 	
			set totalStockProducto =(select Funcion_obtener_total_stock_by_producto(new.id_producto));
			set newtotalStock = totalStockProducto +(new.stock-old.stock);
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


DELIMITER //
	create Trigger Parsea_Id_T_Error AFTER INSERT on errores
	FOR EACH ROW
		BEGIN
		DECLARE parseId VARCHAR;
		SET parseId = CONCAT("E0",new.id);
		UPDATE errores set id=parseId where id=new.id;
		END//
DELIMITER //


