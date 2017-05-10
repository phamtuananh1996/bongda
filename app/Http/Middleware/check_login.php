<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class check_login
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
        if(Auth::check())
        {
            view()->share('user_login', Auth::user());
            return $next($request);
        }
        else
        {
            return redirect('login');
        }
    }
}
