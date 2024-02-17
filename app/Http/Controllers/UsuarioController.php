<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estado;
use App\Http\Controllers\ServiceGatewayController;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\ModelHasRoles;


class UsuarioController extends Controller
{

    

    public function getUsuarioUpdate(Request $request){
        try {
            $estados = Estado::all();
            $data = $this->getUsuarioRestByUsuario($request);

            return view('updateusuario', compact('data','estados'));


        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
       
   }



    public function getUsuarioAll(){
        try {
            $data = DB::select('CALL Obtener_usuarios_vista_all()');
            return view('usuarios', compact('data'));


        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
       
   }
    public function getUsuario(){
        try {
            $data = DB::select('CALL Obtener_usuarios_vista(?)', array('ACTIVO'));
            return view('usuarios', compact('data'));


        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
       
   }

   public function addUsuario(){
    $estados = Estado::all();
    return view('addusuario', compact('estados'));
   

}



   public function getUsuarioRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $usuarios = User::all();
            if(sizeof($usuarios)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Usuarios"=>$usuarios, "Data_Respuesta"=>[
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


    public function setUsuariosMasivosRest(Request $request){
        set_time_limit(120);

        app(LogController::class)->Info($request);

     
        try {

            $items = $request->all();
            $count=0;
            foreach ($items as $key) {
                $contra =   Hash::make($key['password']);
                $apiToken = base64_encode($key['user'].":".$key['password']);
                $key['ApiToken'] = $apiToken;
                $key['password'] = $contra;
                User::create($key);
                $count++;
    

            }

           

            if($count==sizeof($items)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registros Agregados"]], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
       

          
        } catch (\Throwable $th) {
            log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__, $th->getCode());
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            $response= response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            log::info('RESPONSE: '.$response);
            return $response;
        }

    }

    public function getUsuarioRestById(Request $request){
        try {
            log::info('REQUEST '.$request);
            $usuario = User::find($request->user_id);
            if(is_null($usuario)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Usuario"=>$usuario, "Data_Respuesta"=>[
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

    public function getUsuarioRestByUsuario(Request $request){
        try {
            log::info('REQUEST '.$request);
            
            $usuario = User::where('user',$request->username)->get();
            $profiles = DB::select('call ObtenerPerfilesPorUsuario(?)',array($request->username));

            if(sizeof($usuario)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                
                $response =  response()->json([
                    "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"],"Usuario"=>$usuario,"Profiles"=>$profiles
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


    public function setUsuario(Request $request){
        try {
            Log::info("REQUEST: ".$request);
            $contra =   Hash::make($request->password);
            $apiToken = Crypt::encrypt(base64_encode($request->user.":".$request->password));
            $request->merge(['ApiToken'=>$apiToken, 'password'=>$contra]);
            $usuario = User::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (Throwable $th) {
          log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__);
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            $response= response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            log::info('RESPONSE: '.$response);
            return $response;
        }
        

    }

    public function putUsuario(Request $request){
        try {
            $iduser = DB::select('select id from users u where u.user=?', array($request->user));
            $id =$iduser[0]->id;

            Log::info("REQUEST: ".$request." id user".$id);

            $usuario = User::find($id);
            if(is_null($usuario)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $contra =   Hash::make($request->password);
                $apikey = $request->user.":".$request->password;
                $baseapi = base64_encode($apikey);
                $ApiToken =  Crypt::encrypt($baseapi);
                $data['ApiToken']= $ApiToken;
                $request->merge(['password'=>$contra]); 
                $request->merge($data);
                $valore = $request->ApiToken;
                $usuario->update($request->all());
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Modificado"]], 200);
                Log::info("RESPONSE: ".$response);
                return $response;
            }

        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
    

    }


   




    public function deleteUsuario(Request $request){
        try {
            $iduser = DB::select('select id from user u where u.user=?', array($request->user));
            Log::info("REQUEST: ".$request);
            $user = User::find($iduser);
            if(is_null($user)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede eliminar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                switch($request->estado){
                    case 1:
                        $user->update(['estado'=>$request->estado]);
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    case 2:
                        $user->update(['estado'=>$request->estado]);
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Desactivado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    default:
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"El valor ingresado no es permitido, para el tipo de campo"]], 202);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;



                }
            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
       
    

    }


    public function setAssingRoleUserRest(Request $request, $id){
        try {
            Log::info("REQUEST: ".$request);
            $user = User::find($id);
            if(is_null($user)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede asignar un rol"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $rol = $request->name_rol;
                $user->assignRole($rol);
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Role Asignado"]], 200);
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
