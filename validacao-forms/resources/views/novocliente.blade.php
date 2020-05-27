<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Clientes</title> 
    <link rel="stylesheet" href="{{asset('../css/app.css')}}">
    
    <style>
        body {
            padding: 20px;
        }
    </style>
    
</head>
<body>
    
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Clientes
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" placeholder="Nome">
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">
                            {{$errors->first('nome')}}        
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <input type="number" id="idade" name="idade" class="form-control" placeholder="Idade">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>
                    
                @if ($errors->any())
                    <div class="card-footer">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach    
                    </div>
                @endif
                    
                </div>
            </div>
        </div>
    </main>


    <script src="{{asset('../js/app.js')}}" type="text/javascript"></script>
</body>
</html>