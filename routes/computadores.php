<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputadoresController;

// listar computadores
Route::get('/computadores', [ComputadoresController::class, 'index'])->middleware(['auth'])->name('computadores');

// criar computador
Route::get('/computador/create', [ComputadoresController::class, 'create'])->middleware(['auth'])->name('computador-create');
Route::post('/computador/create', [ComputadoresController::class, 'store'])->middleware(['auth'])->name('computador-store');

// editar computador
Route::get('/computador/edit/{id}', [ComputadoresController::class, 'edit'])->middleware(['auth'])->name('computador-edit');
Route::post('/computador/update/{id}', [ComputadoresController::class, 'update'])->middleware(['auth'])->name('computador-update');

// apagar computador
Route::post('/computador/remove/{id}', [ComputadoresController::class, 'destroy'])->middleware(['auth'])->name('computador-remove');