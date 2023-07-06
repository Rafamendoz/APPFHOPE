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

