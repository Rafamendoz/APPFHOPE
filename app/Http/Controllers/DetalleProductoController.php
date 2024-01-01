<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Http\Controllers\ErrorController;
use App\Models\DetalleProducto;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;




class DetalleProductoController extends Controller
{



 



 
   
    public function setDetalleProducto(Request $request){
        Log::info("REQUEST: ".$request);
        try {
            $client = new Client();
            $dproducto = DetalleProducto::create($request->all());
            Log::info("REQUEST: ".$request);
           $response = response()->json(["Data_Respuesta"=>["Orden"=>$dproducto->venta_id,"Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
           Log::info("RESPONSE: ".$response);
           return $response;
        } catch (\Illuminate\Database\QueryException $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            if($th->getCode()==45000){
             
                $urlServicio = 'http://services.fhope.online/api/error';
                $response = $client->post($urlServicio, [
                    'form_params' => [
                        'message' => $th->getMessage(),
                    ]
                ]); 

                // Obtiene el cuerpo de la respuesta como JSON
                $data = json_decode($response->getBody(), true);
             
                $errorF = Error::where('codigo_error',$data['CodeError'])->get();
                
                $response =response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$errorF],500);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
               Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
              $error = Error::where('codigo_error',$th->getCode())->get();
              return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            
            }
       

        
           
        
        }

    }

  

    public function getDetalleProductoRestByVentaId(Request $request,$id){
        try {
            log::info('REQUEST '.$request);
            $detalleP = DetalleProducto::where("venta_id",$id)->get();
            if(sizeof($detalleP)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "DetalleP"=>$detalleP, "Response"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
     
    }

    public function getDetallesProductoRest(Request $request){
        try {
            log::info('REQUEST '.$request);
            $detallesP = DetalleProducto::all();
            if(sizeof($detallesP)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "DetallesProducto"=>$detallesP, "Response"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
     
    }
}
