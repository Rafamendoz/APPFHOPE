<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponseController;


class RutasController extends Controller
{

    protected $responseController;


    public function __construct(ResponseController $responseController) {
        $this->responseController = $responseController;
    }

    public function makeTableRoutes(Request $request){
        try {
         
            $routeCollection = Route::getRoutes();
            $cont =1;
            DB::select('CALL EliminarRutas()');
            foreach ($routeCollection as $route) {
                if(is_null( $route->getName())){
                    $uri = $route->uri();
                }else{
                    $uri = $route->getName();
                }
            

                $methods = $route->methods(); // Obtiene los métodos HTTP asociados a la ruta
                $methodString = implode(", ", $methods); // Convierte el array de métodos en una cadena separada por comas

                DB::select('CALL InsertarRutas(?,?,?)', array($uri,$cont,$methodString));
                $cont = $cont+1;
            }

            log::info("REQUEST: ".$request);
            $response = $this->responseController->responseAfterSave();
            Log::info("RESPONSE: ".$response);
            return $response; 


        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
  

    }
}
