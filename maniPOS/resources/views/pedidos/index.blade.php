@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Tela de pedidos</h1>
@stop

@section('content')

<div class="conteiner">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4 style="float: left">Adicione os Pratos</h4>
                <a href="#" style="float: right" class="btn btn-dark"><i class="fa fa-plus" data-toggle="modal" data-target="#addUser">

                </i> Prato</a></div>
                <form action="{{route('pedidos.store')}}" method="post">
                    @csrf
                <div class="card-body">
                    <table class="table table-bordered table-left">
                        <thead>
                         <tr>
                            <th></th>
                            <th>Produto</th>
                            <th>quantidade</th>
                            <th>Preço</th>
                            <th>Desconto (%)</th>
                            <th>Total</th>
                            <th><a href="#" class="btn btn-sm btn-success add_mais"><i class="fa fa-plus"></i></a></th>
                         </tr>
                        </thead>
                       <tbody class="addMaisProdutos">
                        <tr>
                            <td>1</td>
                            <td>
                            <select name="produtos_id[]" id=" produtos_id" class="form-control produto_id">
                                <option value="">Selecione o Prato</option>
                            @foreach($produtos as $produto)
                            <option data-price="{{$produto->preco}}" value="{{$produto->id}}">{{$produto->nome}}</option>
                            @endforeach
                            </select>
                            </td>
                            <td>
                             <input type="number" name="quantidade[]" id="quantidade" class="form-control quantidade">
                            </td>
                            <td>
                             <input type="number" name="preco[]" id="preco" class="form-control preco">
                            </td>
                            <td>
                             <input type="number" name="desconto[]" id="desconto" class="form-control desconto">
                            </td>
                            <td>
                             <input type="number" name="total_montande[]" id="total_montande" class="form-control total_montande">
                            </td>
                            <td><a href="#" class="btn btn-sm btn-danger "><i class="fa fa-times"></i></a></td>
                        </tr>
                       </tbody> 
                                  
                       
                    </table>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h4>TOTAL: <b class="total">0.00</b></h4></div>
                <div class="card-body">
                    <div class="btn-group">
                        <button type="button" onclick="PrintReceiptContent('print')"
                         class="btn btn-dark"><i class="fa fa-tv "> visualizar</i>
                        </button>
                        <button type="button" data-toggle="modal" data-target="#modalHtorico" 
                         class="btn btn-primary"><i class="fa fa-history"> Historico</i>
                        </button>
                        <button type="button" onclick="PrintReceiptContent('print')"
                         class="btn btn-danger"><i class="fa fa-print"> Relatorios</i>
                        </button>
                    </div>
                    <div class="panel">
                        <div class="row">
                            <table class="table table-striped">
                            <tr>
                               <!--   <td>
                                   <label for="">Cliente</label>
                                   <input type="text" name="nome_cliente" id="" class="form-control">  
                                </td>
                                <td>
                                    <label for="">Endereço Cliente</label>
                                    <input type="text" name="endereco_cliente" id="" class="form-control">    
                                </td>  -->  
                                 <td>
                            <select name="clientes_id[]" id="clientes_id" class="form-control clientes_id">
                                <option value="">Selecione o Cliente</option>
                            @foreach($clientes as $cliente)
                            <option data-price="{{$cliente->nome}}" value="NOME:{{$cliente->nome}}                                  
                            ENDEREÇO:{{$cliente->endereco}}                                      
                            NUMERO:{{$cliente->numero}}
                            BAIRRO:{{$cliente->bairro}}
                            PONTO REFERENCIAL: {{$cliente->pontoreferencial}}">{{$cliente->nome}}|Endereço:{{$cliente->endereco}}</option>
                             @endforeach
                            </select>
                            </td>  
                           
 

                            </tr>
                            </table>
                            
                            <td> Metodo de Pagamento <br>
                             <div class="">   
                            <span class="radio-item">
                                <input type="radio" name="metodo_pagamento" id="metodo_pagamento" 
                                class="true" value="Dinheiro" checked="checked">
                                <label for="metodo_pagamento"> <i class="fa fa-money-bill text-success"></i> Dinheiro</label>
                            </span>

                            <span class="radio-item">
                                <input type="radio" name="metodo_pagamento" id="metodo_pagamento" 
                                class="true" value="Pix">
                                <label for="metodo_pagamento"> <i class="fa fa-university text-danger"></i> Pix</label>
                            </span>
                            
                            <span class="radio-item">
                                <input type="radio" name="metodo_pagamento" id="metodo_pagamento" 
                                class="true" value="Cartao">
                                <label for="metodo_pagamento"> <i class="fa fa-credit-card text-info"></i> Cartão</label>
                            </span>

                            </div>
                            </td><br>

                            <td>
                                Pagamento
                                 <input type="number" name="valor_pago" id="valor_pago" class="form-control">
                            </td>
                                <td>
                                    Troco
                                    <input type="number" readonly name="saldo" id="saldo" class="form-control">
                                </td>

                            <td>
                                <button class="btn-primary btn-lg btn-block mt-3">Salvar</button>
                            </td>    
                            <td>
                                <button class="btn-danger btn-lg btn-block mt-2">Calcular</button>
                            </td>    
                        </div>
                    </div>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
 
