<?php

namespace Groid\Http\Middleware;

use Closure;

class Activation
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
        $response = $next($request);
        if ($request->user()->active == false) {
            return redirect('/activate/please');
        }
        return $response;
    }

}
