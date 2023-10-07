<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\Pedido;


class clientescontroller extends Controller
{
    public function index() {
        $clientes = cliente::all();  
        //$orders = Pedido::all();
        //dd($clientes);       
        return view('clientes.index',['clientes'=>$clientes]);
    }
    public function create() {
         return view('clientes.create');
    }
    public function store(Request $request) {
        cliente::create($request->all());
        return redirect()->route('clientes.index');
    }
    public function edit($id) {
        $cliente = cliente::where('id',$id)->first();
        if(!empty($cliente)){
        return view('clientes.edit',['clientes'=>$cliente]);    
        } else {
          return redirect()->route('clientes.index');  
        }
        
    }
    
    public function update(Request $request, $id) {
        $bancomani =[
         'nome'=> $request->nome,
         'endereco'=> $request->endereco,
         'numero'=> $request->numero,
         'bairro'=> $request->bairro,
         'telefone'=> $request->telefone,
         'pontoreferencial'=> $request->pontoreferencial,
        ];
        cliente::where('id',$id)->update($bancomani); 
       return redirect()->route('clientes.index');  
    }
    public function destroy($id) {
        cliente::where('id',$id)->delete(); 
       return redirect()->route('clientes.index');
    }
}
