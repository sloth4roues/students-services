<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myRoute', function () {
    return view('coucou');
});

// Routes d'inscription
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// Routes de connexion
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Routes utilisateur
Route::get('/user', [UserController::class, 'index'])->name('user.index'); // Liste des utilisateurs
Route::get('/user/create', [UserController::class, 'create'])->name('user.create'); // Formulaire de création
Route::post('/user', [UserController::class, 'store'])->name('user.store'); // Ajout d'un utilisateur
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show'); // Détails d'un utilisateur
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit'); // Formulaire de modification
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update'); // Mise à jour
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy'); // Suppression
