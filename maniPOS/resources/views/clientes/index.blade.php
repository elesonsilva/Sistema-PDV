@extends('adminlte::page')

@section('title', 'Lista de clientes')

@section('content_header')
   
@stop

@section('content')



  <!-- TESTE DA TABELA COM PLUGIN -->
<div class="card"> 
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-10">
                    <h3>Lista de Clientes</h3>
                </div>
        <div class="col-sm-2">
            <a href="{{route('clientes.create')}}" class="btn btn-success" ><i class="fa fa-plus"></i> Novo Cliente</a>
        </div> 
    </div>
   
        
   
<table class="table table-sm table-hover table-warning " id="clientes">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Numero</th>
      <th scope="col">Bairro</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ponto Referencial</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
      @foreach($clientes as $cliente)
    <tr>
      
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nome }}</td>
        <td>{{ $cliente->endereco }}</td>
        <td>{{ $cliente->numero }}</td>
        <td>{{ $cliente->bairro }}</td>
        <td>{{ $cliente->telefone }}</td>
        <td>{{ $cliente->pontoreferencial }}</td>
        <td class="d-flex">
            <a href="{{route('clientes.edit',['id'=>$cliente->id])}}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
            </a>
            <form action="{{ route ('clientes.destroy',['id'=>$cliente->id])}}" method="post">
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
    $('#clientes').DataTable({
        "language":{
            "search":       "Pesquisar Cliente",
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