<div class="modal"> 
    <div id="print">
        @include('relatorios.recibo_nota')
    </div>
</div> 



<x-adminlte-modal id="modalHtorico" title="Historico de Pedidos" size="xl" theme="dark"
    icon="fas fa-history" v-centered static-backdrop scrollable>
    <div style="height:800px;">
    <div class="card">
    <div class="card-body">
        <div class="container mt-5">
     <div class="row">
        <!-- BOTÃO DE PESQUISA -->
        <!-- <form action="/" method="get">
        <x-adminlte-input id="search" name="search" label="Escreva o Nº do Pedido para Imprimir" placeholder="Pesquisar Pedido" igroup-size="lg">
            <x-slot name="appendSlot">
                <x-adminlte-button theme="outline-danger" label="Pesquisar!"/>
            </x-slot>
    <x-slot name="prependSlot">
        <div class="input-group-text text-danger">
            <i class="fas fa-search"></i>
        </div>
    </x-slot>
</x-adminlte-input>
</form> -->
    <!-- FIM DO BOTÃO DE PESQUISA -->
        <table class="table" id="pedidoshis">
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
              
                
                <td class="d-flex"><a href="{{route('pedidos.edit',['id'=>$pedido->id])}}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
</svg>
            </a>
                </td>
            </tr>
            @endforeach
           
        </tbody>

  
</table>
            
</div>
    </div>
</div>
    </div>
     <!-- <div class="modal"> 
    <div id="print2">
   
    </div>
</div>   -->
   
