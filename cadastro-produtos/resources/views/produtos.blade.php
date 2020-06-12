@extends('layout.app', ["current" => "produtos"])

@section('body')
   <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <table class="table table-ordered table-hover" id="tabelaProdutos">
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
                <form class="form-horizontal" id="formproduto" >
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idproduto" class="form-control">
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" name="nome" id="nomeProduto" class="form-control" placeholder="Nome do Produto">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="preco" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" name="preco" id="precoProduto" class="form-control" placeholder="Preço do Produto">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="quantidade" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="number" name="quantidade" id="qtdProduto" class="form-control" placeholder="Quantidade do Produto">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="categoria" class="control-label">Categoria</label>
                            <div class="input-group">
                               <select class="form-control" name="categoria" id="categoria"></select>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" data-dismiss="modal" class="btn btn-primary">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
   </div>
@endsection  

@section('javascript')
    
    <script type="text/javascript">
        
        $.ajaxSetup({
            headers:{
                'x-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        }); 


        function novoProduto(){
            $('#idproduto').val('');
            $('#nomeProduto').val('teclado');
            $('#precoProduto').val(20);
            $('#qtdProduto').val(10);

            $('#dlgprodutos').modal('show');
        }


        function carregarCategorias(){
            $.getJSON('/api/categorias', function(data){
                for(i=0; i<data.length; i++){
                    option = '<option value="'+ data[i].id +'">' + data[i].nome + '</option>';
                    
                    $('#categoria').append(option);
                }
            });
        }

        function montarLinha(p){
            var linha = "<tr class='produto'>"+
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" + p.estoque + "</td>" +
            "<td>" + p.preco + "</td>" +
            "<td>" + p.categoria + "</td>" +
            "<td>" +  
                '<button class="btn btn-sm btn-primary" onclick="editarProduto(' + p.id + ' )">Editar</button>' +
                '   <button class="btn btn-sm btn-danger"  onclick="remove(this); removerProduto(' + p.id + ')" >Apagar</button>' +
             "</td>" +
            "<tr>";
            return linha;
        }

       function editarProduto(id){
            $.getJSON('/api/produtos/'+id, function(produtos){
                $('#idproduto').val(produtos.id);
                $('#nomeProduto').val(produtos.nome);
                $('#precoProduto').val(produtos.preco);
                $('#qtdProduto').val(produtos.estoque);
                $('#categoria').val(produtos.categoria);

                $('#dlgprodutos').modal('show');
            });
        }

        function carregarProdutos(){
            $.getJSON('/api/produtos', function(produtos){
                for (i = 0; i<produtos.length; i++) {
                   var  linha = montarLinha(produtos[i]);
                    $('#tabelaProdutos>tbody').append(linha);          
                }
            });
        }

        function salvarProduto(){
            produtos = {
                id: $('#idproduto').val(),
                nome: $("#nomeProduto").val(),
                preco: $("#precoProduto").val(),
                quantidade: $("#qtdProduto").val(),
                categoria: $("#categoria").val()
            };

            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + produtos.id,
                context: this,
                data: produtos,
                success: function(data) {
                    produto = JSON.parse(data);
                    linhas = $("#tabelaProdutos>tbody>tr.produto");
                    
                    for(i=0; i<linhas.length; i++){ 
                        if(linhas[i].cells[0].textContent == produtos.id){ 
                             e = linhas[i]
                             console.log(e.cells[0].textContent);
                      }
                    }


                    if(e){
                        e.cells[0].textContent = produto.id;
                        e.cells[1].textContent = produto.nome;
                        e.cells[2].textContent = produto.estoque;
                        e.cells[3].textContent = produto.preco;
                        e.cells[4].textContent = produto.categoria;
                    }
                    console.log('salvo com sucesso')
                        
                },
                error: function(error){
                    console.log(error)
                }
            })

        }   
        function criarProduto(){    
            produtos = {
                nome: $("#nomeProduto").val(),
                preco: $("#precoProduto").val(),
                quantidade: $("#qtdProduto").val(),
                categoria: $("#categoria").val()
            }

            $.post("/api/produtos", produtos, function(data){
               var produto = JSON.parse(data);
                var linha = montarLinha(produto);
                $('#tabelaProdutos>tbody').append(linha);          
            
            });
        }



        function removerProduto(id){
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function() {
                    
                    console.log('removido com sucesso')
                        
                },
                error: function(error){
                    console.log(error)
                }
            })
        }

        (function($) {
        remove = function(item) {
            var tr = $(item).closest('tr');

            tr.fadeOut(400, function() {
            tr.remove();  
         });

            return false;
        }
        })(jQuery);

        $("#formproduto").submit(function(event){
            event.preventDefault();
            
            if($('#idproduto').val() != ''){
                salvarProduto();
                
             } else {
                criarProduto();
                
             }
            
            $("#dlgprodutos").modal('hide');
        })  
    



        $(function(){
            carregarCategorias();
            carregarProdutos();
        })

    </script>
@endsection