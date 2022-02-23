<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role_id === 1) {
            return $next($request);
        }
        if (Auth::user() && Auth::user()->role_id === 2) {
            return redirect()->route('user.countries.index');
        }
        return redirect()->route('login');
    }
}
