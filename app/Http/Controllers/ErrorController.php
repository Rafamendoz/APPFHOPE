<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use App\Http\Controllers\ServiceGatewayController;


class ErrorController extends Controller
{
    

    public function MapearError($th){
        $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__,$th->getCode());
        return $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
    }

    public function GetErrorRest(Request $request){
        try {
            $data = DB::select('CALL Mapeo_Error(?)',array('CP-E1-T01'));

        }  catch (PDOException $e) {
            // Captura el mensaje de error de la excepción
            $errorMessage = $e->getMessage();
            
            // Utiliza una expresión regular para extraer el número '1234' después de SQLSTATE[45000]: <>: 1644
            if (preg_match('/SQLSTATE\[45000\]: <<Unknown error>>: 1644 (\S+)/', $errorMessage, $matches)) {
                $extractedText = $matches[1];
                Log::error("Codigo de error: ".$e->getCode()." Mensaje: ".$e->getMessage());
                $error = Error::where('codigo_error',$extractedText)->get();
                return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
              
            } else {
                echo $errorMessage;
            }
        }
    }


    public function GetError(Request $request){
        Log::info("REQUEST: ".$request);

        $errorMessage = $request->message;

        if (preg_match('/SQLSTATE\[45000\]: <<Unknown error>>: 1644 (\S+)/', $errorMessage, $matches)) {
            $extractedText = $matches[1];
              
            $response= response()->json(["Estado"=>"Exitoso", "CodeError"=>$extractedText],200);
            Log::info("RESPONSE: ".$response);

            return $response;
        } 
        
    }

  

        
        
        
    

}
