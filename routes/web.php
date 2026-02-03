<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanController; // Importamos el controlador de préstamos
use App\Models\Book; // <--- IMPORTANTE: Importar el modelo aquí
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// MODIFICADO: Ahora esta ruta busca los libros y los manda a la vista
Route::get('/dashboard', function () {
    $libros = Book::all(); 
    return view('dashboard', compact('libros'));
})->middleware(['auth', 'verified'])->name('dashboard');

// NUEVA: Ruta para procesar el préstamo cuando des clic al botón
Route::post('/prestamos', [LoanController::class, 'store'])->middleware(['auth'])->name('prestamos.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';