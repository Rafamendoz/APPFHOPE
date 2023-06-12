<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void

    {

        $rollback_procedureCuentaVista = "DROP PROCEDURE IF EXISTS Obtener_tipo_cuenta_vista";
        DB::unprepared($rollback_procedureCuentaVista);


        $rollback_procedureVentaById = "DROP PROCEDURE IF EXISTS ObtenerCabeceraVenta";
        DB::unprepared($rollback_procedureVentaById);
        
        $rollback_procedureMonedaVista = "DROP PROCEDURE IF EXISTS obtener_monedas_vista";
        DB::unprepared($rollback_procedureMonedaVista);

        $rollback_procedureVentas = "drop procedure if EXISTS ObtenerCabeceraVentas";
        DB::unprepared($rollback_procedureVentas);

        $procedureVentaById = "
        CREATE procedure ObtenerCabeceraVenta (IN id_venta INT )
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, v.total, DATE(v.created_at) as 'date', DATE_FORMAT(v.created_at, \"%H:%i:%S\" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            WHERE v.id = id_venta and v.estado=1;
        END
        ";

        $procedureVentas = "
        CREATE procedure ObtenerCabeceraVentas ()
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, v.total, DATE(v.created_at) as 'date', DATE_FORMAT(v.created_at, \"%H:%i:%S\" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            WHERE v.estado = 1;
        END
        ";

        $procedureMonedaVista = "
        CREATE PROCEDURE Obtener_monedas_vista (in estado TEXT COLLATE utf8_general_ci)
        begin 
        select m.id, m.moneda_nombre,m.estado, e.valor, m.created_at, m.updated_at  from moneda m
        inner join estado e on m.estado = e.id 
        where e.valor=estado;
        end 
        ";

        $procedureCuentaVista = "
        create procedure Obtener_tipo_cuenta_vista (in estado TEXT collate utf8_general_ci)
        begin
            select c.id, c.cuenta_nombre, e.valor, c.created_at, c.updated_at from cuenta c
            inner join estado e on c.estado = e.id
            where e.valor = estado;
        end
        ";




        DB::unprepared($procedureVentaById);
        DB::unprepared($procedureVentas);
        DB::unprepared($procedureMonedaVista);
        DB::unprepared($procedureCuentaVista);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $rollback_procedureVentaById = "DROP PROCEDURE IF EXISTS ObtenerCabeceraVenta";
        DB::unprepared($rollback_procedureVentaById);
        
        $rollback_procedureVentas = "DROP PROCEDURE IF EXISTS ObtenerCabeceraVentas";
        DB::unprepared($rollback_procedureVentaById);
    }
};
