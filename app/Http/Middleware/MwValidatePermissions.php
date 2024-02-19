<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Error;
use App\Http\Controllers\ResponseController;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Log;


class MwValidatePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



     protected $responseController;

     public function __construct(ResponseController $responseController) {
         $this->responseController = $responseController;
     }

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
               
                if(isset($request->application_type) && $request->application_type !=""){
                    $tipoPeticion = strtoupper($request->application_type);
                    $path_temp = $request->path();
                

                    // Buscar la posición del segmento 'api'
    
                    Log::info("PATH ".$path_temp);
    
    
                    $vistaEncontrada =false;
                    $profiles = DB::select("call ObtenerPerfilesPorUsuario(?)", array($usuario));
                    if(is_null($profiles) || sizeof($profiles)<=0){
                        $response = $this->responseController->responseAfterHttpCodeNot500("HTTP-401-02",__METHOD__);
                        Log::info("RESPONSE: ".$response);
                        return $response;   
                    }else{
                        foreach ($profiles as $value) {
                            $vistas = DB::select("call ObtenerVistaPorProfile(?)", array($value->name_profile));
                            foreach ($vistas as $vista) {
                                if ($vista->view_name === $path_temp) {
                                    $vistaEncontrada = true;
                                    break;
                                }
                            }
        
                            if ($vistaEncontrada) {
                                $permission = DB::select("call ObtenerPermisosPorVistaPorProfile(?,?)", array($value->name_profile,$path_temp));
                                /*$permissionTrs = $permission->permissions;*/
                               /* return response()->json(['permmis'=>$permission]);*/
                               $parametrosAuth = array('R','W','U','E','D');
                               if(in_array($tipoPeticion, $parametrosAuth) ){
                                    $valores = explode("|", $permission[0]->permissions);
                                    Log::info($valores);
                                    if(!is_null($valores) && !is_null($tipoPeticion) ){
                                        if(in_array($tipoPeticion, $valores) ){
                                            return $next($request);
                                        }else{
                                            $response = $this->responseController->responseAfterHttpCodeNot500("HTTP-401-03",__METHOD__);
                                            Log::info("RESPONSE: ".$response);
                                            return $response;   
                
                
                                        }
                                    }else{
                                        $response = $this->responseController->responseAfterHttpCodeNot500("HTTP-401-04",__METHOD__);
                                        Log::info("RESPONSE: ".$response);
                                        return $response;
        
                                    }
                              
                                }else{
                                    $response = $this->responseController->responseAfterHttpCodeNot500("400",__METHOD__);
                                    Log::info("RESPONSE: ".$response);
                                    return $response; 

                                }

                               
        
                            }else{
                                $response = $this->responseController->responseAfterHttpCodeNot500("HTTP-401-01",__METHOD__);
                                Log::info("RESPONSE: ".$response);
                                return $response;    
                            }
                        }
                    }
                   

                }else{
                    $response = $this->responseController->responseAfterHttpCodeNot500("400",__METHOD__);
                    Log::info("RESPONSE: ".$response);
                    return $response; 
                }
               
      
            } else {
                $response = $this->responseController->responseAfterHttpCodeNot500("HTTP-401-05",__METHOD__);
                Log::info("RESPONSE: ".$response);
                return $response;  
            }
            
            // Puedes hacer lo que necesites con el usuario y la contraseña aquí
            
          
            // Pasar la solicitud al siguiente middleware en la cadena
          
        }else{
            return response()->json(["Message"=>"CREDENCIALES DE PERFIL INVALIDAS"],401);

        }
        



    }
}
