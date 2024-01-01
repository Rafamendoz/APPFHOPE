<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Crypt;

class CredencialesConsumoController extends Controller
{
    public function GetCredencialesConsumo(Request $request){
        try {
            $decrypted = Crypt::decrypt(Auth()->user()->ApiToken);
            return response()->json(["Token"=>$decrypted]);

        } catch (DecryptException  $e) {
            return response()->json(['error' => 'Error al descifrar los datos'], 500);
        }

       
   ;


    }
}
