<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Error;

class ResponseController extends Controller
{
    //

    public function PreparaResponse($error){
        $response= response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        log::info('RESPONSE: '.$response);
        return $response;
    }   


    public function responseAfterSave(){
        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
        return $response;
    }

    public function responseAfterError($th, $method){
        Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
        $message = array('form_params' => [ 'message' => $th->getMessage(), 'codeError'=>$th->getCode()]);
        $data = app(ServiceGatewayController::class)->Enrutar(100, $message, $method);
        $error = Error::select('subcodigo','descripcion','codigo_error','errorApp')->where('subcodigo',$data['CodeError'])->get();
        return response()->json(["Estado"=>"Fallido","Codigo"=>$error[0]->errorApp, "Mapping_Error"=>$error],$error[0]->errorApp);

    }

    public function responseAfterHttpCodeNot500($codeError, $method){
        Log::error("Codigo de error: ".$codeError." Mensaje: NOT FOUND");
        $message = array('form_params' => [ 'codeError'=>$codeError]);
        $data = app(ServiceGatewayController::class)->Enrutar(101, $message, $method);
        $error = Error::select('subcodigo','descripcion','codigo_error','errorApp')->where('subcodigo',$data['CodeError'])->get();
        return response()->json(["Estado"=>"Not Found","Codigo"=>$error[0]->errorApp, "Mapping_Error"=>$error],$error[0]->errorApp);

    }
}
