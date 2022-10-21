<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'autor',
        'publicacao',
        'nome',
        'genero',
        'categoria'
    ];

    use HasFactory;
}
