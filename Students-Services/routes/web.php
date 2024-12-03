<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myRoute', function () {
    echo'Voici un test';
    return NULL;
});
