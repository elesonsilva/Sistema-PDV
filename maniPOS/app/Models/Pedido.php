<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'Pedidos';
    protected $fillable =[
        'nome',
       // 'endereco'
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\cliente'); 
       }
    public function datalhedopedido(){
        return $this->belongsTo('App\Models\Pedido_detalhe'); 
       }

    public function pedidodatalhe(){
        return $this->hasMany('App\Models\Pedido_detalhe'); 
       }
}
