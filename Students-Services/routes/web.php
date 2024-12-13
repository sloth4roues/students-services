<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myRoute', function () {
    return view('coucou');
});

<<<<<<< HEAD
// Route avec Middleware pour les cookies
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('cookieMiddleware');
=======
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
>>>>>>> ui-auth
