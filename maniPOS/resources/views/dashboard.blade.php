@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@foreach($idcliente as $cliente)
@endforeach
<div class="row">
<div class="col-md-4 col-sm-6 col-xs-12">
    <x-adminlte-small-box title="{{$cliente->count()}}" text="Clientes cadastrados" icon="fas fa-user-plus text-teal"
        theme="primary" url="#" url-text="ver todos os clientes"/>    
</div>  
</div>


@foreach($pedido as $numpedido)
@endforeach
<div class="row">
<div class="col-md-4 col-sm-6 col-xs-12">
<x-adminlte-small-box title="{{$numpedido->count()}}" text="Pedidos feitos" icon="fas  fa-cart-arrow-down text-warning"
    theme="danger" url="#" url-text="Historico de Pedidos" id="sbUpdatable"/>
</div>
</div>



<div class="row">
<div class="col-md-4 col-sm-6 col-xs-12">
@foreach($pedidodetalhe as $detalhe)
@endforeach
<x-adminlte-info-box title="Total Faturado" text="R${{ number_format ($pedidodetalhe->sum('montande'),2 )}}" icon="fas fa-lg fa-tasks text-orange" theme="warning"
    icon-theme="dark" progress=60 progress-theme="dark"
    description="Valor Total Faturado Até Agora "/>
</div>
</div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>

 
@stop