<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;

    protected $table = 'Companias';
    protected $fillable =[
        'nome_compania',
        'insta_compania',
        'fone_compania'
    ];
}
