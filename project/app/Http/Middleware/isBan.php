<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class isBan
{
    public function handle($request, Closure $next) {
        if (Auth::user() &&  Auth::user()->isBan == 0) {
            return $next($request);
        }
        elseif (!Auth::check()) {
            return $next($request);
        }
        else{
            $response = response()->view('banned');
            // $response->withCookie(cookie('name', 'value', 60));
            return $response;
        }
    }
}
