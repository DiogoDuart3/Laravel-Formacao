<?php

namespace App\Http\Middleware;

use App\models\Post;
use Closure;

class posts
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (count(Post::get()) >= 2)
            return $next($request);
        else
            return response(['error' => 'Not authorized'], 403);
    }
}
