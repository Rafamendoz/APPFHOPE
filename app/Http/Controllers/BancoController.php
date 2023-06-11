<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banco;
use Illuminate\Support\Facades\Log;
use App\Models\Error;

class BancoController extends Controller
{
    public function setBanco(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $banco = Banco::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      }

    public function getBancosRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $bancos = Banco::all();
            if(sizeof($bancos)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Ventas"=>$ventas, "Response"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                return $response;  
    
            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
        
       
       
    }

    public function getBancoRestById($id){
        $banco = Banco::find($id);
        return response()->json([
            "Banco"=>$banco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);

    }

    public function putBanco(Request $request, $id){
        $banco = Banco::find($id);
        $banco->update($request->all());
        return response()->json(
            ["Banco"=>$banco
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );
    }
    
    public function deleteBanco(Request $request, $id){
        $banco = Banco::find($id);
        $x = $request->estado;

        if(is_null($banco)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);

        }else{
            switch($x){
                case 1:
                    $banco->update($request->all());
                    return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
                    break;
                case 2:
                    $banco->update($request->all());
                    return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);    
                    break;
             
            }   
        }
    }
}
