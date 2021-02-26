<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsActive
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
        if (Auth::user()->active_account == false) {
            return redirect()->route('home')->with('error','Opps! Your Account is disabled, kindly contact the support for help');
        }

        return $next($request);
    }
}
