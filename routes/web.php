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

Route::view('/', 'welcome');

//Route::get('/', [IndexController::class, 'index'])
//    ->name('home')
//    ->middleware(EnsureTokenIsValid::class);

Route::prefix('user')
    ->group(function () {
        Route::middleware(CheckValue::class)->group(function () {
            Route::get('/{value}', ValueController::class)
                ->name('info.value')
                ->whereNumber('value');
            Route::get('/{test}', TestController::class)
                ->name('test')
                ->whereAlpha('test')
                ->middleware(TestMiddleware::class);
        });
        Route::get('/', [UserController::class, 'update'])
            ->name('user.update');
        Route::get('/id/{id}', [UserController::class, 'show'])
            ->name('user.show');
    });

//Route::resource('users', UserController::class)
//    ->missing(function () {
//        dd('Элемент не найден');
//    });

Route::resource('users', UserController::class);
Route::resource('admin', UserController::class);

//Route::get('/info', [InfoController::class, 'index']);
//Route::post('/info', [InfoController::class, 'index']);
//Route::put('/info', [InfoController::class, 'index']);
//Route::patch('/info', [InfoController::class, 'index']);
//Route::delete('/info', [InfoController::class, 'index']);
//Route::options('/info', [InfoController::class, 'index']);
//
//Route::match(['get', 'post'], '/info', function (){
//    dd('info');
//});

//Route::redirect('/user', '/owner'); //302
//Route::Permanentredirect('/user', '/owner'); //301
