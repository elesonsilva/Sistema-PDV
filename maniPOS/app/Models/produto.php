<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;
    protected $fillable =[
        'nome',
        'quantidade',
        'preco',
        
   ];

   public function pedidodatalhe(){
    return $this->hasMany('App\Pedido_detalhe'); 
   }
}
