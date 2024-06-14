<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (Auth::check()) //login
        {
                // if(Auth::user()->role == $role)
                // if(Auth::user()->hasRole('admin') == $role)
            if('admin' == $role)//role  
            {
                # code...
                return $next($request);
            }
        
            abort(403);
        }
        abort(401);
    }
}


