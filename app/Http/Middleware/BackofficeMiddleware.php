<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackofficeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        

    return $next($request);
       
        if (in_array(Auth::user()->role_id, [1,2,3]) )
        {
            return redirect('/')->with("vous n'avez pas l'accès");
        }
        return $next($request);
       
        
    }
}
