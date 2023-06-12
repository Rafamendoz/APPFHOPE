<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;

class CuentaController extends Controller


{

    public function addTipoCuenta(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $estados = Estado::all();
            $vista = view("addtipocuenta", compact('estados'));
            log::info("RESPONSE: VISTA addmoneda devuelta");
            return $vista;
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
     
        
    }


    public function getTipoCuentas(){
        try {
            $id = "Activo";
            $tipocuentas =DB::select('CALL Obtener_tipo_cuenta_vista(?)', array($id));
            return view('tipocuentas', compact('tipocuentas'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function setCuenta(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $cuenta = Cuenta::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  


        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
    }
    

    public function getCuentasRest(){
        $cuentas = Cuenta::all();
        return response()->json(["Cuentas"=>$cuentas,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registros Encontrados"], 202);

    }

    public function getCuentaRestById($id){
        $cuenta = Cuenta::where('id',$id)->get();
        if(is_null($cuenta) || sizeof($cuenta) ===0 ){
            return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"404","Estado"=>"No Encontrado", "Descripcion:"=>"Registro No Encontrado"], 404);
        }else{
            return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Encontrado"], 202);

        }

    }

    public function putCuenta(Request $request, $id){
        $cuenta = Cuenta::find($id);
        $cuenta->update($request->all());
        return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Modificado"], 202);
    }


    public function deleteCuenta(Request $request, $id){
        $cuenta = Cuenta::find($id);
        $cuenta->update($request->all());
        return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Activado"], 202);
    }

}
