@extends('adminlte::page')

@section('title', 'Relatorios de Pedidos')

@section('content_header')

@stop

@section('content')
      <!-- Example row of columns -->
      
   
      <div class="tab-content" style="padding-right:50px;">
        <h2>Mani.tupi</h2>
        <h5>Relatório dos pedidos de hoje</h5>
        <div>
        <table class="table table-striped table-bordered table-hover">
              <thead>
                <th>Nº Pedido</th>
                <th>cliente</th>
              </thead>
                @foreach($pedidonome as $cliente)
                <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                </tr>
                @endforeach
            </table>
        <table class="table table-striped table-bordered table-hover">
              <thead>
                <th>Nº Pedido</th>
                <th>Medoto de Pagamento</th>
              </thead>
                @foreach($pedidotransacao as $pag)
                <tr>
                <td>{{$pag->pedido_id}}</td>
                <td>{{$pag->metodo_pagamento}}</td>
                
                </tr>
                @endforeach
            </table>
       
        </div> <!--Fim da Tabela de Pedidos de hoje-->

          
          <div style="float:right;"> 
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                <th>Total-Pedidos:</th>
                <td>R${{ number_format ($pedidodetalhe->sum('montande'),2 )}}</td>
                </tr>
              </thead>
            </table>
          </div>
        

    
        

    
@stop    
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
 
@stop