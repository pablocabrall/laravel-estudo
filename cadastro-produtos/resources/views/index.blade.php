@extends('layout.app', ["current"=>"home"])

@section('body')
    <div class="jumbotron bg-light border border-secundary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui você cadastra todas os seus produtos.
                        </p>
                        <a href="/produtos" class="btn btn-primary">cadastre seus produtos</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                            cadastre as categorias dos seus produtos.
                        </p>
                        <a href="/categorias" class="btn btn-primary">cadastre seus produtos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection