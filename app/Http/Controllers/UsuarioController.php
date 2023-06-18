<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\ModelHasRoles;


class UsuarioController extends Controller
{
    public function getUsuario(){
        $data = User::all()->where('estado',1);
        if(sizeof($data)===0){
            $data=array();
            return view('usuarios', compact('data'));
        }else{
            return view('usuarios', compact('data'));
        }
    
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
                "Usuarios"=>$usuarios, "Response"=>[
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
                    "Usuario"=>$usuario, "Response"=>[
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
                    "Usuario"=>$usuario, "Response"=>[
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
            log::info("REQUEST: ".$request);
            $contra =   Hash::make($request->password);
            $apiToken = Crypt::encrypt(base64_encode($request->email.":".$request->password));
            $usuario = User::insert(['email'=>$request->email,'ApiToken'=>$apiToken,'password'=>$contra,'user'=>$request->user,'intentos'=>$request->intentos,'estado'=>$request->estado]);
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
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
                $response = response()->json([$valore,$usuario,"Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Modificado"]], 200);
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
        $usuario = User::find($id);
        if(is_null($usuario)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);
        }else{
            if($request->estado===1){
                $usuario->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
            }else{
                $usuario->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
            }
           
        }
    

    }

    public function logginUsuario(Request $request){
        $usuario = User::where('user',$request->user)->get();
        if($usuario[0]->user === $request->user &&  $usuario[0]->password=== $request->password){
            return response()->json(["Valor"=>"1","Estado"=>"Exito"], 202);
        }else{
            return response()->json(["Valor"=>"0","Estado"=>"Fallo"], 202);
        }
    }



  

   
}
