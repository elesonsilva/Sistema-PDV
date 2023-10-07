@extends('adminlte::page')

@section('title', 'Cadastro de produtos')

@section('content_header')
    <h1>Cadastro  de Produtos</h1>
@stop

@section('content')
 
 <div class="card">
     <div class="card-body">
         
     
    <form action="{{route('produtos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="nome" class="">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nomeproduto" placeholder="Digite o Nome do produto">
            </div>
            <div class="form-group">
                <label for="quantidade" class="">Quantidade:</label>
                <input type="number" class="form-control" name="quantidade" id="nomeproduto" placeholder="quantos pratos estão a venda">
            </div>
            
            <div class="form-group">
                <label for="telefone" class="">Preço:</label>
                <input type="number" class="form-control" name="preco" id="preco" placeholder="R$:0,00">
            </div>   
           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>
        </div>
        
        
    </form>
        </div>
 </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop