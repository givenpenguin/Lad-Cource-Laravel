<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValueController;
use App\Http\Middleware\CheckValue;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('home')
    ->middleware(EnsureTokenIsValid::class);

Route::prefix('user')
    ->group(function () {
        Route::middleware(CheckValue::class)->group(function () {
            Route::get('/{value}', ValueController::class)
                ->name('info.value')
                ->whereNumber('value');
            Route::get('/{name}/{role}/{id?}', UserController::class)
                ->name('user.show')
                ->withoutMiddleware(CheckValue::class)
                ->middleware(IsAdmin::class);
            Route::get('/{test}', TestController::class)
                ->name('test')
                ->whereAlpha('test')
                ->middleware(TestMiddleware::class);
        });
        Route::get('/{name}/{role}', UserController::class)
            ->name('user.show')
            ->whereIn('name', ['Alex', 'Bob', 'Clever'])
            ->middleware(IsAdmin::class);
    });


Route::get('/info', [InfoController::class, 'index']);
Route::post('/info', [InfoController::class, 'index']);
Route::put('/info', [InfoController::class, 'index']);
Route::patch('/info', [InfoController::class, 'index']);
Route::delete('/info', [InfoController::class, 'index']);
Route::options('/info', [InfoController::class, 'index']);

Route::match(['get', 'post'], '/info', function (){
    dd('info');
});

//Route::redirect('/user', '/owner'); //302
//Route::Permanentredirect('/user', '/owner'); //301
