@extends('adminlte::page')

@section('title', 'Atualizar clientes')

@section('content_header')
    <h1>Atualizar Dados do Cliente</h1>
@stop

@section('content')
<div class="card"> 
    <div class="card-body">
<div class="container">
    <form action="{{route('clientes.update',['id'=>$clientes->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="form-group">
                <label for="nome" class="">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $clientes->nome }}" placeholder="Digite o Nome do Cliente">
            </div>
            <div class="form-group">
                <label for="endereco" class="">Endereço:</label>
                <input type="text" class="form-control" name="endereco" value="{{ $clientes->endereco }}" placeholder="Digite o Endereço do Cliente">
            </div>
            <div class="form-group">
                <label for="numero" class="">Numero:</label>
                <input type="text" class="form-control" name="numero" value="{{ $clientes->numero }}" placeholder="Numero da casa">
            </div>
            <div class="form-group">
                <label for="bairro" class="">Bairro:</label>
                <input type="text" class="form-control" name="bairro" value="{{ $clientes->bairro }}" placeholder="">
            </div>
            <div class="form-group">
                <label for="telefone" class="">Telefone:</label>
                <input type="text" class="form-control" name="telefone" value="{{ $clientes->telefone }}" placeholder="(XX)XXXXX-XXXX">
            </div>
            <div class="form-group">
                <label for="pontoreferencial" class="">Ponto Referencial:</label>
                <input type="text" class="form-control" name="pontoreferencial" value="{{ $clientes->pontoreferencial }}" placeholder="Ponto de referencia">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Atualizar" name="submit">
            </div>
        </div>
        
        
    </form>
</div>
</div>
</div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop