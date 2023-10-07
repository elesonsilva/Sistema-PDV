@extends('adminlte::page')

@section('title', 'Relatorios de Pedidos')

@section('content_header')

@stop

@section('content')
      <!-- Example row of columns -->
       
      
   
      <div class="tab-content" style="padding-right:50px;">
      <div class="card-body">
            <div class="row">
                <div class="col-sm-10">
            </div>
            <div class="col-sm-2">
                <a href="{{route('relatorios.PdfDoDia')}}" class="btn btn-success" ><i class="fa fa-plus"></i> Gerar PDF </a> 
            </div>      
        </div>
        <h2>Mani.tupi</h2>
        <h5>Pratos vendidos Hoje</h5>
        
        <div>
        <table class="table table-striped table-bordered table-hover">
              <thead>
                <th>Prato</th>
                <th>Quantidade</th>
                <th>Valor Unitario</th>
                <th>Total</th>
              </thead>
            
                <tr> 
                @foreach($nomeproduto as $prato)
                    <td>{{ $prato->nome}}</td>
                    @endforeach
                @foreach($quanditademanicoba as $mani)    
                    <td>{{$mani->quantidade}}</td>
                    @endforeach
                    <td></td>
                    <td></td>
                </tr>
    

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>TOTAL:</th>
            </thead>
                <tr>
                    <td></td> 
                </tr>
                
            </table>
       
        </div> <!--Fim da Tabela de Pedidos de hoje-->

          
          

    
        

    
@stop    
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
 
@stop