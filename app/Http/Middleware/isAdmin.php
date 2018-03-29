<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::User()){
            if ($request->user()->hasrole('admin')) {
                return $next($request);
            } else
            return redirect('/');
      } else
          return redirect('/login');
    }
}
