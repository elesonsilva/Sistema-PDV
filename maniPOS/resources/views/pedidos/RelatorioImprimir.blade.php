
 <div id="invoice-mani">
<!-- SEÇÃO DE IMPRIMIR -->
<div id="printed_content">


<center id="top">
    <div class="logo"><img src="logocopia.png" alt="logo mani Tupi" style=" height: 100px;
    width: 100px;
    display: block;
    margin-left: auto;
    margin-right: auto"></div> 
     <div class="info"></div>
    <h2>Mani.Tupi</h2>
     
</center>
</div>

<div class="mid">
    <div class="info">
        <!-- <h2>Contato</h2> -->
        <p>Pedidos de Hoje</p>
    </div>
</div>
<!-- FIM DO MID -->

<div class="bot">
@foreach($pedidonome as $nome)
<h2>{{ $nome->nome}}</h2>
@endforeach
    <div id="table">
        <table class="tabletitle">
            <tr>
                <td class="item"><h2 style="font-size: 1.2em;">Prato</h2></td>
                <td class="avaliar"><h2 style="font-size: 1.2em;">Qtd</h2></td>
                <td class="avaliar"><h2 style="font-size: 1.2em;">valor uni</h2></td>
                <td class="avaliar"><h2 style="font-size: 1.2em;">Desconto</h2></td>  
                <td class="avaliar"><h2 style="font-size: 1.2em;">SubTotal</h2></td>
            </tr>      
            @foreach($pedidodetalhe as $detalhe)
            
            <tr class="service">
                <td class="tableitem"><p class="itemtext">{{ $detalhe->produto->nome}}</p></td>
                <td class="tableitem"><p class="itemtext">{{ $detalhe->quantidade}}</td>
                <td class="tableitem"><p class="itemtext">R${{ number_format ($detalhe->preco_unitario,2 )}}</td>
                <td class="tableitem"><p class="itemtext">{{ $detalhe->desconto ? '':'0'}}</td>
                <td class="tableitem"><p class="itemtext">R${{ number_format ($detalhe->montande,2 )}}</td>
               
                
                
              
            </tr>
            @endforeach
            <tr class="tabletitle">
                <td></td>
                <td></td>
                <td></td>
                
                <td></td>
                <td></td>
            </tr>
            <tr class="tabletitle">
                <td></td>
                <td></td>
                <td></td>
                <td class="avaliar"><h1>TOTAL:</h1></td>
                <td class="payment" style="font-size:2.0em"><h2>R$ {{ number_format ($pedidodetalhe->sum('montande'),2 )}}</h2></td>
            </tr>
            
        </table>
        @foreach($pedidotransacao as $pagamento)
        <p style=" line-height:0.2em">Forma de Pagamento: {{ $pagamento->metodo_pagamento}}</p>
        <p style=" line-height:0.2em">Troco R$: {{ number_format ( $pagamento->saldo,2)}}</p>

        @endforeach
        <div class="legalcopy" style=" margin-top:5mm;
    text-align:center">
            
        </div>
       
    </div>
</div>
</div>






<style>
#invoice-mani{
    
    margin: 0 auto;
    width: 190mm;
    background: #fff;
}

#invoice-mani ::selection{
    background: #f315f3;
    color: #fff;
}
#invoice-mani ::-moz-selection{
    background: #f315f3;
    color: #fff;
}
#invoice-mani h1{
    font-size: 1.5em;
    color:#222;
}
#invoice-mani h2{
    font-size: 0.7em;
}
#invoice-mani h3{
    font-size: 1.2em;
    font-weight:300;
    line-height:2em;
}
#invoice-mani p{
    font-size: 0.9em;
    line-height:0.9em;
    color:#666;
}
#invoice-mani #top, ##invoice-mani #mid, #invoice-mani #bot{
    border-bottom: 1px solid #eee;   
}
#invoice-mani #top{
    min-heigth: 100px ;    
}
#invoice-mani #mid{
    min-heigth: 80px ;    
}
#invoice-mani #bot{
    min-heigth: 50px ;    
}
/* #invoice-mani #top .logo{
    height: 60px;
    width: 60px;
    background-image:url()no-repeat;    
    background-size:60px 60px;
    border-radius:50px;    
} */
#invoice-mani .info{
    display: block;
    margin-left:0;
    text-align:center;      
}
#invoice-mani .title{
    float:right;
}
#invoice-mani .title p{
    text-align:right;
}
#invoice-mani table{
    width: 100%;
    border-collapse:collapse;
}
#invoice-mani .tabletitle{
    font-size: 0.7em;
    background:#eee;
}
#invoice-mani .service{
    border-bottom: 1px solid #eee;   
}
#invoice-mani .item{
    width: 24mm;
}
#invoice-mani .itemtext{
    font-size: 0.9em;
}
#invoice-mani #legalcopy{
    margin-top:5mm;
    text-align:center;
}
.serial-number{
    margin-top:5mm;
    margin-bottom:2mm;
    text-align:center;
    font-size:12px;
}
.serial{
    font-size:10px !important;
    
}
.botao1{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;   
    border-radius: 8px;
    transition: all 0.5s;
  cursor: pointer;
}
.botao2{
    background-color: #f44336; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;   
    border-radius: 8px;
    transition: all 0.5s;
  cursor: pointer;
}

.grupobotoes{
    text-align:center;
}
</style>
