<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Ads\AdsController;

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

// Routes pour les annonces (ads)
Route::get('/ads', [AdsController::class, 'index'])->name('ads.index'); // Liste des annonces
Route::get('/ads/create', [AdsController::class, 'create'])->name('ads.create')->middleware('auth'); // Formulaire de création (protégé par auth)
Route::post('/ads', [AdsController::class, 'store'])->name('ads.store')->middleware('auth'); // Ajout d'une annonce
Route::get('/ads/{ad}', [AdsController::class, 'show'])->name('ads.show'); // Afficher une annonce spécifique
Route::get('/ads/{ad}/edit', [AdsController::class, 'edit'])->name('ads.edit')->middleware('auth'); // Formulaire de modification (protégé par auth)
Route::put('/ads/{ad}', [AdsController::class, 'update'])->name('ads.update')->middleware('auth'); // Mise à jour d'une annonce
Route::delete('/ads/{ad}', [AdsController::class, 'destroy'])->name('ads.destroy')->middleware('auth');

