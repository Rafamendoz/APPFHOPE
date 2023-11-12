<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\Estado;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ExceptionController;



class BancoController extends Controller
{


    public function addBanco(Request $request){
        try {
            $estados = Estado::all();
            $vista = view("addbanco", compact('estados'));
            return $vista;
        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);

           
        }
     
        
    }



    public function getBancos(){
        try {
         
            $bancos = DB::select('CALL Obtener_bancos_vista(?)',array("ACTIVO"));
            return view('bancos', compact('bancos'));
        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);

        }
      
    }


    public function setBanco(Request $request){
        try {
            app(LogController::class)->Request($request);
            $banco = Banco::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            app(LogController::class)->Response($response);
            return $response;  
        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);

       
        }
      }

    public function getBancosRest(Request $request){
        try {
            app(LogController::class)->Request($request);
            $bancos = Banco::all();
            if(sizeof($bancos)<1){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                app(LogController::class)->Response($response);
                return $response;
            }else{
                $response =  response()->json([
                    "Bancos"=>$bancos, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                app(LogController::class)->Response($response);
                return $response;  
    
            }
        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);

        }
        
       
       
    }

    public function getBancoRestById(Request $request,$id){
        try {
            app(LogController::class)->Request($request);

            $banco = Banco::find($id);
            if(is_null($banco)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No se encontraron registros"]], 202);
                app(LogController::class)->Response($response);
                return $response;
            }else{
                $response =  response()->json([
                    "Bancos"=>$banco, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                app(LogController::class)->Response($response);
                return $response;

            }
        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);

        }
    

    }

    public function putBanco(Request $request, $id){
        try {
            app(LogController::class)->Request($request);
        
            $banco = Banco::find($id);
            if(is_null($banco)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                app(LogController::class)->Response($response);
                return $response;

            }else{
                $banco->update($request->all());
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Modificado"]], 200);
                app(LogController::class)->Response($response);
                return $response;
            }

        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);
        }
    }
    
    public function deleteBanco(Request $request, $id){
        try {
            app(LogController::class)->Request($request);
            $banco = Banco::find($id);
            if(is_null($banco)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede eliminar"]], 202);
                app(LogController::class)->Response($response);
                return $response;

            }else{
                switch($request->estado){
                    case 1:
                        $banco->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        app(LogController::class)->Response($response);
                        return $response;
                        break;
                    case 2:
                        $banco->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Desactivado"]], 200);
                        app(LogController::class)->Response($response);
                        return $response;
                        break;
                    default:
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"El valor ingresado no es permitido, para el tipo de campo"]], 202);
                        app(LogController::class)->Response($response);
                        return $response;
                        break;



                }
            }
        } catch (\Throwable $th) {
            return app(ExceptionController::class)->GenerarException($th);
        
        }
 
       
    }
}
