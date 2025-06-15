<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        // Check if the  user is not authenticated
        if (!Auth::check()) {
            // Redirect to the login page
                return redirect('/login');
           
        }

        return $next($request);
    }
}