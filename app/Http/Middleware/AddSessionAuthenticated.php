<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Session;
use URL;

class AddSessionAuthenticated
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
        @session_start();

        $_SESSION['isLoggedIn'] = Auth::check();
        $_SESSION['url'] = URL::to('/');

        return $next($request);
    }
}
