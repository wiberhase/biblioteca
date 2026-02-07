<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanController;
use App\Models\Book;
use App\Models\Loan; // <--- 1. AGREGAR ESTA LÍNEA
use App\Http\Controllers\BookController; // <--- No olvides importar esto arriba
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Si ya inició sesión, que vaya al dashboard
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    // Si no, que vaya al Login
    return redirect()->route('login');
});

// 2. MODIFICAMOS ESTA RUTA COMPLETA:
Route::get('/dashboard', function () {
    // 1. Libros para todos
    $libros = Book::all(); 
    
    // 2. Préstamos personales (para que tú también veas los tuyos)
    $misPrestamos = Loan::where('user_id', auth()->id())
                    ->with('book')
                    ->orderBy('created_at', 'desc')
                    ->get();

    // 3. DATOS DE ADMIN: Si eres el jefe, traemos TODO el historial
    $prestamosGlobales = [];
    if (auth()->user()->role === 'admin') {
        $prestamosGlobales = Loan::with(['user', 'book']) // Traemos usuario y libro
                            ->orderBy('created_at', 'desc')
                            ->get();
    }

    return view('dashboard', compact('libros', 'misPrestamos', 'prestamosGlobales'));
})->middleware(['auth', 'verified'])->name('dashboard');


// Esta ruta se queda igual
Route::post('/prestamos', [LoanController::class, 'store'])->middleware(['auth'])->name('prestamos.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware(['auth']);
Route::post('/books', [BookController::class, 'store'])->name('books.store')->middleware(['auth']);


// Ruta para prestar libros (ya la tienes)
Route::post('/prestamos', [LoanController::class, 'store'])->middleware(['auth'])->name('prestamos.store');

// --> AGREGA ESTA NUEVA LÍNEA AQUÍ ABAJO <--
Route::put('/prestamos/{loan}/return', [LoanController::class, 'returnBook'])->name('prestamos.return')->middleware(['auth']);


require __DIR__.'/auth.php';