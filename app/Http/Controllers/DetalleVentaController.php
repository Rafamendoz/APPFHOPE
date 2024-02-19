<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Log;


class DetalleVentaController extends Controller
{

    protected $responseController;


    public function __construct(ResponseController $responseController) {
        $this->responseController = $responseController;
    }



    


    public function setDetalleVenta(Request $request){
        try {
            $dventa = DetalleVenta::create($request->all());
            Log::info("REQUEST: ".$request);
            $response = $this->responseController->responseAfterSave();
            Log::info("RESPONSE: ".$response);
            return $response; 

        } catch (\Illuminate\Database\QueryException $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    }

  

    public function getDetalleVentaRestByVentaId(Request $request){
        try {
            log::info('REQUEST '.$request);
            $detalleV = DetalleVenta::where("venta_id",$request->id)->get();
            if(sizeof($detalleV)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "DetalleV"=>$detalleV, "Response"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;;
        }
     
    }

    public function getDetallesVentaRest(Request $request){
        try {
            log::info('REQUEST '.$request);
            $detallesV = DetalleVenta::all();
            if(sizeof($detallesV)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "DetallesV"=>$detallesV, "Response"=>[
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

    


}
