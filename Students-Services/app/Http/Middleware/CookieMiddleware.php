<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateSession
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
        // Verifier si l'utilisateur est connecté 
        if (!$request->session()->has('user_id')) {
            return redirect('/login'); 
        }

        return $next($request);
    }
}
