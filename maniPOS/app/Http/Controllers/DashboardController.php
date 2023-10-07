<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\produto;
use App\Models\cliente;
use App\Models\Transacao;
use App\Models\Pedido_detalhe;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $produtos = produto::all();
        $pedido = Pedido::all();
        $trasacao = Transacao::all();
        $pedidodetalhe = Pedido_detalhe::all();
        $clientes = cliente::all();

        $lastID = cliente::max('id');
        $idcliente = cliente::where('id', $lastID)->get();

        $contapedidos = Pedido::count();

        $hoje = Carbon::today();
        $pedidosdehoje = Pedido_detalhe::whereDate('created_at',$hoje)->get();

       


        
       

        return view('dashboard',['produtos'=>$produtos, 
                                    'pedido'=>$pedido,
                                    'clientes'=>$clientes,
                                    'trasacao'=>$trasacao,
                                    'pedidodetalhe'=>$pedidodetalhe,
                                    'idcliente'=>$idcliente,
                                    'contapedidos'=>$contapedidos,
                                    'pedidosdehoje'=>$pedidosdehoje
                                    
]);
    }
}
