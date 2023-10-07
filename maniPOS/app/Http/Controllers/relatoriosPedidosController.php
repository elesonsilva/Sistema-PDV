<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\produto;
use App\Models\cliente;
use App\Models\Transacao;
use App\Models\Pedido_detalhe;
use Illuminate\Support\Facades\DB;
use Pdf;
use Carbon\Carbon;

class relatoriosPedidosController extends Controller
{
    public function index(){
        return view ('relatorios.homepedidos');
    }
    public function pedidosHistorico(){
        $produtos = produto::all();
        $orders = Pedido::all();
        $trasacao = Transacao::all();
        $pedidodetalhe = Pedido_detalhe::all();
         
        $lastID = Pedido_detalhe::max('pedido_id');
        $orders_receipt = Pedido_detalhe::where('pedido_id', $lastID)->get();

        /* FILTRA O CLIENTE NO TICKET DO PEDIDO
         */
        $utimoID = Pedido::max('id');
        $orderedBy = Pedido::where('id', $utimoID)->get();
        /* FILTRA O PAGAMENTO DOCLIENTE NO TICKET DO PEDIDO
         */
        $UltimaFormaPag = Transacao::max('id');
        $orderpag = Transacao::where('id', $UltimaFormaPag)->get();


        $clientes = cliente::all();

        return view ('relatorios.historicoPedidos',['produtos'=>$produtos, 
        'pedido'=>$orders,
        'clientes'=>$clientes,
        'orders_receipt'=>$orders_receipt,
        'orderedBy'=>$orderedBy,
        'orderpag'=>$orderpag,
    'trasacao'=>$trasacao,
'pedidodetalhe'=>$pedidodetalhe
]);
    }


    public function pdfhistorico($id){
        $pedidodetalhe = Pedido_detalhe::where('pedido_id',$id)->get();
        $pedidonome = Pedido::where('id',$id)->get();
        $pedidotransacao = Transacao::where('pedido_id',$id)->get();
        
        $pdf = Pdf::loadView('pedidos.edit', compact('pedidodetalhe','pedidonome','pedidotransacao'));
        return $pdf->setPaper('a4')->stream('pedido.pdf');
    }

    public function pedidosDoDia(){

        $hoje = Carbon::today();

        
        $pedidodetalhe = Pedido_detalhe::whereDate('created_at',$hoje)->get();
        $pedidonome = Pedido::whereDate('created_at',$hoje)->get();
        $pedidotransacao = Transacao::whereDate('created_at',$hoje)->get();
        
        return view ('relatorios.pedidosDoDia',['pedidodetalhe'=>$pedidodetalhe,
                                                'pedidonome'=>$pedidonome,
                                                'pedidotransacao'=>$pedidotransacao
                                            ]);

        /* $pdf = Pdf::loadView('pedidos.edit', compact('pedidodetalhe','pedidonome','pedidotransacao'));
        return $pdf->setPaper('a4')->stream('pedido.pdf'); */
    }
    public function PdfDoDia(){

        $hoje = Carbon::today();

        
        $pedidodetalhe = Pedido_detalhe::whereDate('created_at',$hoje)->get();
        $pedidonome = Pedido::whereDate('created_at',$hoje)->get();
        $pedidotransacao = Transacao::whereDate('created_at',$hoje)->get();

        $pdf = Pdf::loadView('pedidos.RelatorioImprimir', compact('pedidodetalhe','pedidonome','pedidotransacao'));
        return $pdf->setPaper('a4')->stream('pedido.pdf'); 
    }
    public function QtdPratos(){
        /* return view ('relatorios.pratos'); */
         $hoje = Carbon::today();

        $nomeproduto = Produto::all();
        $quanditademanicoba = Pedido_detalhe::where('produto_id', 2)->where('created_at',$hoje)->count();
        $detalhedopedido = Pedido_detalhe::whereDate('created_at',$hoje)->get();
        $nomedopedido = Pedido::whereDate('created_at',$hoje)->get();
        $dinheirodopedido = Transacao::whereDate('created_at',$hoje)->get();
        return view ('relatorios.pratos',['detalhedopedido'=>$detalhedopedido,
                                                'nomedopedido'=>$nomedopedido,
                                                'dinheirodopedido'=>$dinheirodopedido,
                                                'nomeproduto'=>$nomeproduto,
                                            'quanditademanicoba'=>$quanditademanicoba]);

       /*  $pdf = Pdf::loadView('pedidos.RelatorioImprimir', compact('pedidodetalhe','pedidonome','pedidotransacao'));
        return $pdf->setPaper('a4')->stream('pedido.pdf');  */ 
    }
}
