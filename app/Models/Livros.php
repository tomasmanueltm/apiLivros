<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livros extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "pessoas_id",
        "nome",
        "categoria",
        "codigo",
        "autor",
        "ebook",
        "tamanho_arquivo",
        "peso"
    ];
}