<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek jika pengguna sudah terautentikasi dan memiliki role yang sesuai
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // Jika tidak, beri response 403 atau redirect
        return abort(403, 'Unauthorized');
    }
}
