<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       
        if( Auth::onceBasic()){
            return response()->json(['Codigo'=>401, 'Estado'=>'No Autorizado', 'Descripcion'=>'Acceso No Autorizado'],401);

            
        }else{
            if(Auth::user()->email=="QA@fhope.online"){

                return $next($request);

            }else{
                return response()->json(['Codigo'=>401, 'Estado'=>'No Autorizado', 'Descripcion'=>'El usuario ingresado no tiene permisos'],401);

            }
        }
       
        
    }
}
