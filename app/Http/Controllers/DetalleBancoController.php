<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleBanco;
use App\Models\CuentaBancaria;

use App\Models\Error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DetalleBancoController extends Controller
{
    
    public function getDetalleBancario($id){
        try {
            $estado = CuentaBancaria::where('id',$id)->select('estado')->get();

            if(sizeof($estado)<1 || $estado[0]->estado==2){
                return redirect("cuentasBancarias");

            }else{
                $datosCuenta = DB::select('call Obtener_cuentaBancaria_vista(?)', array($id));
                $totalEntradas = DB::select('call Obtener_detalleBancarios_totalEntradas_by_cuentabancaria(?)',array($id));
                $totalSalidas = DB::select('call Obtener_detalleBancarios_totalSalidas_by_cuentabancaria(?)',array($id));
                $totalNeto = floatval($totalEntradas[0]->totalEntradas)-floatval( $totalSalidas[0]->totalSalidas);
                $salidasBancarias = DB::select('call Obtener_detalleBancarios_salidas_by_cuentabancaria(?)',array($id));
                $entradasBancarias = DB::select('call Obtener_detalleBancarios_entradas_by_cuentabancaria(?)',array($id));
    
                return view('detalleBanco', compact('datosCuenta','salidasBancarias', 'entradasBancarias', 'totalEntradas', 'totalSalidas', 'totalNeto'));

            }
           
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
    }

    public function getSalidasBancariasRestByCuenta(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $salidasBancarias = DB::select('call Obtener_detalleBancarios_salidas_by_cuentabancaria(?)',array($id));
            if(sizeof($salidasBancarias)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "SalidasBancarias"=>$salidasBancarias, "Data_Respuesta"=>[
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

    public function getEntradasBancariasRestByCuenta(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $entradasBancarias = DB::select('call Obtener_detalleBancarios_entradas_by_cuentabancaria(?)',array($id));
            if(sizeof($entradasBancarias)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "EntradasBancarias"=>$entradasBancarias, "Data_Respuesta"=>[
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

    public function getSalidasBancariasRestByFecha(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $salidasBancarias = DB::select('call Obtener_detalleBancarios_salidas_by_fecha(?,?,?)',array($request->fechaInicial,$request->fechaFinal, $id));
            if(sizeof($salidasBancarias)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "SalidasBancarias"=>$salidasBancarias, "Data_Respuesta"=>[
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

    public function getEntradasBancariasRestByFecha(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $salidasBancarias = DB::select('call Obtener_detalleBancarios_entradas_by_fecha(?,?,?)',array($request->fechaInicial,$request->fechaFinal, $id));
            if(sizeof($salidasBancarias)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "SalidasBancarias"=>$salidasBancarias, "Data_Respuesta"=>[
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
                    "DetallesBancarios"=>$detallesBanco, "Data_Respuesta"=>[
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

    public function getDetalleBancoRestById(Request $request,$id){
        try {
            log::info("REQUEST: ".$request);
            $detalleBanco = DetalleBanco::find($id);
            if(is_null($detalleBanco)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $response =  response()->json([
                    "DetalleBancario"=>$detalleBanco, "Data_Respuesta"=>[
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

    public function getDetalleBancoRestByTipoTransaccion(Request $request,$id){
        
        try {
            log::info("REQUEST: ".$request);
            $detalleBanco = DetalleBanco::where('id_tipoTransaccion', $id)->get();
            if(sizeof($detalleBanco)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $response =  response()->json([
                    "DetalleBancario"=>$detalleBanco, "Data_Respuesta"=>[
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
