<?php

namespace App\Http\Controllers;
use App\Models\CompraHeader;
use App\Models\Estado;
use App\Models\Moneda;
use App\Models\TipoCompra;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class CompraHeaderController extends Controller
{





    public function getSaveCompraHeader(){
        $monedas  = Moneda::all();
        $tipoCompra = TipoCompra::all();
        return view('addpurchase', compact('monedas','tipoCompra'));
    }

    public function getCompras(){
        $compras  = DB::select("call ObtenerCabeceraCompras(?)", array(1));
        return view('compras', compact('compras'));
    }

    
    public function getDetalleCompra(){
        $monedas  = Moneda::all();
        $tipoCompra = TipoCompra::all();
        return view('detalleCompraReport');
    }

    public function makeRollbackPurchase(Request $request){

    }






    public function makePurchaseHeader(Request $request){

        try {
            $compra = CompraHeader::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso","Descripcion"=>"Registro Creado" ]],200);
            return $response;
        } catch (\Throwable $th) {

            log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__, $th->getCode());
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            $response= response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            log::info('RESPONSE: '.$response);
            return $response;
       
        }

    }

    public function getCompraHeadersRest(Request $request){
        try {
            $comprasHeader = CompraHeader::where('estado',1)->get();
            $response = response()->json(["ComprasHeader"=>$comprasHeader,"Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso","Descripcion"=>"Registros Encontrados" ]],200);
            return $response;
        } catch (\Throwable $th) {
                    log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $data = app(ServiceGatewayController::class)->Enrutar(100, $th->getMessage(), __METHOD__, $th->getCode());
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            $response= response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            log::info('RESPONSE: '.$response);
            return $response;
       
        }

    }
}
