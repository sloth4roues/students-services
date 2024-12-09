<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myRoute', function () {
    return view('coucou');
});

// Route avec Middleware pour les cookies
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('cookieMiddleware');
