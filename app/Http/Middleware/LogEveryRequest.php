<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogEveryRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        logs('incoming-referers')->info('User Agent: ' . $request->server('HTTP_USER_AGENT'));
        return $next($request);
    }
}
