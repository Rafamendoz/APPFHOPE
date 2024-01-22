<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use  App\Models\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ServiceGatewayController extends Controller
{
    public function Enrutar($id, $config, $from){
        if(isset($config["forms_params"]->message)){
            $numeroLetras = strlen(preg_replace('/\s+/', '', $config["forms_params"]->message));
            $finallyMessage = "";
            if($numeroLetras>100){
                $finallyMessage = "DATA RECIBIDA PERO LA LECTURA ESTA DESACTIVADA ";
    
            }else{
                $finallyMessage = "DATA RECIBIDA: ".$config["forms_params"]->message;
                Log::info($finallyMessage.$config["forms_params"]->codeError);

            }

        }else{
            $message = json_encode($config);
            $finallyMessage = "DATA RECIBIDA: ".$message;
                Log::info($finallyMessage);


        }

        

        

        $service = Services::where('id', $id)->get();
        Log::info('ServiceGatewayController [LOADING] : REALIZANDO LLAMADO DESDE '.$from.' HACIA '.$service[0]['service_name']);
        switch ($service[0]['method']) {
            case 'GET':
                $data =  $this->LlamarServiceGet($service[0]['endpoint'].$message);
                return $data;
                break;
            
            case 'POST':
                $data =  $this->LlamarServicePost($service[0]['endpoint'],$config);
                return $data;
                break;

            case 'PUT':
                    # code...
                break;
           
        }
       
      
    }

    public function LlamarServiceGet($urlServicio){
        log::info('LLAMANDO SERVICIO GET: '.$urlServicio);
        $client = new Client();
        $response = $client->get($urlServicio,[
        'headers' =>[
        'Authorization'=>"Basic YWRtaW5AZmhvcGUub25saW5lOmFkbWluMTIzNDU="
        ]]); 
        $data = json_decode($response->getBody(), true);
        return $data;


    }

    public function LlamarServicePOST($urlServicio, $configRequest){
        log::info('LLAMANDO SERVICIO POST: '.$urlServicio);
        $client = new Client();
        Log::info("INFO REQUEST:".json_encode($configRequest));
        $config = $configRequest;
        $response = $client->post($urlServicio, $config); 

        // Obtiene el cuerpo de la respuesta como JSON
        $data = json_decode($response->getBody(), true);
        return $data;


    }
}
