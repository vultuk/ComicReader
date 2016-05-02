<?php namespace ComicApi\Http\Middleware\Api;

use Closure;

class V1
{
    public function handle($request, Closure $next, $guard = null)
    {
        return $next($request);
    }
}