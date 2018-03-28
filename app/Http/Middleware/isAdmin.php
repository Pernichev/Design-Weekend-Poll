<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use App\Http\Requests;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->user()->authorizeRoles(['admin']);

        return $next($request);
    }
}
