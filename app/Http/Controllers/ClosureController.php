<?php

namespace App\Http\Controllers;
use App\Models\Error;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use App\Jobs\ExecuteClosure;



class ClosureController extends Controller
{

   

    public function deleteTablePostClosure(Request $request){
        try {
            $db = $request->databaseName;
            $create = DB::select('call createTempTable()');
            foreach ($create as $key) {
                DB::select('call debugTables(?,?)', array($key->tableName,$db));
            }
            return response()->json(["Status"=>"Success", "Description"=>"Tabla Depurada"],200);
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__, $th->getCode());
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
           
        }
      

    }

    public function sendClosure(Request $request){
        $date = date('Y-m-d H:i:s');
        ExecuteClosure::dispatch('CIERRE DE BASE DE DATOS - '.$date)->onConnection('database');
        return response()->json(["Status"=>"Success", "Description"=>"Servicio ejecutado y enviado a la cola"],200);

    }
    

    public function getTableNames(Request $request){
        $db = $request->databaseName1;
        $db2 = $request->databaseName2;

        $coleccionHistorica = collect();
        $coleccionActual = collect();
        $reporteFinal = collect();
        $create = DB::select('call createTempTable()');
        $tableNames = DB::select('SELECT * from tablesEntity');
        $cont = 0;
        foreach ($create as $key) {
            $reportDb1 = DB::select('call ReportClosure(?,?)', array($db,$key->tableName ));
            $reportDb2 = DB::select('call ReportClosure(?,?)', array($db2,$key->tableName ));
            $reporteFinal->push(["TableName"=>$key->tableName, "HistoricaTotal"=>$reportDb2[0]->total, "ActualTotal"=>$reportDb1[0]->total]);
        }

        

      
        return view("reportCierre", compact('reporteFinal'));


    }

    public function trasforJsonToArray($json){
        $coleccionActual = [];

        foreach ($json as $key ) {
            array_push($coleccionActual,$key->name);
        }
        return $coleccionActual;

    }

    public function validateTableNoDebugables(Request $request){
        $create = DB::select('call createTempTable()');
        $expections = DB::select('call getTablesNoDebug()');

        $expectionsArray = $this->trasforJsonToArray($expections);




        foreach ($create as $key) {
                    $valorP = $key->tableName;
                    $valorCondicion = in_array($key->tableName,$expectionsArray);
                    Log::info("VALOR DE LA CONDICION PARA TABLA ".$valorP." = ".$valorCondicion);

/*
                if(in_array($valorP,$expectionsArray)){
                    log::info("ELIMINANDO ".$key->tableName);
                    DB::select('call debugTables(?,?)', array($key->tableName,$db));
                }*/
            }

        
    }

    public function getTableNamesRest(Request $request){
        $db = $request->databaseName1;
        $db2 = $request->databaseName2;

        $coleccionHistorica = collect();
        $coleccionActual = collect();
        $reporteFinal = collect();
        $create = DB::select('call createTempTable()');
        $tableNames = DB::select('SELECT * from tablesEntity');
        $cont = 0;
        foreach ($create as $key) {
            $reportDb1 = DB::select('call ReportClosure(?,?)', array($db,$key->tableName ));
            $reportDb2 = DB::select('call ReportClosure(?,?)', array($db2,$key->tableName ));
            $reporteFinal->push(["TableName"=>$key->tableName, "HistoricaTotal"=>$reportDb2[0]->total, "ActualTotal"=>$reportDb1[0]->total]);
        }

        $response = response()->json(["Status"=>"Success", "TablesInfo"=>$reporteFinal],200);
        return $response;


    }

    public function makeRollbackClosure(Request $request){

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

        } catch (QueryException $e) {
            // Captura cualquier excepción y maneja el error
            return response()->json(['message' => 'Error al ejecutar el dump: ' . $e->getMessage()], 500);
        }
    
            // Verifica si el archivo de dump existe
          
        }

        
        

    }


}
