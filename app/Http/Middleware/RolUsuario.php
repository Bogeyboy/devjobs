<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd(auth()->user()->rol);
        if($request->user()->rol)
        {
            //Si no es el rol 2 se redireccionará al usuario hacia el home
            return redirect()->route('home');
        }
        return $next($request);
    }
}
