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
                        <table class="table table-bordered table-hover" id="tableprodutos">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>Endereço</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->nome}}</td>
                                        <td>{{$c->idade}}</td>
                                        <td>{{$c->endereco}}</td>
                                        <td>{{$c->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="{{asset('../js/app.js')}}" type="text/javascript"></script>
</body>
</html>