<?php

// app/Http/Middleware/CheckRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role !== $role) {
            // Redirect if the user's role does not match the required role
            return redirect('/unauthorized');
        }
        return $next($request);
    }
}
