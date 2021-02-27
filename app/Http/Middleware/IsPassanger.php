<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPassanger
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
        if (!Auth::user()->inRole(['administrator','passanger'])) {
            // return redirect()->route('home')->with('error','Unauthorized Action');
            abort(404);
        }

        return $next($request);
    }
}
