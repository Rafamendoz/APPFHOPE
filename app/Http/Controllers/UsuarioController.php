<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estado;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\ModelHasRoles;


class UsuarioController extends Controller
{

    

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

    public function getUsuarioRestById(Request $request, $id){
        try {
            log::info('REQUEST '.$request);
            $usuario = User::find($id);
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

    public function getUsuarioRestByUsuario(Request $request, $id){
        try {
            log::info('REQUEST '.$request);
            $usuario = User::where('user',$id)->get();
            if(sizeof($usuario)<1){
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


    public function setUsuario(Request $request){
        try {
            Log::info("REQUEST: ".$request);
            $contra =   Hash::make($request->password);
            $apiToken = Crypt::encrypt(base64_encode($request->email.":".$request->password));
            $request->merge(['ApiToken'=>$apiToken, 'password'=>$contra]);
            $usuario = User::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (Throwable $th) {
            log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
        

    }

    public function putUsuario(Request $request, $id){
        try {
            Log::info("REQUEST: ".$request);
            $usuario = User::find($id);
            if(is_null($usuario)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $contra =   Hash::make($request->password);
                $apikey = $request->email.":".$request->password;
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


   




    public function deleteUsuario(Request $request,$id){
        try {
            Log::info("REQUEST: ".$request);
            $user = User::find($id);
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

 


  

   
}
