<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectGuests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
    // If the user is not authenticated, redirect them to the login page
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

        // Proceed with the request if authenticated
        return $next($request);
    }
}
