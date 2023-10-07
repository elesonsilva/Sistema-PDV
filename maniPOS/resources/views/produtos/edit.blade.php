@extends('adminlte::page')

@section('title', 'Atualizar Produtos')

@section('content_header')
    <h1>Atualizar Dados do Produto</h1>
@stop

@section('content')
 <hr>  
<div class="container">
    <form action="{{route('produtos.update',['id'=>$produtos->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="form-group">
                <label for="nome" class="">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $produtos->nome }}" placeholder="Digite o Nome do Produto">
            </div>
            <div class="form-group">
                <label for="quantidade" class="">quantidade:</label>
                <input type="text" class="form-control" name="quantidade" value="{{ $produtos->quantidade }}" placeholder="Digite a quantidade">
            </div>
            <div class="form-group">
                <label for="preco" class="">Preço:</label>
                <input type="number" class="form-control" name="preco" value="{{ $produtos->preco }}" placeholder="Preço do Produto">
            </div>
           
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Atualizar" name="submit">
            </div>
        </div>
        
        
    </form>
</div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop