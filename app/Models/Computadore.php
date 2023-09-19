<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computadore extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacao_comp',
    ];
    
}
