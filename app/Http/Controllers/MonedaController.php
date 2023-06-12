<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;

class MonedaController extends Controller
{
    public function getMonedas(){
        try {
            $id = "Activo";
            $monedas =DB::select('CALL Obtener_monedas_vista(?)', array($id));
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
                Log::info("RESPONSE: ".$response);

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
            $monedas = Moneda::where('estado', 1)->get();
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
                Log::info("RESPONSE: ".$response);
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
            $monedas = Moneda::where('estado', 2)->get();
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
                Log::info("RESPONSE: ".$response);

                return $response;  
            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }

    }

   

    public function getMonedaRestById(Request $request,$id){
        try {
            log::info("REQUEST: ".$request);
            $moneda = Moneda::find($id);
            if(is_null($moneda)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $response =  response()->json([
                    "Moneda"=>$moneda, "Response"=>[
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

    public function putMoneda(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $moneda = Moneda::find($id);
            if(is_null($moneda)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $moneda->update($request->all());
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Modificado"]], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }

        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      

    }

    public function deleteMoneda(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $moneda = Moneda::find($id);
            if(is_null($moneda)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                switch($request->estado){
                    case 1:
                        $moneda->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    case 2:
                        $moneda->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Desactivado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    default:
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"El valor ingresado no es permitido, para el tipo de campo"]], 202);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;



                }
                
               
            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      

    }


    public function addMoneda(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $estados = Estado::all();
            $vista = view("addmoneda", compact('estados'));
            log::info("RESPONSE: VISTA addmoneda devuelta");
            return $vista;
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
     
        
    }




}
