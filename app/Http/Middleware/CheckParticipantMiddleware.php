<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckParticipantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if((Auth::user()->role == "VENDOR")||(Auth::user()->role == "STUDENT"))
	   {
		  return $next($request); 
	   }
	   else
	   {
		   abort(403, 'Unauthorized.');
	   }

    }
}
