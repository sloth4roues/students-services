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

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
// returns the home page with all posts
Route::get('/', UserController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/user/create', UserController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/user', UserController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/user/{post}', UserController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/user/{post}/edit', UserController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/user/{post}', UserController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/user/{post}', UserController::class .'@destroy')->name('posts.destroy');