<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Manejar una solicitud entrante.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ✅ Aquí usamos 'role' en lugar de 'rol'
        if (Auth::user()->role !== $role) {
            return redirect()->route('acceso.denegado');
        }

        return $next($request);
    }
}
