<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Título del libro
            $table->string('author');         // Autor
            $table->string('isbn')->unique(); // El código único (Seguridad)
            $table->integer('stock')->default(1); // Cuántos tenemos
            $table->timestamps();             // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};