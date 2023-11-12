<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ResponseController extends Controller
{
    //

    public function PreparaResponse($error){
        $response= response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        log::info('RESPONSE: '.$response);
        return $response;
    }   
}
