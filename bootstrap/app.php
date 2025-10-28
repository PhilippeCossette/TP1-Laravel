<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([
            \Illuminate\Session\Middleware\StartSession::class, // ✅ session must be first

            \App\Http\Middleware\SetLocale::class, // ✅ add this

            // Keep existing web middleware here...
        ]);

        $middleware->api([
            // api middlewares (unchanged)
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
