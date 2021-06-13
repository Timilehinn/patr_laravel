<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:api')->post('/register', function (Request $request) {
// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user/{email}',[UserController::class, 'user']);
    Route::get('/allusers',[UserController::class, 'allusers']);
    Route::post('/update-user',[UserController::class, 'updateDetails']);
    Route::delete('/delete/{email}',[UserController::class, 'deleteUser']);
});
Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
