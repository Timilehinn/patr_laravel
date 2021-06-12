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
    Route::get('/user-details',[UserController::class, 'userDetails']);

    // TO VERIFY TOKEN SENT FROM THE FRONTEND
    Route::get('/verifying',[AuthController::class, 'verifyToken']);

    Route::post('/update-details',[UserController::class, 'updateDetails']);
    Route::post('/update-password',[UserController::class, 'updatePassword']);
    Route::delete('/delete-user',[UserController::class, 'deleteUser']);
});
Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
