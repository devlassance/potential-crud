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
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
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
        $.ajax({
            url: '{{route('api.all')}}',
            type: "get",
            dataType: 'json',
            success: function(response){

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
                    '<tr><td>' + item.nome + '</td><td>' + item.sexo + '</td><td>' + item.idade + '</td> <td>' + item.hobby + '</td><td>' + newDate + '</td><td><a href="http://localhost:7000/api/dev/'+item.id+'" type="button" class="btn btn-success btn-sm">Editar</a> - <a href="http://localhost:7000/api/dev/'+item.id+'" type="button" class="btn btn-danger btn-sm">Excluir</a></td></tr>';
                });
                $('.loading-table').css('display','none');
                $('#body-table-devs').append(trHTML);
            }
         });
    });
</script>
</html>