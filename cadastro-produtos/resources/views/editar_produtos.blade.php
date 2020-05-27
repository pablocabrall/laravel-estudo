@extends('layout.app', ["current" => "produtos"])

@section('body')
	
    <div class="card border">
        <div class="card-body">
            <form action="/produtos/{{$produto->id}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome Produto</label>
                    <input type="text" class="form-control" value="{{$produto->nome}}" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                    
                    <label for="nomeProduto">Quantidade em Estoque Produto</label>
                    <input type="text" class="form-control" value="{{$produto->estoque}}" name="estoqueProduto" id="estoqueProduto" placeholder="Quantidade">
                    
                    <label for="nomeProduto">Preco</label>
                    <input type="text" class="form-control" name="precoProduto" value="{{$produto->preco}}" id="precoProduto" placeholder="Preço">
                    
                    <label for="nomeProduto">Categoria</label>
                    <select class="form-control form-control-sm" name="categoriaProduto" value="{{$produto->categoria_id}}" id="categoriaProduto">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>    
                        @endforeach    
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection

