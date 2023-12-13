<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class ContentSecurityPolicy
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Content-Security-Policy', '[policy]');
        return $response;
    }
}



