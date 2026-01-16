<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('sendCode',[AuthController::class,'sendCode']);
        Route::post('verifyCode',[AuthController::class,'verifyCode']);
        Route::post('loginWithPassword',[AuthController::class,'loginWithPassword']);
        Route::post('resendCode',[AuthController::class,'resendCode']);
        Route::post('logout',[AuthController::class,'logout']);
    });
});