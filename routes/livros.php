<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;

// listar livros
Route::get('/livros', [LivrosController::class, 'index'])->middleware(['auth'])->name('livros');

// criar livro
Route::get('/livros/create', [LivrosController::class, 'create'])->middleware(['auth'])->name('livros-create');
Route::post('/livros/create', [LivrosController::class, 'store'])->middleware(['auth'])->name('livros-store');

// editar livro
Route::get('/livros/edit/{id}', [LivrosController::class, 'edit'])->middleware(['auth'])->name('livros-edit');
Route::post('/livros/update/{id}', [LivrosController::class, 'update'])->middleware(['auth'])->name('livros-update');

// apagar livro
Route::post('/livros/remove/{id}', [LivrosController::class, 'destroy'])->middleware(['auth'])->name('livros-remove');