<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Auth\RequestGuard;
use Illuminate\Support\Facades\Auth;



class AuthenticateOnceWithBasicAuthByUsername
{
    /**
     * Handle an incoming request.
        *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       
        return Auth::onceBasic('user') ?: $next($request);

    }


    



}