<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if (
            (method_exists($user, 'hasRole') && $user->hasRole('admin')) ||
            ($user->role === 'admin')
        ) {
            return $next($request);
        }

        abort(403, 'Unauthorized Access');
    }
}