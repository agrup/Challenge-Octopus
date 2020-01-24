<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        if ($request->user() ===null | $request->user()->hasAnyRole($roles)){
            
            return $next($request);
        }
        return redirect('/');
        
    }
}
