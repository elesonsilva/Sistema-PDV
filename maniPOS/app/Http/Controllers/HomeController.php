<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\produto;
use App\Models\cliente;
use App\Models\Transacao;
use App\Models\Pedido_detalhe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = produto::all();
        $orders = Pedido::all();
        $trasacao = Transacao::all();
        $pedidodetalhe = Pedido_detalhe::all();
        $clientes = cliente::all();
        return view('home');
            }
}
