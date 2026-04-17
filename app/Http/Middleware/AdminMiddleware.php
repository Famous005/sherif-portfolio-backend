<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // All authenticated users are admins in this single-user portfolio.
        // Extend this if you add role columns to the users table later.
        return $next($request);
    }
}
