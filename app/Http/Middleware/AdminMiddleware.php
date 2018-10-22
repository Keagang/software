<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        
        if(Auth::user()==null)
        {
            return redirect('/');
        }
        if(Auth::user()->email=='admin@admin.com')
        {
        return $next($request); 
        }
        else
        {
            return redirect('/');
        }
    }
}
