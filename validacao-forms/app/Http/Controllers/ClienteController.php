<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $clientes =  Cliente::all();
      return view('clientes', compact('clientes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $regras = [
            'nome'=>'required|min:5|max:10|unique:clientes',
            'idade' =>'required',
            'endereco'=>'required',
            'email'=>'required|email'
        ];

        $mensagens = [
            'required'=> 'O atributo :attribute não pode estar em branco', // mensagem genérica
            'nome.required'=>  'O nome é requerido',
            'nome.min'=>'O nome deve conter no minimo 3 caracteres',
            'email.required'=> 'Digite um endereço de email',
            'email.email'=>'Digite um email válido'
        ];

        $request->validate($regras, $mensagens);
       /* $request->validate([
            'nome'=>'required|min:5|max:10|unique:clientes',
            'idade' =>'required',
            'endereco'=>'required',
            'email'=>'required|email'
            ]); // método para validação do campo 'nome'. 
        */

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->idade = $request->input('idade');
        $cliente->endereco = $request->input('endereco');
        $cliente->email = $request->input('email');

        $cliente->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
