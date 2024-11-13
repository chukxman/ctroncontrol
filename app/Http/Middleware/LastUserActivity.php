<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LastUserActivity
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
        if (Auth::check()) {
            $ExpiresAt = Carbon::now()->addMinutes(1);
            Cache::put('online' . Auth::user()->id, true, $ExpiresAt);
            User::where('id', Auth::user()->id)->update(['lastseen' => (new \DateTime())->format("Y-m-d H-i-s")]);
        }
        return $next($request);
    }
}
