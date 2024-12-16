<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\Api\AdsController;

Route::prefix('v1')->group(function () {
    // Routes d'authentification
    Route::post('/auth/login', [GatewayController::class, 'login']); 
    Route::post('/auth/register', [GatewayController::class, 'register']); 
    Route::post('/auth/logout', [GatewayController::class, 'logout']);

    Route::middleware('auth:sanctum')->group(function () {
        // Routes sécurisées utilisateur
        Route::get('/user', [GatewayController::class, 'getUserData']); 
        Route::put('/user/update', [GatewayController::class, 'updateUser']); 

        // Routes CRUD pour les annonces
        Route::apiResource('ads', AdsController::class);
    });
});
