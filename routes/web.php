<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
Route::get('/login', function () {
    return response(['msg'=>'you are not authorized']);
})->name('login');