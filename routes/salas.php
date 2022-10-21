<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalasController;

// listar salas
Route::get('/salas', [SalasController::class, 'index'])->middleware(['auth'])->name('salas');

// criar salas
Route::get('/salas/create', [SalasController::class, 'create'])->middleware(['auth'])->name('salas-create');
Route::post('/salas/create', [SalasController::class, 'store'])->middleware(['auth'])->name('salas-store');

// editar salas
Route::get('/salas/edit/{id}', [SalasController::class, 'edit'])->middleware(['auth'])->name('salas-edit');
Route::post('/salas/update/{id}', [SalasController::class, 'update'])->middleware(['auth'])->name('salas-update');

// apagar salas
Route::post('/salas/remove/{id}', [SalasController::class, 'destroy'])->middleware(['auth'])->name('salas-remove');