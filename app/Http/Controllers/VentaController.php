<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Estado;
use App\Models\Error;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ResponseController;

class VentaController extends Controller
{

    protected $responseController;


    public function __construct(ResponseController $responseController) {
        $this->responseController = $responseController;
    }

    public function getVentasAll(){
        try {
         
            $ventas = DB::select('CALL ObtenerCabeceraVentasAll()');
           
            return view('ventas', compact('ventas'));
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
      
    }

    public function getVentas(){
        try {
         
            $ventas = DB::select('CALL ObtenerCabeceraVentas()');
           
            return view('ventas', compact('ventas'));
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
      
    }

    public function addColaborador(){
        $estados = Estado::all();
        $puestos = Puesto::all();
        $usuarios = User::all();
        return view('addcolaborador', compact('estados','puestos','usuarios'));
    }


    public function setVenta(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $venta = Venta::create($request->all());
            $response = $this->responseController->responseAfterSave();
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    }

    public function getVentasRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $ventas = Venta::all();
            if(sizeof($ventas)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Ventas"=>$ventas, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;  
    
            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
        
    }

    public function getVentaRestById(Request $request,$id){

        try {
            log::info('REQUEST '.$request);
            $venta = Venta::find($id);
            if(is_null($venta)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Venta"=>$venta, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    }

    

    public function deleteVenta(Request $request , $id){
        try {
            Log::info("REQUEST: ".$request);
            $venta = Venta::find($id);
            if(is_null($venta)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede eliminar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                switch($request->estado){
                    case 1:
                        $venta->update(['estado'=>$request->estado]);
                        DB::select('call Actualizar_detallesVenta_estado(?,?) ', array($id,1));
                        DB::select('call Actualizar_detallesproductos_estado(?,?) ', array($id,1));

                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    case 2:
                        $venta->update(['estado'=>$request->estado]);
                        DB::select('call Actualizar_detallesVenta_estado(?,?) ', array($id,2));
                        DB::select('call Actualizar_detallesproductos_estado(?,?) ', array($id,2));

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
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
       
    }

    public function putVenta(Request $request, $id){
        try {
            Log::info("REQUEST: ".$request);
            $venta = Venta::find($id);
            if(is_null($venta)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $venta->update(["direccionEnvio"=>$request->direccionEnvio]);
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Modificado"]], 200);
                Log::info("RESPONSE: ".$response);
                return $response;
            }

        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    }


    public function generateRollback(Request $request){
        try {
            $rollback = DB::select("CALL generateRollback(?)", array($request->id_venta));
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Rollback ejecutado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    }




}
