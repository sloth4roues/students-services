<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\Api\AdsController;

Route::prefix('v1')->group(function () {
    // Routes d'authentification
    Route::post('/auth/login', [GatewayController::class, 'login']); // Pour se connecter
    Route::post('/auth/register', [GatewayController::class, 'register']); // Pour s'inscrire
    Route::post('/auth/logout', [GatewayController::class, 'logout']); // Pour se déconnecter

    Route::middleware('auth:sanctum')->group(function () {
        // Routes sécurisées utilisateur
        Route::get('/user', [GatewayController::class, 'getUserData']); // Récupérer les données utilisateur
        Route::put('/user/update', [GatewayController::class, 'updateUser']); // Mettre à jour un utilisateur

        // Routes CRUD pour les annonces (ads)
        Route::apiResource('ads', AdsController::class);
    });
});
