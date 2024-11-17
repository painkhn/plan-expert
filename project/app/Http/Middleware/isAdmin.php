<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() and  Auth::user()->isAdmin == 1) {
            return $next($request);
        }

        return redirect()->back();
    }
}
