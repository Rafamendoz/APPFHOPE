<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleBanco;
use App\Models\Error;
use Illuminate\Support\Facades\Log;

class DetalleBancoController extends Controller
{
    

    public function setDetalleBanco(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $detalleBanco = DetalleBanco::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }


    }

    public function getDetallesBancoRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $detallesBanco = DetalleBanco::all();
            if(sizeof($detallesBanco)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "DetallesBancarios"=>$detallesBanco, "Response"=>[
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

    public function getDetalleBancoRestById($id){
        $detalleBanco = DetalleBanco::where('id_banco',$id)->get();
        return response()->json([
            "DetallE Banco"=>$detalleBanco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);


    }

    public function getDetalleBancoRestByTipoTransaccion(Request $request,$id){
        $detalleBanco = DetalleBanco::where('id_banco', $id)->where('id_tipoTransaccion', $request->id_tipoTransaccion)->get();
        return response()->json([
            "DetalleBanco"=>$detalleBanco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);

    }

    

  




}
