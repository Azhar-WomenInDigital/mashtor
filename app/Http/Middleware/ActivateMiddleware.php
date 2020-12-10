<?php

namespace App\Http\Middleware;

use Closure;

class ActivateMiddleware
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
        if ($request->user() && $request->user()->activate_status != 1)
        {
            return new Response(view(‘unauthorized’)->with(‘role’, ‘ADMIN’));
        }

        return $next($request);
    }
}
