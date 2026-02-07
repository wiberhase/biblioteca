<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// 1. IMPORTA TU MIDDLEWARE AQUÍ:
use App\Http\Middleware\PreventBackHistory; // <--- NUEVO

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 2. AGRÉGALO AL GRUPO 'WEB' AQUÍ:
        $middleware->appendToGroup('web', PreventBackHistory::class); // <--- NUEVO

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();