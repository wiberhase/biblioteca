<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importante para las transacciones

class LoanController extends Controller
{
    // MÉTODO PARA PRESTAR LIBRO (El que te dio error)
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::find($request->book_id);

        // 1. Validar si hay stock
        if ($book->stock < 1) {
            return back()->with('error', 'Lo sentimos, no hay stock disponible.');
        }

        // 2. Transacción: Crear el préstamo y restar stock al mismo tiempo
        DB::transaction(function () use ($book) {
            Loan::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'loan_date' => now(),
                'status' => 'active',
            ]);

            $book->decrement('stock');
        });

        return back()->with('success', '¡Préstamo registrado exitosamente!');
    }

    // MÉTODO PARA DEVOLVER LIBRO
    public function returnBook(Request $request, Loan $loan)
    {
        // Seguridad: Solo devolver tus propios libros
        if ($loan->user_id !== auth()->id()) {
            abort(403);
        }

        if ($loan->status === 'returned') {
            return back()->with('error', 'Este libro ya fue devuelto.');
        }

        DB::transaction(function () use ($loan) {
            $loan->update([
                'status' => 'returned',
                'return_date' => now(),
            ]);

            $loan->book->increment('stock');
        });

        return back()->with('success', 'Libro devuelto. ¡Gracias!');
    }
}