<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::any('/info', [InfoController::class, 'index']);

Route::resource('users', UserController::class);
