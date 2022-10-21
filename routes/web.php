<?php

use Illuminate\Support\Facades\Route;
use App\Models\Livro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/dashboard', function () {
    $livros = Livro::all();
    return view('dashboard', compact('livros'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/livros.php';
require __DIR__.'/computadores.php';
require __DIR__.'/salas.php';
