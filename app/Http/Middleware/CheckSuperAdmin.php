<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckSuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->SuperAdmin) {
            $currentRouteName = Route::currentRouteName();
            if ($currentRouteName !== 'profile' && $currentRouteName !== 'logout') {
                return redirect()->route('profile', ['id' => Auth::id()]);
            }
        }

        return $next($request);
    }
}
