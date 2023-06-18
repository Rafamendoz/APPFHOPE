<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Error;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function getClientes(){
        try {
            $clientes = Cliente::all()->where('estado', 1);
            return view('clientes', compact('clientes'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function addCliente(){
        try {
            $estados = Estado::all();
            return view('addcliente', compact('estados'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
        
    }


    public function setCliente(Request $request){
        try {
            $cliente = Cliente::create($request->all());
            Log::info("REQUEST: ".$request);
           $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
           Log::info("RESPONSE: ".$response);
           return $response;
        } catch (\Illuminate\Database\QueryException $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
    }

    public function getClientesRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $clientes = Cliente::all();
            if(sizeof($clientes)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Clientes"=>$clientes, "Data_Respuesta"=>[
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

    public function getClienteRestById($id, Request $request){
        try {
            $cliente = Cliente::where('id',$id)->get();
            Log::info("REQUEST: ".$request);
            if(sizeof($cliente)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;


            }else{
                $response = response()->json([
                    "Cliente"=>$cliente, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Descripcion"=>"Registro Encontrado",
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

    public function getClienteRestByDNI($id, Request $request){
        try {
            log::info("REQUEST: ".$request);
            $cliente = Cliente::where('cliente_DNI',$id)->get();
            if(sizeof($cliente)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $response =  response()->json([
                    "Cliente"=>$cliente, "Data_Respuesta"=>[
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

    public function putCliente(Request $request,$id){
        try {
            Log::info("REQUEST: ".$request);
            $cliente = Cliente::find($id);
            if(is_null($cliente)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $cliente->update($request->all());
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

    public function deleteCliente(Request $request , $id){
        try {
            Log::info("REQUEST: ".$request);
            $cliente = Cliente::find($id);
            if(is_null($cliente)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede eliminar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                switch($request->estado){
                    case 1:
                        $cliente->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    case 2:
                        $cliente->update($request->all());
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
