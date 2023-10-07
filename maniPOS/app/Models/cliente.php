<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
     protected $fillable =[
        'nome',
        'endereco',
        'numero',
        'bairro',
        'telefone',
        'pontoreferencial',
   ];
   public function pedidodatalhe(){
      return $this->hasMany('App\Pedido'); 
     }
}
