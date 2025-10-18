<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckDatabaseConnection
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('check-db')) {
            return $next($request);
        }

        try {
            DB::connection()->getPdo();
        } catch (\Throwable $e) {
            return response()->view('errors.conexion', [], 500);
        }

        return $next($request);
    }
}
