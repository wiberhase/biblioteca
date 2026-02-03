<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Esto permite que el Seeder guarde datos en estas columnas
    protected $fillable = ['title', 'author', 'isbn', 'stock'];
}
