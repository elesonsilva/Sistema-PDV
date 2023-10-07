<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_detalhe extends Model
{
    use HasFactory;
    protected $table = 'Pedido_detalhes';
    protected $fillable =[
        'pedido_id',
        'produto_id',
        'quantidade',
        'preco_unitario',
        'montande',
        'desconto'
    ];
    
    public function produto(){
        return $this->belongsTo('App\Models\produto'); 
       }
    public function pedido(){
        return $this->belongsTo('App\Models\Pedido'); 
       }
   
       public function datalhedopedido(){
        return $this->hasMany('App\Pedido'); 
       }
}
