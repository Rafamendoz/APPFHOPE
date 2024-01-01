<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServiceGatewayController;

use App\Models\Error;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)

    {   

        $authorizationHeader = $request->header('Authorization');
        if( is_null($authorizationHeader) ){
            log::warning($request." ACCESO NO AUTORIZADO");
            $data = app(ServiceGatewayController::class)->Enrutar(101, "UNAUTHORIZED", __METHOD__, 401);
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            return response()->json(["Mapping_Error"=>$error],401);
        }else{

        
        

        if(Auth::onceBasic()){
            log::warning($request." ACCESO NO AUTORIZADO");
            return response()->json(['Codigo'=>401, 'Estado'=>'No Autorizado', 'Descripcion'=>'Acceso No Autorizado'],401);
        }else{
            if(Auth::user()->email!=="QA@fhope.online"){
             
                return $next($request);

            }else{
                log::warning($request."USUARIO NO INGRESADO NO TIENE PERMISOS");
                return response()->json(['Codigo'=>401, 'Estado'=>'No Autorizado', 'Descripcion'=>'El usuario ingresado no tiene permisos'],401);

            }

        }
        }
    }
}
