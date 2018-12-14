<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class user_valid
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

        if(Auth::user()->is_activate == 0){
            return redirect()->route('activate');
        }

        return $next($request);
    }
}
