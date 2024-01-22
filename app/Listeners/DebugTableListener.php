<?php

namespace App\Listeners;

use App\Events\DebugTables;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\ServiceGatewayController;
use App\Http\Controllers\ClosureController;

use Illuminate\Support\Facades\DB;
use App\Models\Error;


use Illuminate\Support\Facades\Log;

class DebugTableListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DebugTables $event): void
    {
        try {
            $conexionOtraBaseDatos = 'mysql';
            DB::setDefaultConnection($conexionOtraBaseDatos);
            $db = $event->databaseName;
            $create = DB::select('call createTempTable()');
            $expections = DB::select('call getTablesNoDebug()');
            $expectionsArray = app(ClosureController::class)->trasforJsonToArray($expections);

            foreach ($create as $key) {
                        $valorP = $key->tableName;
                    
                    if(in_array($valorP,$expectionsArray)){
                        log::info("TABLA PROTEGIDA ".$key->tableName." NO ELIMINADA");

                    }else{
                        log::info("ELIMINANDO ".$key->tableName);
                        DB::select('call debugTables(?,?)', array($valorP,$db));

                    }
                }
            
            Log::info("EVENTO DISPARADO DebugTables");

            $response= response()->json(["Status"=>"Success", "Description"=>"Tabla Depurada"],200);
            Log::info("RESPONSE  ".$response);

        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__, $th->getCode());
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            $response = response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            Log::info("RESPONSE  ".$response);

        }
    }
}
