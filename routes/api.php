<?php

use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::any('/info', [InfoController::class, 'index']);
