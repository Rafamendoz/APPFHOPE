<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Estado;

class TransaccionController extends Controller
{

    

    public function getTipoTransaccion(){
        try {
            $id = "Activo";
            $tipotransaccion =DB::select('CALL Obtener_tipo_transaccion_vista(?)', array($id));
            return view('tipotransaccion', compact('tipotransaccion'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function addTipoTransaccion(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $estados = Estado::all();
            $vista = view("addtipotransaccion", compact('estados'));
            log::info("RESPONSE: VISTA addtransaccion devuelta");
            return $vista;
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
     
        
    }




    public function setTransaccion(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $tipotransaccion = Transaccion::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }


    }

    public function getTransaccionesRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $tipotransacciones = Transaccion::all();
            if(sizeof($tipotransacciones)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "TiposTransaccion"=>$tipotransacciones, "Response"=>[
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

    public function getTransaccionRestById(Request $request,$id){
        try {
            log::info("REQUEST: ".$request);
            $tipotransaccion = Transaccion::find($id);
            if(is_null($tipotransaccion)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $response =  response()->json([
                    "TipoTransaccion"=>$tipotransaccion, "Response"=>[
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



    public function putTransaccion(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $transaccion = Transaccion::find($id);
            if(is_null($transaccion)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $transaccion->update($request->all());
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

    public function deleteTransaccion(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $transaccion = Transaccion::find($id);
            if(is_null($transaccion)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede eliminar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                switch($request->estado){
                    case 1:
                        $transaccion->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    case 2:
                        $transaccion->update($request->all());
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

    





}
