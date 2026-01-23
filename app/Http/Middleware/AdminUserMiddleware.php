<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminUserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Not logged in
        if (!$user) {
            return redirect()->route('login');
        }

        // Not admin
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
