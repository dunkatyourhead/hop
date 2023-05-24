<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Verified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('web')->user()->status_verifikasi == 2){
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('fail', 'This account was not verified yet. Please verifiy your account first');
        }
        return $next($request);
    }
}
