<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        // Check if the request is a GET and user is not authenticated
        if ($request->isMethod('GET') && !Auth::check()) {
            // Exclude the login route and other public routes
            if (!in_array($request->path(), ['login', 'register', 'password/reset'])) {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}