@extends('adminlte::page')

@section('title', 'Relatorios de Pedidos')

@section('content_header')
    <h1>Relatorios de Pedidos</h1>
@stop

@section('content')
<a href="{{route('relatorios.historicoPedidos')}}">
<x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg  fa-history" title="Historico dos pedidos">
    <i class="text-dark">Visualize, Imprime ou Apaque Algum Pedido.</i>
</x-adminlte-callout></a>

<a href="{{route('relatorios.pedidosDoDia')}}">
<x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
    icon="fas fa-lg fa-exclamation-circle" title="Pedidos do Dia">
    <i>Imprimir Todas as Notas de Pedidos do Dia</i>
</x-adminlte-callout></a>

<a href="{{route('relatorios.pratos')}}">
<x-adminlte-callout theme="info" class="bg-gradient-info" title-class="text-bold text-dark"
    icon="fas fa-lg fa-bell text-dark" title="Pratos Vendidos Hoje">
    Veja a quantidade de pratos que foram vendidos Hoje.
</x-adminlte-callout>
</a>

<x-adminlte-callout theme="danger" class="bg-gradient-pink" title-class="text-uppercase"
    icon="fas fa-lg fa-leaf text-purple" title="observation">
    <i>A styled observation for the user.</i>
</x-adminlte-callout>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>

 
@stop