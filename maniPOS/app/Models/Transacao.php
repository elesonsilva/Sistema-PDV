<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;
    protected $table = 'Transacaos';
    protected $fillable =[
            'pedido_id',
            'montade_pago',
            'saldo',
            'metodo_pagamento',
            'user_id',
            'data_transacao',
            'trasansao_montande'
    ];
}
