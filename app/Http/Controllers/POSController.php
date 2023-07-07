<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Models\Venta;
use App\Models\Color;
use App\Models\Size;


class POSController extends Controller
{
    public function getPOS(){
        try {
         
            $id = Venta::latest('id')->first();
            if(empty($id)){
                $numero_orden = $id+1;
            }else{
                $numero_orden = $id->id+1;
            }

            $colors = Color::where('estado',1)->get();
            $sizes = Size::where('estado',1)->get();

            return view('pos', compact('numero_orden','colors', 'sizes'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }
}
