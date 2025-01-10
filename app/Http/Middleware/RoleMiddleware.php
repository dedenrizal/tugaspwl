<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {

        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        return redirect('/');
    }
}
