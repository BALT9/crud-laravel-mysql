<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContinenteController;
use App\Http\Controllers\PaisController;

// Página principal - lista de continentes
Route::get('/', [ContinenteController::class, 'listarContinente']);
// Mostrar formulario para agregar o editar (ID es opcional)
Route::get('/formulario/{id?}', [ContinenteController::class, 'mostrarFormulario']);
// Crear un continente (POST)
Route::post('/continente', [ContinenteController::class, 'crearContinente']);
// Actualizar un continente existente (PUT)
Route::put('/continente/{id}', [ContinenteController::class, 'actualizarContinente']);
// Eliminar un continente (DELETE)
Route::delete('/continente/{id}', [ContinenteController::class, 'eliminarContinente']);


Route::get('formularioP/{id?}', [PaisController::class, 'mostrarFormularioPais']);
Route::post('/pais', [PaisController::class, 'crearPais']);
Route::put('/pais/{id}', [PaisController::class, 'actualizarPais']);
Route::delete('/pais/{id}', [PaisController::class, 'eliminarPais']);




