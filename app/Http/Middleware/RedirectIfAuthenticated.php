<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        if (Auth::check()) {
            if(Auth::user()->role == 1){
                return redirect(RouteServiceProvider::HOME);
            }elseif(Auth::user()->role == 2){
                return redirect(RouteServiceProvider::CUSTOMER);
        }
    }
        return $next($request);
    }
}
