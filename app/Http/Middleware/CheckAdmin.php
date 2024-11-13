<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // If user is admin and tries to access a user route, redirect to admin dashboard
        if ($user->role_id == 1) {
            return redirect('/admin');
        }

        // If user is not admin and tries to access admin routes, redirect to user dashboard
        if ($user->role ==  2) {
            return redirect('/user');
        }

        if ($user->role_id == 3) {
            return redirect('/user');
        }

        return $next($request);
    }
}
