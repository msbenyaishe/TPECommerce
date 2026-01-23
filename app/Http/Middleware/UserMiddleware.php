<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Not logged in
        if (!$user) {
            return redirect()->route('login');
        }

        // Not normal user
        if ($user->role !== 'user') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
