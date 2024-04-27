<?php

use App\Http\Controllers\InfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::redirect('/user', '/owner');
Route::Permanentredirect('/user', '/owner');
