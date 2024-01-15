<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;



class ClosureController extends Controller
{

   
    

    public function getTableNames(){

        $coleccionHistorica = collect();
        $coleccionActual = collect();
        $reporteFinal = collect();
        $create = DB::select('call createTempTable()');
        $tableNames = DB::select('SELECT * from tablesEntity');
        $cont = 0;
        foreach ($create as $key) {
            $reportActual = DB::select('call ReportClosure(?,?)', array('fhopeonl_gestion_fhope',$key->tableName ));
            $reportHistorica = DB::select('call ReportClosure(?,?)', array('fhopeonl_gestion_fhope_historica',$key->tableName ));
            $reporteFinal->push(["TableName"=>$key->tableName, "HistoricaTotal"=>$reportHistorica[0]->total, "ActualTotal"=>$reportActual[0]->total]);
        }

        

      
        return view("reportCierre", compact('reporteFinal'));


    }

    public function makeRollbackClosure(){
        try {
            $create = DB::select('call createTempTable()');
            $tableNames = DB::select('SELECT * from tablesEntity');
            $cont = 0;
            foreach ($create as $key) {
                $reportActual = DB::select('call RollbackClosure(?,?,?)', array('fhopeonl_gestion_fhope','fhopeonl_gestion_fhope_historica',$key->tableName ));
            }
            return response()->json(["Status"=>"Success", "Description"=>"Rollback Ejecutado"]);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        


    }
   
    
   
    public function executeClosure(Request $request){
        {
            // Ruta al archivo de dump SQL
            try {
                //code...
           
            $comando = 'export:database';
            Artisan::call($comando);
            $output = Artisan::output();
            $mensajeSinNuevaLinea = str_replace(["\r", "\n"], '', $output);


            if($mensajeSinNuevaLinea =='Backup created successfully' ){
                $rutaArchivoDump = realpath(base_path('app/backups/dump.sql'));

                if (File::exists($rutaArchivoDump)) {
                  
                        // Lee el contenido del archivo de dump
                        $conexionOtraBaseDatos = 'mysql1';
                        DB::setDefaultConnection($conexionOtraBaseDatos);
    
                        $contenidoSQL  = File::get($rutaArchivoDump);
    
                        $dbConfig = Config::get('database.connections.mysql');
                        $host = $dbConfig['host'];
                        $port = $dbConfig['port'];
                        $database = $dbConfig['database'];
                        $username = $dbConfig['username'];
                        $password = $dbConfig['password'];
            
                        // Lee el contenido del archivo SQL
                        $contenidoSQL = File::get($rutaArchivoDump);
            
                        // Reemplaza las credenciales en el archivo SQL
                        $contenidoSQL = str_replace(['{{host}}', '{{port}}', '{{database}}', '{{username}}', '{{password}}'], [$host, $port, $database, $username, $password], $contenidoSQL);
            
                        // Ejecuta las consultas SQL
                        DB::unprepared($contenidoSQL);
    
            
        
                        // Ejecuta las consultas SQL del dump
        
                        return response()->json(['message' => 'Dump ejecutado con éxito']);
                  
                } else {
                    return response()->json(['message' => 'El archivo de dump no existe'], 404);
                }
                

            }else{
                return response()->json(['message' => 'Ha ocurrido un error al generar el dump', "Output"=>$mensajeSinNuevaLinea], 500);

            }

        } catch (\Exception $e) {
            // Captura cualquier excepción y maneja el error
            return response()->json(['message' => 'Error al ejecutar el dump: ' . $e->getMessage()], 500);
        }
    
            // Verifica si el archivo de dump existe
          
        }

        
        

    }


}
