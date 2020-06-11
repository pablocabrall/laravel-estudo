<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;
use App\Categoria;

class ControllerProduto extends Controller
{
    public function indexView()
    {
        
        $produtos = Produto::all(); 
        return view('produtos', compact('produtos'));
    }

    public function index()
    {
        $prods = Produto::all(); 
        return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('novo_produto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->estoque = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        $produto->categoria = $request->input('categoria');
        $produto->save(); 
        
        return json_encode($produto);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            return json_encode($produto);
        }

        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        if(isset($produto)){
            return view('editar_produtos', compact('produto','categorias'));
        }



        return redirect('/produtos');
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $produto = Produto::find($id);

       if(isset($produto)){
        $produto->nome = $request->input('nome');
        $produto->estoque = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        $produto->categoria = $request->input('categoria');
        $produto->save(); 
        
        return json_encode($produto); 
       }

       return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            $produto->delete();
            return response('OK', 200);
        }
        return response('Produto não encontrado', 404);
        
    }
}
