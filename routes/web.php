<?php

use App\Http\Controllers\AltasBajas;
use Illuminate\Support\Facades\Route;

// vistas Altas Bajas
Route::get('/',[AltasBajas::class, 'inicio'])->name('inicio');
Route::get('/altasBajas',[AltasBajas::class, 'index'])->name('AB');

// crear Alta Baja
Route::get('/nuevoAB',[AltasBajas::class, 'create'])->name('nuevoAB');
Route::post('/guardarAB',[AltasBajas::class, 'store'])->name('crearAB');

// editar Alta Baja
Route::get('/editarAB/{id}',[AltasBajas::class, 'edit'])->name('editarAB');
Route::put('/actualizarAB/{id}',[AltasBajas::class, 'update'])->name('actualizarAB');

// eliminar Alta Baja
Route::get('/eliminar/{id}',[AltasBajas::class, 'show'])->name('eliminarAB');
Route::delete('/destruir/{id}',[AltasBajas::class, 'destroy'])->name('destroyAB');