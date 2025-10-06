<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->admin == 1) {
            session(['isAdmin' => true]);
        } else {
            session(['isAdmin' => false]);
        }

        return $next($request);
    }
}
