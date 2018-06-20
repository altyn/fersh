<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::user() &&  Auth::user()->isAdmin == 1) {
            return $next($request);
        }

        if(Auth::user() &&  Auth::user()->isAdmin == 0) {
            return redirect(app()->getLocale().'/profile/info');
        }
    }
}
