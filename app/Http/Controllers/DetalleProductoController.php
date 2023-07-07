<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Models\DetalleProducto;
use Illuminate\Support\Facades\Log;

class DetalleProductoController extends Controller
{
    
    public function setDetalleProducto(Request $request){
        try {
            $dventa = DetalleProducto::create($request->all());
            Log::info("REQUEST: ".$request);
           $response = response()->json(["Data_Respuesta"=>["Orden"=>$dventa->venta_id,"Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
           Log::info("RESPONSE: ".$response);
           return $response;
        } catch (\Illuminate\Database\QueryException $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
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
                    "DetalleV"=>$detalleP, "Response"=>[
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

    public function getDetallesVentaRest(Request $request){
        try {
            log::info('REQUEST '.$request);
            $detallesP = DetalleProducto::all();
            if(sizeof($detallesP)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "DetallesV"=>$detallesP, "Response"=>[
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
