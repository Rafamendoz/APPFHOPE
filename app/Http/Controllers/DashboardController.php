<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function getDashboard(){
        $month = date('n');
        $year = date('Y');
        $flujoMensual = DB::select('select Funcion_obtenerFlujoGanancias_porMes(?) as total', array($month));
        $flujoAnual = DB::select('select Funcion_obtenerFlujoGanancias_porYear(?) as total', array($year));

        $flujoMensualFormatead = number_format($flujoMensual[0]->total,2,".",",");
        $flujoAnualFormatead = number_format($flujoAnual[0]->total,2,".",",");

        return view('dashboard', compact('flujoMensualFormatead', 'flujoAnualFormatead'));

    }

    public function getDashboardOperativoTI(){
        $month = date('n');
        $year = date('Y');
        $flujoMensual = DB::select('select Funcion_obtenerFlujoGanancias_porMes(?) as total', array($month));
        $flujoAnual = DB::select('select Funcion_obtenerFlujoGanancias_porYear(?) as total', array($year));
        $queue = $this->obtenerPorcentajeAvanceCola();
        $flujoMensualFormatead = number_format($flujoMensual[0]->total,2,".",",");
        $flujoAnualFormatead = number_format($flujoAnual[0]->total,2,".",",");
        $queueFallidas = $this->obtenerColasFallidas();
        $config = ['form_params'=>["databaseName1"=>"fhopeonl_gestion_fhope","databaseName2"=>"fhopeonl_gestion_fhope_historica"]];
        $data = app(ServiceGatewayController::class)->Enrutar(102, $config, __METHOD__);

        return view('dashboardOperativoTI', compact('flujoMensualFormatead', 'flujoAnualFormatead', 'queue', 'queueFallidas', 'data'));

    }


    function obtenerPorcentajeAvanceCola()
    {
        $colas = DB::select('select * from jobs');
        $coleccion = collect();
        $porcentajeAvance=0;
        foreach ($colas as $key) {
            $totalTrabajos = DB::table('jobs')->where('queue', $key->queue)->count();
            $trabajosCompletados = DB::table('jobs')->where('queue', $key->queue)->count();

            if ($totalTrabajos > 0) {
                $porcentajeAvance = ($trabajosCompletados / $totalTrabajos) * 100;
            }
    
            $coleccion->push(["quueName"=>$key->queue, "percent"=>$porcentajeAvance]);


        }

        // Si no hay trabajos en la cola, el porcentaje de avance es 0.

        return $coleccion;
    }


    function obtenerColasFallidas()
    {
        $colas = DB::select('select * from failed_jobs');
        $coleccion = collect();
        $porcentajeAvance=0;
        foreach ($colas as $key) {

    
            $coleccion->push(["quueName"=>$key->queue, "status"=>"failed"]);


        }

        // Si no hay trabajos en la cola, el porcentaje de avance es 0.

        return $coleccion;
    }
}
