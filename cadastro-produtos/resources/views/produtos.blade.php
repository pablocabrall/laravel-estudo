@extends('layout.app', ["current" => "produtos"])

@section('body')
   <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
        @if (count($produtos) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->estoque}}</td>
                            <td>{{$produto->preco}}</td>
                            <td>{{$produto->categoria_id}}</td>
                            <td>
                                <a href="/produtos/editar/{{$produto->id}}" class="btn btn-primary">Editar</a>
                                <a href="/produtos/apagar/{{$produto->id}}" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn bnt-sm btn-primary">Novo Produto</a>
        </div>
        
   </div>
@endsection