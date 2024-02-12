<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use App\Models\UserHasProfiles;
use Illuminate\Support\Facades\DB;


class UserHasProfilesController extends Controller
{
    public function AssignProfileToUser(Request $request){
        try {
            Log::info("REQUEST: ".$request);
            $user = $request->user;
            $profile = $request->profile;
            $user_profile =DB::select('call AsignarPerfilAUsuario(?,?)',array($user,$profile));
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }



    }



    public function getProfileFromUser(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $user = $request->user;
            $profiles = DB::select('call ObtenerPerfilesPorUsuario(?)',array($user));
            if(is_null($profiles)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Profiles"=>$profiles, "Response"=>[
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

}
