<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Potential Crud</title>
</head>
<body>

    <div class="mynav">Potential Crud</div><br>        

    <div class="mycontainer">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerDev">
            Cadastrar um desenvolvedor
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="registerDev" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Formulário de Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="form_registerUser">
                            @csrf
                            <div class="mb-3">
                              <label for="nome_input" class="form-label">Nome</label>
                              <input type="text" class="form-control" id="nome_input" name="nome" required="required" maxlength="100">
                            </div>
                            <div class="mb-3">
                              <label for="sexo_input" class="form-label">Sexo</label>
                              <select name="sexo" id="sexo_input" class="form-control" required="required" maxlength="11">
                                <option value="">--</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">Outro</option>
                              </select>
                            </div>
                            <div class="mb-3">
                                <label for="idade_input" class="form-label">Idade</label>
                                <input type="number" class="form-control" id="idade_input" name="idade" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="hobby_input" class="form-label">Hobby</label>
                                <input type="text" class="form-control" id="hobby_input" name="hobby" required="required" maxlength="300">
                            </div>
                            <div class="mb-3">
                                <label for="datanasc_input" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="datanasc_input" name="datanascimento" required="required">
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar Formulário</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="EditDev" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Formulário de Edição</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="form_EditUser">
                            @csrf
                            <div class="mb-3">
                              <label for="nome_input_edit" class="form-label">Nome</label>
                              <input type="text" class="form-control" id="nome_input_edit" name="nome" required="required" maxlength="100">
                            </div>
                            <div class="mb-3">
                              <label for="sexo_input_edit" class="form-label">Sexo</label>
                              <select name="sexo" id="sexo_input_edit" class="form-control" required="required" maxlength="11">
                                <option value="">--</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">Outro</option>
                              </select>
                            </div>
                            <div class="mb-3">
                                <label for="idade_input_edit" class="form-label">Idade</label>
                                <input type="number" class="form-control" id="idade_input_edit" name="idade" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="hobby_input_edit" class="form-label">Hobby</label>
                                <input type="text" class="form-control" id="hobby_input_edit" name="hobby" required="required" maxlength="300">
                            </div>
                            <div class="mb-3">
                                <label for="datanasc_input_edit" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="datanasc_input_edit" name="datanascimento" required="required">
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar Formulário</button>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <table class="table table-dark table-striped" id="table_devs">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Sexo</th>
                <th scope="col">Idade</th>
                <th scope="col">Hobby</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody id="body-table-devs">
                <tr class="loading-table">
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
            </tbody>
          </table>

    </div>    
    @php
        
    @endphp
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
    $(function(){
        //requisição de todos desenvolvedores
        allDevs();

        //Interceptando form de adição de desenvolvedores
        $('form[name="form_registerUser"]').submit(function(e){
            e.preventDefault();
            //Usando ajax para registrar o desenvolvedor
            registerDev = $.ajax({type: "POST",url: "{{route('api.new')}}",data: $(this).serialize(),dataType: 'json',});

            registerDev.done(function (response){
                $('#registerDev').modal('hide');
                window.location.href = "{{route('index.app')}}";
                
            });
            //Caso o usuário apague manualmente as validações feitas no front
            registerDev.fail(function (jqXHR, textStatus, errorThrown){
                alert("Não edite a página via inspecionar!");
            });
        });

        //interceptando o botão excluir
        $(document).on('click', '.btnExcluir', function (event) {
            event.preventDefault();

            //pegando a url do mesmo armazenada no href
            urlDel = $(this).attr('href');

            deleteConfirm = confirm('Tem certeza que deseja excluir esse desenvolvedor?');

            if(deleteConfirm){
                //Deletando informação via ajax
                deleteDev = $.ajax({type: "DELETE",url: urlDel,dataType: 'json'});

                deleteDev.done(function (response){
                    window.location.href = "{{route('index.app')}}";
                });

                //Caso o usuário não exista no banco de dados
                deleteDev.fail(function (jqXHR, textStatus, errorThrown){
                    alert("Esse ID não está cadastrado");
                });
            }
            
        });

        //interceptando botão editar
        $(document).on('click', '.btnEditar', function (event) {
            event.preventDefault();
            urlEdit = $(this).attr('href');

            //buscando o desenvolvedor específico
            oneDev = $.ajax({
                url: urlEdit,
                type: "get",
                dataType: 'json'
                });


            //atualizando o desenvolvedor caso o id seja valido
            oneDev.done(function (response){

                $('#EditDev').modal('show');

                sexo = response.message.sexo;

                switch (sexo) {
                    case 'masculino':
                        var newOptions = {
                            "masculino": "checked",
                            "feminino": "",
                            "outro": ""
                        };
                    break;
                    case 'feminino':
                        var newOptions = {
                            "masculino": "",
                            "feminino": "checked",
                            "outro": ""
                        };
                    break;
                    default:
                    var newOptions = {
                            "masculino": "",
                            "feminino": "",
                            "outro": "checked"
                        };
    
                }

                selectSexo = $("#sexo_input_edit");
                selectSexo.empty();
                $.each(newOptions, function(key,value) {
                    if (!value){
                        selectSexo.append($("<option></option>").attr("value", key).text(key));
                    }else{
                        selectSexo.append($("<option selected='selected'></option>").attr("value", key).text(key));
                    }
                    
                });

                $('form[name="form_EditUser"]').find("input[type=text][name=nome]").val(response.message.nome);
                $('form[name="form_EditUser"]').find("input[type=number][name=idade]").val(response.message.idade);
                $('form[name="form_EditUser"]').find("input[type=text][name=hobby]").val(response.message.hobby);
                $('form[name="form_EditUser"]').find("input[type=date][name=datanascimento]").val(response.message.datanascimento);


                $('form[name="form_EditUser"]').submit(function(e){
                    e.preventDefault();

                    //enviando informações para editar o desenvolvedor final validado 
                    editDev = $.ajax({
                        type: "PUT",
                        url: urlEdit,
                        data: $(this).serialize(),
                        dataType: 'json'
                    });

                    editDev.done(function (response){
                        $('#EditDev').modal('hide');
                        window.location.href = "{{route('index.app')}}";
                        
                    });
                    //Caso o usuário tenha editado o front responsável por validação 
                    editDev.fail(function (jqXHR, textStatus, errorThrown){
                        alert("Não edite a página via inspecionar!");
                    });
                    
                    
                });

                //Caso o desenvolvedor não exista no banco de dados
                oneDev.fail(function (jqXHR, textStatus, errorThrown){
                    alert("Esse ID não está cadastrado");
                })


            });



        });

        //funtion responsável pelo get inicial que busca todos os desenvolvedores no banco
        function allDevs(){
            allDevs = $.ajax({url: '{{route('api.all')}}',type: "get",dataType: 'json'});
        
            allDevs.done(function (response){
                var trHTML = '';
                    $.each(response.message, function (i, item) {
                        //Convertendo data de nascimento para o formato brasileiro
                        var userDate = item.datanascimento;
                        var date    = new Date(userDate),
                        month = date.getMonth();
                        month++;

                        day = date.getDate();
                        day++;

                        yr      = date.getFullYear(),
                        month   = month < 10 ? '0' + month : month,
                        day     = day  < 10 ? '0' + day  : day,

                        newDate = day + '/' + month + '/' + yr;

                        trHTML += 
                        //Imprimindo no html da table os dados vindos da api
                        '<tr><td>' + item.nome + '</td><td>' + item.sexo + '</td><td>' + item.idade + '</td> <td>' + item.hobby + '</td><td>' + newDate + '</td><td><a href="http://localhost:7000/api/dev/'+item.id+'" type="button" class="btn btn-success btn-sm btnEditar">Editar</a> - <a  type="button" href="http://localhost:7000/api/dev/'+item.id+'" class="btn btn-danger btn-sm btnExcluir">Excluir</a></td></tr>';
                    });
                    $('.loading-table').css('display','none');
                    $('#body-table-devs').append(trHTML);
            });

        }
    
    });   
</script>
</html>