</x-adminlte-modal>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .radio-item input[type="radio"]{
            visibility: hidden;
            width: 20px;
            height: 20px;
            margin: 0 5px 0 5px;
            padding: 0;
            cursor: pointer;

        }
        .radio-item input[type="radio"]:before{
            position: relative;
            margin: 4px -25px -4px 0;
            display: inline-block;
            visibility: visible;
            width: 20px;
            height: 20px;
            border-radius: 10px;
            border: 2px inset rgb(150, 150, 150, 0.75);
            background: radial-gradient(ellipse at top left, rgb(255, 255, 255, ) 0%,
            rgb(250, 250, 250,) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
            content:'';
            cursor: pointer;
        }

        .radio-item input[type="radio"]:checked:after{
            position: relative;
            top: 0;
            left: 9px;
            display: inline-block;
            border-radius: 6px;
            visibility: visible;
            width: 12px;
            height: 12px;
            background: radial-gradient(ellipse at top left, rgb(240, 255, 220 ) 0%,
            rgb(225, 250, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
            content:'';
            cursor: pointer;
        }

        .radio-item input[type="radio"].true:checked:after{
            background: radial-gradient(ellipse at top left, rgb(240, 255, 220 ) 0%,
            rgb(225, 250, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
        }
        .radio-item input[type="radio"].false:checked:after{
            background: radial-gradient(ellipse at top left, rgb(255, 255, 255, ) 0%,
            rgb(250, 250, 250,) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
        }

        .radio-item label{
            display: inline-block;
            margin: 0;
            padding: 0;
            line-height: 25px;
            height: 25px;
            cursor: pointer;

        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>/* 
        $(document).ready(function() {
            alert(1);
        })  */
        $('.add_mais').on('click', function(){
            //alert(0);
            var produto = $('.produto_id').html();
            var maisumalinha = ($('.addMaisProdutos tr').length - 0) + 1;
            var tr = '<tr><td class"no"">' + maisumalinha + '</td>' +
                     '<td><select class="form-control produto_id" name="produtos_id[]">'+ produto +
                     '</select></td>'+
                     '<td> <input type="number" name="quantidade[]" class="form-control quantidade"></td>'+ 
                     '<td> <input type="number" name="preco[]" class="form-control preco"></td>'+ 
                     '<td> <input type="number" name="desconto[]" class="form-control desconto"></td>'+ 
                     '<td> <input type="number" name="total_montande[]" class="form-control total_montande"></td>'+ 
                     '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"</a></td>';
                     $('.addMaisProdutos').append(tr);
        });
        //APAGAR UMA LINHA
        $('.addMaisProdutos').delegate('.delete','click', function() {
            $(this).parent().parent().remove();
        })

        function TotalMontande() {
            //SOMAR O TOTAL DAS LINHAS COM OS PREÇOS DOS PRODUTOS
            var total = 0;
            $('.total_montande').each(function(i, e) {
                var montande = $(this).val() - 0;
                total += montande;
            });

            $('.total').html(total);
        }

        $('.addMaisProdutos').delegate('.produto_id', 'change', function () {
            var tr = $(this).parent().parent();
            var preco = tr.find('.produto_id option:selected').attr('data-price');
            tr.find('.preco').val(preco);
            var qtd = tr.find('.quantidade').val() - 0;
            var disc = tr.find('.desconto').val() - 0;
            var preco = tr.find('.preco').val() - 0;
            var total_montande = (qtd * preco) - ((qtd * preco * disc) / 100);
            tr.find('.total_montande').val(total_montande);
            TotalMontande();
        });

        $('.addMaisProdutos').delegate('.quantidade , .desconto', 'keyup', function(){
            var tr = $(this).parent().parent();
            var qtd = tr.find('.quantidade').val() - 0;
            var disc = tr.find('.desconto').val() - 0;
            var preco = tr.find('.preco').val() - 0;
            var total_montande = (qtd * preco) - ((qtd * preco * disc) / 100);
            tr.find('.total_montande').val(total_montande);
            TotalMontande();
        });

        //SCRIPT PRA CALCULAR O TROCO
        $('#valor_pago').keyup(function(){
            var total = $('.total').html();
            var valor_pago = $(this).val();
            var troco = valor_pago - total;
            $('#saldo').val(troco).toFixed(2);
        })

        //PRINT SEÇÃO
        function PrintReceiptContent(el) {
            var data = '<input type="button" id="printPageButton class="prinPageButton" style="display:block; width:100%; border:none; background-color:#008B8B; color: #fff; padding:14px 28px; font-size: 16px; cursor:pointer; text-align:center" value="Print de Nota"" onclick="window.print()">';
                data += document.getElementById(el).innerHTML;
                myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");  
                     myReceipt.screnX = 0;
                     myReceipt.screnY = 0;
                     myReceipt.document.write(data);
                     myReceipt.document.title = "Nota";
                myReceipt.focus();
                setTimeout(() => {
                    myReceipt.close(); 
                }, 80000);           
        }

        
       

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
    $('#pedidoshis').DataTable({
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