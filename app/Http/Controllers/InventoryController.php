<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Error;
use App\Models\Estado;
use App\Models\Size;
use App\Models\Color;
use App\Models\Producto;

use App\Models\Inventory;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ResponseController;


class InventoryController extends Controller
{

    protected $responseController;


    public function __construct(ResponseController $responseController) {
        $this->responseController = $responseController;
    }


     
    public function getInventoryByProductColorSizeRest(Request $request){
        try {
            log::info('REQUEST '.$request);
            $inventoryDisponible = DB::select('CALL Obtener_stock_disponible_by_size_product_color(?,?,?)', array($request->idproducto, $request->idcolor, $request->idsize));
            if(is_null($inventoryDisponible)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No hay inventario disponible"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "InventoryDisponible"=>$inventoryDisponible, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }


    }
    
    public function getSizesWithoutStockRest(Request $request){
        try {
            log::info('REQUEST '.$request);
            $sizes = DB::select('CALL Obtener_sizes_without_stock(?,?)', array($request->idproducto, $request->idcolor));
            if(is_null($sizes)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"El producto ya contiene todas las tallas en inventario"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Sizes"=>$sizes, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }


    }

    public function getSizesWithStockRest(Request $request){
        try {
            log::info('REQUEST '.$request);
            $sizes = DB::select('CALL Obtener_sizes_with_stock(?,?)', array($request->idproducto, $request->idcolor));
            if(is_null($sizes) || sizeof($sizes)<1){
                $response = $this->responseController->responseAfterHttpCodeNot500(404,__METHOD__);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Sizes"=>$sizes, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }


    }


    public function addInventory(Request $request, $id){
        try {
            log::info("REQUEST: ".$request);
            $colors = DB::select('CALL Obtener_colors_vista()');
            $producto = Producto::where('id',$id)->get();
            $vista = view("addinventory", compact('id','colors', 'producto'));
            log::info("RESPONSE: VISTA addinventory devuelta");
            return $vista;
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
     
        
    }



    public function getInventories(Request $request){
        try {
            $colors = DB::select('CALL Obtener_colors_vista()');
            $inventories = DB::select('CALL Obtener_inventories_vista(?)',array($request->id));
           $id = $request->id;

            return view('inventory', compact('inventories', 'id'));
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
      
    }


    public function setInventory(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $color = Inventory::create($request->all());
            $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
            Log::info("RESPONSE: ".$response);
            return $response;  
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
      }

    public function getInventoriesRest(Request $request){
        try {
            log::info("REQUEST: ".$request);
            $inventories = Inventory::all();
            if(sizeof($inventories)<1){
                $response = $this->responseController->responseAfterHttpCodeNot500(404,__METHOD__);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Inventories"=>$inventories, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;  
    
            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
        
       
       
    }

    public function getInventoryRestById(Request $request){
        try {
            log::info('REQUEST '.$request);
            $color = Inventory::find($request->id);
            if(is_null($color)){
                $response = $this->responseController->responseAfterHttpCodeNot500(404,__METHOD__);
                Log::info("RESPONSE: ".$response);
                return $response;
            }else{
                $response =  response()->json([
                    "Inventories"=>$color, "Data_Respuesta"=>[
                    "Codigo"=>"200",
                    "Estado"=>"Exitoso"]
                ], 200);
                Log::info("RESPONSE: ".$response);
                return $response;

            }
        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    

    }

    public function putInventory(Request $request, $id){
        try {
            Log::info("REQUEST: ".$request);
            $color = Inventory::find($id);
            if(is_null($color)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede actualizar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $color->update($request->all());
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Modificado"]], 200);
                Log::info("RESPONSE: ".$response);
                return $response;
            }

        } catch (\Throwable $th) {
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
    }
    
    public function deleteInventory(Request $request, $id){
        try {
            Log::info("REQUEST: ".$request);
            $color = Inventory::find($id);
            if(is_null($color)){
                $response = response()->json(["Data_Respuesta"=>["Codigo"=>"202","Estado"=>"Aceptado", "Descripcion"=>"No existe el registro, por lo tanto no se puede eliminar"]], 202);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                switch($request->estado){
                    case 1:
                        $color->update($request->all());
                        $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Activado"]], 200);
                        Log::info("RESPONSE: ".$response);
                        return $response;
                        break;
                    case 2:
                        $color->update($request->all());
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
            $response = $this->responseController->responseAfterError($th, __METHOD__);
            return $response;
        }
 
       
    }
}
