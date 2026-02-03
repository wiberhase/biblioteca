<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book; // <-- ¡Asegúrate de que esta línea esté aquí!
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos tu usuario
        User::factory()->create([
            'name' => 'Francisco',
            'email' => 'fran@ejemplo.com',
            'password' => bcrypt('12345678'), 
        ]);

        // 2. Creamos libros de prueba
        Book::create([
            'title' => 'Cien años de soledad',
            'author' => 'Gabriel García Márquez',
            'isbn' => '9780307474728',
            'stock' => 10,
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'isbn' => '9780451524935',
            'stock' => 5,
        ]);
    }
}