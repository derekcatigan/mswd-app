<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if (!in_array($userRole, $roles)) {
            return match ($userRole) {
                'admin' => redirect()->route('dashboard.admin'),
                'employee' => redirect()->route('dashboard.employee'),
                default => abort(403, 'Unauthorized access.')
            };
        }
        return $next($request);
    }
}
