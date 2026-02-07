<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Mostrar el formulario
    public function create()
    {
        // Seguridad: Si no es admin, lo expulsamos
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acceso denegado. Solo administradores.');
        }
        return view('books.create');
    }

    // 2. Guardar el libro en la Base de Datos
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        // Validamos que no manden datos vacíos
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn', // ISBN único
            'stock' => 'required|integer|min:1'
        ]);

        Book::create($request->all());

        return redirect()->route('dashboard')->with('success', '¡Libro agregado al inventario!');
    }
}