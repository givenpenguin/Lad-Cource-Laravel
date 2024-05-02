<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/{id?}', function (Request $request, ?string $userId = null) {
    dd("User {$userId}");
})->name('user.info');
