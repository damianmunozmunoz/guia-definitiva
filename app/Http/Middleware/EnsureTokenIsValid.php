<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /*Tiene un método handle que captura la llamada y recibe 2 parámetros:
    - $request que son las variables enviadas por POST
    - $next permite continuar la ejecución
    */
    public function handle(Request $request, Closure $next): Response
    {
        /*if($request->input('token') !== 'my-secret-token'){
            return redirect('home');
        }*/
        return $next($request);
    }
}
