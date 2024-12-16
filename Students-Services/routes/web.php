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
Route::get('/user', [UserController::class, 'index'])->name('user.index'); 
Route::get('/user/create', [UserController::class, 'create'])->name('user.create'); 
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show'); 
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit'); 
Route::put('/user/update', [UserController::class, 'update'])->name('user.update'); 
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy'); 
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

// Routes pour les annonces
Route::get('/ads', [AdsController::class, 'index'])->name('ads.index'); 
Route::get('/ads/create', [AdsController::class, 'create'])->name('ads.create')->middleware('auth'); 
Route::post('/ads', [AdsController::class, 'store'])->name('ads.store')->middleware('auth'); 
Route::get('/ads/{ad}', [AdsController::class, 'show'])->name('ads.show'); 
Route::get('/ads/{ad}/edit', [AdsController::class, 'edit'])->name('ads.edit')->middleware('auth'); 
Route::put('/ads/{ad}', [AdsController::class, 'update'])->name('ads.update')->middleware('auth'); 
Route::delete('/ads/{ad}', [AdsController::class, 'destroy'])->name('ads.destroy')->middleware('auth');

Route::post('/ads/{ad}/accept', [AdsController::class, 'accept'])->name('ads.accept')->middleware('auth'); 