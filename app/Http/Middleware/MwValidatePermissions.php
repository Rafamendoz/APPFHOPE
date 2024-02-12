<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Error;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Log;


class MwValidatePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $authorizationHeader = $request->header('Authorization');
        if ($authorizationHeader && preg_match('/Basic\s+(.*)$/i', $authorizationHeader, $matches)) {
            // Decodificar el valor de la cabecera Authorization (se espera que esté en formato Base64)
            $decoded = base64_decode($matches[1]);
            
            // Separar el usuario y la contraseña del valor decodificado (formato: usuario:contraseña)
            list($usuario, $contraseña) = explode(':', $decoded);
            $credentials = ['user'=>$usuario, 'password'=>$contraseña];
            Log::info("CREDS   USER".$usuario." ".$credentials['password']);
            if (Auth::attempt($credentials)) {
                // El usuario ha sido autenticado exitosamente
               
                $tipoPeticion = strtoupper($request->application_type);
                $segmentos = $request->segments();
                $posicionApi = array_search('api', $segmentos);

                if ($posicionApi !== false && isset($segmentos[$posicionApi + 1])) {
                    // Obtener el siguiente segmento después de 'api'
                    $siguienteParametro = $segmentos[$posicionApi + 1];
                    $path = "api/".$siguienteParametro;
                    // $siguienteParametro contendrá 'clientes'
                }

                // Buscar la posición del segmento 'api'

                Log::info("PATH ".$path);

                $vistaEncontrada =false;
                $profiles = DB::select("call ObtenerPerfilesPorUsuario(?)", array($usuario));
                if(is_null($profiles) || sizeof($profiles)<=0){
                    return response()->json(["Message"=>"No hay perfiles autorizados para realizar la accion"],401);

                }else{
                    foreach ($profiles as $value) {
                        $vistas = DB::select("call ObtenerVistaPorProfile(?)", array($value->name_profile));
                        foreach ($vistas as $vista) {
                            if ($vista->view_name === $path) {
                                $vistaEncontrada = true;
                                break;
                            }
                        }
    
                        if ($vistaEncontrada) {
                            $permission = DB::select("call ObtenerPermisosPorVistaPorProfile(?,?)", array($value->name_profile,$path));
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
               
      
            } else {
                return response()->json(["Message"=>"CREDENCIALES DE PERFIL INVALIDAS"],401);
            }
            
            // Puedes hacer lo que necesites con el usuario y la contraseña aquí
            
          
            // Pasar la solicitud al siguiente middleware en la cadena
          
        }else{
            return response()->json(["Message"=>"CREDENCIALES DE PERFIL INVALIDAS"],401);

        }
        



    }
}
