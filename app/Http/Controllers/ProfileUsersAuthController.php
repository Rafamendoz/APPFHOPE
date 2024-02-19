<?php

namespace App\Http\Controllers;

use App\Models\ProfileUsersAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ResponseController;

class ProfileUsersAuthController extends Controller
{

    protected $responseController;


    public function __construct(ResponseController $responseController) {
        $this->responseController = $responseController;
    }

    public function saveAplicationAuth(Request $request){

        try {
            log::info("REQUEST: ".$request);
            $app = ProfileUsersAuth::create($request->all());
            $response = $this->responseController->responseAfterSave();
            Log::info("RESPONSE: ".$response);
            return $response; 
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }

        
    }


    public function saveAplicationAuthAdmin(Request $request){

        try {
            log::info("REQUEST: ".$request);
            $rutas =  DB::select('CALL ConsultarRutas()');

            foreach ($rutas as $key ) {
                if($key->route_name!='api/profileuserauthR/add/admin'){
                    switch ($key->method) {
                        case 'POST':
                            $app = ProfileUsersAuth::create(['id_profile'=>$request->id_profile, 'permissions'=>'W','view_name'=>$key->route_name]);
                            break;
                        
                        case 'GET, HEAD':
                            $app = ProfileUsersAuth::create(['id_profile'=>$request->id_profile, 'permissions'=>'R','view_name'=>$key->route_name]);
                            break;
                        
                        case 'PUT':
                            $app = ProfileUsersAuth::create(['id_profile'=>$request->id_profile, 'permissions'=>'U','view_name'=>$key->route_name]);
                            break;
                        
                        case 'DELETE':
                            $app = ProfileUsersAuth::create(['id_profile'=>$request->id_profile, 'permissions'=>'D','view_name'=>$key->route_name]);
                            break;
    
                        case 'PATCH':
                            $app = ProfileUsersAuth::create(['id_profile'=>$request->id_profile, 'permissions'=>'U','view_name'=>$key->route_name]);
                            break;   
                        
                        default:
                            # code...
                            break;
                    }
                }
                

            }
            $response = $this->responseController->responseAfterSave();
            Log::info("RESPONSE: ".$response);
            return $response; 
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }

        
    }

   

    public function updateAplicationAuth(Request $request){

        try {
            Log::info("REQUEST: ".$request);
            $profileApp = ProfileUsersAuth::find($request->id);
            if(is_null($profileApp)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $profileApp->update($request->all());
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
}
