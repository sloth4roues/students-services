<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'home'])->name('home');

Route::get('/', [UserController::class, 'home'])->name('home');

Route::get('/auth', [LoginController::class, 'create'])->name('auth');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes utilisateur
Route::get('/user', [UserController::class, 'index'])->name('user.index'); // Liste des utilisateurs
Route::get('/user/create', [UserController::class, 'create'])->name('user.create'); // Formulaire de création
Route::post('/user', [UserController::class, 'store'])->name('user.store'); // Ajout d'un utilisateur
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show'); // Détails d'un utilisateur
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit'); // Formulaire de modification
Route::put('/user/update', [UserController::class, 'update'])->name('user.update'); // Mise à jour
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy'); // Suppression
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');