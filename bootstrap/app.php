<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Captura errores de conexión a la base de datos (MySQL u otros)
        $exceptions->render(function (QueryException $e) {
            if (str_contains($e->getMessage(), 'SQLSTATE[HY000] [2002]')) {
                Log::error('Error de conexión a la base de datos: ' . $e->getMessage());
                return response()->view('errors.conexion', [], 500);
            }
        });

        // Puedes capturar otros errores aquí si deseas
    })
    ->create();
