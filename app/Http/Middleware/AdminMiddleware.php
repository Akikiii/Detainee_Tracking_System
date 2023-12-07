<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // Checks if the user is logged in
        if (auth()->check()) {
            // Checks if the user has the admin role (role === '1')
            if (auth()->user()->role) {
                // User has a role, allow access
                return $next($request);
            } else {
                // User is not an admin, redirect to dashboard
                return redirect('/dashboard');
            }            
        } else {
            // User is not logged in, redirect to login
            return redirect('/login');
        }
    }
}  
