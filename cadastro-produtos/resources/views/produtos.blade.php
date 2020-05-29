@extends('layout.app', ["current" => "produtos"])

@section('body')
   <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
              
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" onclick="novoProduto();">Novo Produto</button>
        </div>        
   </div>
   <div class="modal" tabindex="-1" role="dialog" id="dlgprodutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formproduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idproduto" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Nome do Produto">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="text" name="precoProduto" id="precoProduto" class="form-control" placeholder="Preço do Produto">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="qtdProduto" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="number" name="qtdProduto" id="qtdProduto" class="form-control" placeholder="Quantidade do Produto">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Categoria</label>
                            <div class="input-group">
                               <select class="form-control" name="categoriaProduto" id="categoriaProduto"></select>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" data-dissmiss="modal" class="btn btn-primary">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
   </div>
@endsection  

@section('javascript')
    
    <script type="text/javascript">

        function novoProduto(){
            $('#idproduto').val('');
            $('#nomeProduto').val('');
            $('#precoProduto').val('');
            $('#qtdProduto').val('');

            $('#dlgprodutos').modal('show');
        }

        function carregarCategorias(){
            $.getJSON('/api/categorias', function(data){
                for(i=0; i<data.length; i++){
                    option = '<option value="'+ data[i].id +'">' + data[i].nome + '</option>';
                    
                    $('#categoriaProduto').append(option);
                }
            })
        }

        $(function(){
            carregarCategorias();
        })

    </script>
@endsection