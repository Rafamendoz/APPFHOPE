<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Support\Facades\DB;

class MonedaController extends Controller
{
    public function getMonedas(){
        try {
            $id = "Activo";
            $monedas1 =DB::select('CALL Obtener_monedas_vista(?)', array($id));
            $monedas = Moneda::all();
            return view('monedas', compact('monedas'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }



    public function setMoneda(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $moneda = Moneda::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }

    }

    public function getMonedasRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $monedas = Moneda::all();
            if(sizeof($monedas)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Monedas"=>$monedas, "Response"=>[
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

    public function getMonedasRestActive(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $monedas =DB::select('CALL Obtener_monedas_vista(?)', array("Activo"));
            if(sizeof($monedas)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Monedas"=>$monedas, "Response"=>[
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

    public function getMonedasRestNoActive(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $monedas = Moneda::all();
            if(sizeof($monedas)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Monedas"=>$monedas, "Response"=>[
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

    public function getMonedaRestById($id){
        $moneda = Moneda::find($id);
        return response()->json(["Moneda"=>$moneda,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Encontrado"], 202);

    }

    public function putMoneda(Request $request, $id){
        $moneda = Moneda::find($id);
        $moneda->update($request->all());
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Modificado"], 202);

    }

    public function deleteMoneda(Request $request, $id){
        $moneda = Moneda::find($id);
        if(is_null($moneda)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);
        }else{
            if($request->estado===1){
                $moneda->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
            }else{
                $moneda->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
            }
           
        }

    }
}
