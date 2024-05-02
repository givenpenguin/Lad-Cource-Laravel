<?php

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckValue;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'role:admin,user'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
//        $middleware->group('admin', [
//            EnsureTokenIsValid::class,
//            CheckValue::class,
//        ]);
//        $middleware->prependToGroup('web', 'admin');
//        $middleware->appendToGroup('web', EnsureTokenIsValid::class);
//
//        $middleware->web(remove: [StartSession::class]);

//        $middleware->alias([
//            'role' => CheckRole::class,
//            'token' => EnsureTokenIsValid::class,
//        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
