<?php

namespace App\Http\Middleware;

use Closure;

class age
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
        return response(['error' => 'Not authorized'], 403);
//        return $next($request);
    }
}
