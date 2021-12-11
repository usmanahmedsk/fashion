<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

    class AdminAuthenticate
    {
        public function handle($request, Closure $next)
        {
            if (!Auth::guard('admin')->check()) {
                return redirect()->route('adminLogin');
            }
            return $next($request);
        }
    }
