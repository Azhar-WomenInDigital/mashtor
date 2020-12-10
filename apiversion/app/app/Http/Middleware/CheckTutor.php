<?php

namespace App\Http\Middleware;

use Closure;

class CheckTutor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if (! $request->user()->user_type($role)) {
            return "r";
        }

        return $next($request);
    }
}
