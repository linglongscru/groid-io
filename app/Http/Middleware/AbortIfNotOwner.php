<?php

namespace Groid\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
class AbortIfNotOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string    $resourceName
     * @return mixed
     */
    public function handle($request, Closure $next, $resourceName)
    {
        $resourceId = $request->route()->parameter($resourceName);

        $userId = DB::table($resourceName)->find($resourceId)->user_id;

        if ($request->user()->id != $userId) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}