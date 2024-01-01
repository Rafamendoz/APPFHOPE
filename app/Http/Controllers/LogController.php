<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogController extends Controller
{
    public function Info($request){
        $metodo = $request->method(); // Método de la solicitud (GET, POST, etc.)
        $ruta = $request->path(); // Ruta de la solicitud
        $headers = $request->headers->all(); // Encabezados de la solicitud
        $queryParameters = $request->query(); // Parámetros de la consulta (query parameters)
        $input = $request->except(['_token', '_method']); // Todos los datos excepto el cuerpo
      /* log::info($metodo.' '.$ruta.' '.$headers['php-auth-user'][0]);*/
        log::info('REQUEST: '.$metodo.' '.$ruta);


    }

    public function Response($response){
    /* log::info($metodo.' '.$ruta.' '.$headers['php-auth-user'][0]);*/
      log::info('RESPONSE: '.$response);


  }


    public function Error($th){
      log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());


    }
}
