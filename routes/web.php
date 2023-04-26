<?php

use App\Http\Controllers\AltasBajas;
use App\Http\Controllers\authControllers;
use Illuminate\Support\Facades\Route;

// sistema de logueo
Route::get('/', [authControllers::class, 'index'])->name('login');
Route::post('/logeo', [authControllers::class, 'logeo'])->name('logeo');
Route::get('/logout', [authControllers::class, 'logout'])->name('logout');

// registro
Route::get('/registro',[authControllers::class, 'registro'])->name('registro');
Route::post('/agregar',[authControllers::class, 'nuevoRegistro'])->name('agregar');

// vistas Altas Bajas
Route::get('/inicio', [AltasBajas::class, 'inicio'])->name('inicio');
Route::get('/altasBajas', [AltasBajas::class, 'index'])->name('AB');

// crear Alta Baja
Route::get('/nuevoAB', [AltasBajas::class, 'create'])->name('nuevoAB');
Route::post('/guardarAB', [AltasBajas::class, 'store'])->name('crearAB');

// editar Alta Baja
Route::get('/editarAB/{id}', [AltasBajas::class, 'edit'])->name('editarAB');
Route::put('/actualizarAB/{id}', [AltasBajas::class, 'update'])->name('actualizarAB');

// eliminar Alta Baja
Route::get('/eliminar/{id}', [AltasBajas::class, 'show'])->name('eliminarAB');
Route::delete('/destruir/{id}', [AltasBajas::class, 'destroy'])->name('destroyAB');

// llenado de tablas
Route::get('/agregarTipos', [AltasBajas::class, 'agregarTipos']);
Route::get('/agregarCat', [AltasBajas::class, 'agregarCat']);
