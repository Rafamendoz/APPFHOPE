<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Error;
use Illuminate\Support\Facades\Log;


class AuthenticateOnceWithBasicAuthByUsernameWeb
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

            Log::info($request);
            // El usuario ha sido autenticado exitosamente
            $vistaPeticion = $request->destination;
            $tipoPeticion =strtoupper($request->value);
            $vistaEncontrada =false;
            $profiles = DB::select("call ObtenerPerfilesPorUsuario(?)", array(auth()->user()->user));
            if(is_null($profiles) || sizeof($profiles)<=0){
                return response()->json(["Message"=>"No hay perfiles autorizados para realizar la accion"],401);

            }else{
                foreach ($profiles as $value) {
                    $vistas = DB::select("call ObtenerVistaPorProfile(?)", array($value->name_profile));
                    foreach ($vistas as $vista) {
                        if ($vista->view_name === $vistaPeticion) {
                            $vistaEncontrada = true;
                            break;
                        }
                    }

                    if ($vistaEncontrada) {
                        $permission = DB::select("call ObtenerPermisosPorVistaPorProfile(?,?)", array($value->name_profile,$vistaPeticion));
                        /*$permissionTrs = $permission->permissions;*/
                       /* return response()->json(['permmis'=>$permission]);*/
                        $valores = explode("|", $permission[0]->permissions);
                         if(in_array($tipoPeticion, $valores)){
                              return $next($request);
                         }else{
                            return response()->json(["Message"=>"No hay privilegios/permisos suficientes para realizar la accion"],401);


                         }

                    }else{
                        return response()->json(["Message"=>"Record Destino No Autorizado "],401);

                    }
                }
            }
           
  
    
  
    }
}
