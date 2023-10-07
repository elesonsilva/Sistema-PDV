@extends('adminlte::page')

@section('title', 'Relatorios de Pedidos')

@section('content_header')
    <h1>Historico</h1>
@stop

@section('content')


  <!-- TESTE DA TABELA COM PLUGIN -->
  <div class="card"> 
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-10">
                    <h3>historico dos Pedidos</h3>
                </div>
        <div class="col-sm-2">
             <a href="{{route('relatorios.homepedidos')}}" class="btn btn-warning" ><i class="fa fa-plus"></i> Voltar </a> 
        </div> 
    </div>
   
        
   
<table class="table table-sm table-hover table-warning " id="historicopedidos">
<thead>
            <tr>
            <th scope="col">N° do Pedido</th>
            <th scope="col">Nome do Cliente e Endereço</th>
            
           
            <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido as $pedido)
          
            <tr>
            
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->nome }}</td>
                
              
                <td class="d-flex">
                    <a href="{{route('pedidos.edit',['id'=>$pedido->id])}}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                </svg>
            </a>
            <form action="{{ route ('pedidos.destroy',['id'=>$pedido->id])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger me-5" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </button>
            </form>
        </td>
    </tr>
    
    @endforeach
  </tbody>
  
</table>

</div>
</div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
    $('#historicopedidos').DataTable({
        "language":{
            "search":       "Pesquisar Pedidos",
            "lengthMenu":   "Mostrar _MENU_ Registros por Página",
            "info":         "Mostrando página _PAGE_ de _PAGES_",
            "paginate":     {
                            "previous": "Anterior",
                            "next":     "Proximo",
                            "first":    "Primeiro",
                            "last":     "Último"
            }
        }
    });
});
    </script> 
@stop