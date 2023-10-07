<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\produto;


class produtocontroller extends Controller
{
    public function index()
    {
        $products = produto::all();
        return view('produtos.index',['produtos'=>$products]);
        //$products = produto::latest()->paginate(2);
        //return view('produtos.CadProdutos')->with('produtos',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $image_pach='';
        if ($request->hasFile('image')){
            $image_pach=$request->file('image')->store('products');
        }
        produto::create($request->all());
        return redirect()->route('produtos.index');
        //$produto = produtos::create([
        // 'nome' => $request->nome,
        // 'descricao'=> $request->descricao,
        //'image'=> $image_pach,
        // 'barcode'=> $request->barcode,
        // 'preco'=>$request->preco, 
        //]);
        //if (! $produto){
        //    return redirect()->back()->with('erro','Desculpe, houve um erro ao cadastrar o produto');
        //}
        //return redirect()->route('produtos.CadProdutos')->with('success','Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = produto::where('id',$id)->first();
        if(!empty($produto)){
        return view('produtos.edit',['produtos'=>$produto]);    
        } else {
          return redirect()->route('produtos.index');  
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bancomani =[
            'nome'=> $request->nome,
            'quantidade'=> $request->quantidade,
            'preco'=> $request->preco
           ];
           produto::where('id',$id)->update($bancomani); 
          return redirect()->route('produtos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produto::where('id',$id)->delete(); 
       return redirect()->route('produtos.index');
    }
}
