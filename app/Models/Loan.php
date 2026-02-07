<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $fillable = ['user_id', 'book_id', 'loan_date', 'return_date', 'status'];

    // Relación 1: Un préstamo pertenece a un LIBRO
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    // Relación 2: Un préstamo pertenece a un USUARIO (¡Esta es la nueva!)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}