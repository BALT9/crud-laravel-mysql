<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario', function () {
    return view('form');
});

// rutas para el crud continente 
Route::post('/continente', function(){
    return '<h1>soy agregar continente</h1>';
});

