<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ObtenerDatosDeAPI;

Route::get('/', [PrincipalController::class, 'index'])->name('index');
Route::get('/mostrar-datos', [ObtenerDatosDeAPI::class, 'obtenerDatosDeAPI']);
Route::get('/exportar-datos', [ObtenerDatosDeAPI::class, 'exportarDatos']);

// Route::post('/importar', [PrincipalController::class, 'importar'])->name('importar'); // Almacena y recibeget
// Route::get('/exportar', [PrincipalController::class, 'exportar'])->name('exportar');