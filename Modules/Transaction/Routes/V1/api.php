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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('/transaction/')->group(function () {
        Route::post('create', [Modules\Transaction\Http\Controllers\TransactionController::class, 'store'])
            ->name('create.transaction');
    });


    Route::get('/transactions', [Modules\Transaction\Http\Controllers\TransactionController::class, 'index'])
        ->name('index.transaction');
});
