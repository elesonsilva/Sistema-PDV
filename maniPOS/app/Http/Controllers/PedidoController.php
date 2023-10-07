<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\produto;
use App\Models\cliente;
use App\Models\Transacao;
use App\Models\Pedido_detalhe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pdf;



class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = produto::all();
        $orders = Pedido::all();
        $trasacao = Transacao::all();
        $pedidodetalhe = Pedido_detalhe::all();
         //DEPOIS DOS DETALHES DO PEDIDO
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
        return view('pedidos.index',['produtos'=>$produtos, 
                                        'pedido'=>$orders,
                                        'clientes'=>$clientes,
                                        'orders_receipt'=>$orders_receipt,
                                        'orderedBy'=>$orderedBy,
                                        'orderpag'=>$orderpag,
                                    'trasacao'=>$trasacao,
                                'pedidodetalhe'=>$pedidodetalhe
                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        DB::Transaction(function() use ($request){
            //PEDIDO MODAL
            /* $orders = new Pedido;
            $orders->nome = $request->cliente_id;
            $orders->endereco = $request->endereco;
            $orders->save();
             $pedido_id = $orders->id;  */

              for($cliente_id = 0; $cliente_id < count($request->clientes_id); $cliente_id++){
                $orders = new Pedido;
             
                $orders->nome = $request->clientes_id[$cliente_id];
               
                
                $orders->save();
                $pedido_id = $orders->id;
             }
 

             //'pedido_id',
        /* 'produto_id',
        'quantidade',
        'preco_unitario',
        'montande',
        'desconto' */
            //DETALHES DO PEDIDO MODAL
            for($produto_id = 0; $produto_id < count($request->produtos_id); $produto_id++){
                $orders_details = new Pedido_detalhe;
                $orders_details->pedido_id = $pedido_id;
                $orders_details->produto_id = $request->produtos_id[$produto_id];
                $orders_details->quantidade = $request->quantidade[$produto_id];
                $orders_details->preco_unitario = $request->preco[$produto_id];
                $orders_details->desconto = $request->desconto[$produto_id];
                $orders_details->montande = $request->total_montande[$produto_id];
                $orders_details->save();
            }
            //'pedido_id',
           // 'montade_pago',
            //'saldo',
           // 'metodo_pagamento',
            //'user_id',
          //  'data_transacao',
            //'trasansao_montande'

            //TRANSAÇÃO MODAL
            $transaction = new Transacao;
            $transaction->pedido_id = $pedido_id;
           // $transaction->user_id = auth()->user()->id ;
            $transaction->saldo = $request->saldo;
            $transaction->montade_pago = $request->valor_pago;
            $transaction->metodo_pagamento = $request->metodo_pagamento;
            $transaction->trasansao_montande = $orders_details->montande;
            $transaction->data_transacao = date('y-m-d');
            $transaction->save();


            //HISTORICO DO ULTIMO PEDIDO
        $produtos = produto::all();
        $orders_details = Pedido_detalhe::where('pedido_id', $pedido_id)->get();
        $orderedBy = Pedido::where('id', $pedido_id)->get();

        return view ('pedidos.index',[
            'produtos'=> $produtos,
            'pedidos_detalhes'=> $orders_details,
            'pedido_cliente'=> $orderedBy
        ]);

    });
        /* return "PEDIDO REALIZADO COM SUCESSO"; */
        return view('pedidos.sucesso');
        
    }
            
        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
       //

   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedidodetalhe = Pedido_detalhe::where('pedido_id',$id)->get();
        $pedidonome = Pedido::where('id',$id)->get();
        $pedidotransacao = Transacao::where('pedido_id',$id)->get();
       
       /*  if(!empty($pedidodetalhe.$pedidonome.$pedidotransacao)){ */
        return view('pedidos.edit',['pedidodetalhe'=>$pedidodetalhe,
                                    'pedidonome'=>$pedidonome,
                                    'pedidotransacao'=>$pedidotransacao
                                    ]);    
        /* } else {
          return redirect()->route('pedidos.index');  
        }  */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pedido_detalhe::where('pedido_id',$id)->delete();
        Pedido::where('id',$id)->delete();
        Transacao::where('pedido_id',$id)->delete();
        
        return view('pedidos.apagado');
    }

    public function pdfhistorico($id){
        $pedidodetalhe = Pedido_detalhe::where('pedido_id',$id)->get();
        $pedidonome = Pedido::where('id',$id)->get();
        $pedidotransacao = Transacao::where('pedido_id',$id)->get();
        
        $pdf = Pdf::loadView('pedidos.edit', compact('pedidodetalhe','pedidonome','pedidotransacao'));
        return $pdf->setPaper('a4')->stream('pedido.pdf');
    }

    
}
