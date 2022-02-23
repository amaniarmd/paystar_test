<?php

use Illuminate\Http\Request;

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
//API route for register new user
Route::post('/register', [Modules\User\Http\Controllers\UserController::class, 'register']);
//API route for login user
Route::post('/login', [Modules\User\Http\Controllers\UserController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [Modules\User\Http\Controllers\UserController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
});
});
