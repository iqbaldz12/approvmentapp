<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Asumsikan kamu memiliki route 'login' atau 'home' untuk mengalihkan pengguna non-admin
            return redirect('login')->with('error', 'You do not have access to this section.');
        }

        return $next($request);
    }
}
