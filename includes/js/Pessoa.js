
$(document).ready(function (){

    /*************  Inicio tela buscar pessoas ****************/
    $('#buscar').click(function (e){

        e.preventDefault();

        var dados = $('#formBuscar').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + 'Pessoa/buscarPessoas',
            async: true,
            data: dados,
            success: function(response) {
                $('#resultBusca').html(response)
            }
        });
    });


    $(document).on('click', '.editarPessoa', function(){ 
        var id = $(this).data("id");
        var url = base_url + 'cad_pessoa/' + id
        window.location.href = url
    });   


    $(document).on('click', '.excluirPessoa', function(){ 
        var id = $(this).data("id")
        var elem = $(this)

        bootbox.confirm({
            title: "Excluir pessoa?",
            message: "Você realmente quer excluir esta pessoa? Esta alteração não pode ser desfeita.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Não'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Sim'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: base_url + 'Pessoa/excluir/' + id,
                        async: true,
                        data: {'id': id},
                        success: function(response) {
                                if(response){
                                    var qtdLinha = $('.table tbody tr').length;
                                    if(qtdLinha > 1){
                                        elem.closest('tr').remove()
                                    }
                                    else{
                                        $('#resultBusca').html('')
                                    }
                                    
                                }
                                else{
                                    bootbox.alert('<br><div class="alert alert-danger" role="alert"><i class="fa fa-check-circle"></i> Ocorreu um erro, por favor tente novamente!</div>', function(){
                                        location.reload();
                                    })
                                }
                        }
                    });
                }
            }
        });
 
        
    });


    $('#novo').click(function (e){
        e.preventDefault();
        var url = base_url + 'cad_pessoa'
        window.location.href = url
    }); 
    /*************  Fim tela buscar pessoas *******************/

    

    /*************  Inicio tela salvar/editar pessoa **************/
    $('#voltar').click(function (){
        var url = base_url + 'buscar_pessoa/'
        window.location.href = url
    });
    
    
    $('#gravarPessoa').click(function (e){
        e.preventDefault();

        var campo = ''

        if($('#nome').val().trim() == ''){
            campo = 'nome'
        }
        else if($('#sexo').val().trim() == ''){
            campo = 'sexo'
        }
        else if($('#cidade').val().trim() == ''){
            campo = 'cidade'
        }
        else if($('#email').val().trim() == '' || !validaEmail($('#email').val())){
            campo = 'email'
        }
        else if($('#senha').val().trim() == ''){
            campo = 'senha'
        }   

        if(campo){
            bootbox.alert('<br><div class="alert alert-danger" role="alert"><i class="fa fa-check-circle"></i> Informe um valor válido para o campo ' + campo + '!</div>')
            return
        }
           
        var dados = $('#formPessoa').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $("#formPessoa").attr("action"), //base_url + 'Pessoa/gravarPessoa',
            async: true,
            data: dados,
            success: function(response) {
                bootbox.alert(response.msg, function(){
                    var url = base_url + 'cad_pessoa/' + response.id
                    window.location.href = url
                })
            },
            error: function (request, status, error) {
                bootbox.alert(request.responseText);
            }
        });
    });


    function validaEmail(email) {
        var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return regex.test(email);
    }
    /*************  Fim tela salvar/editar pessoa ****************/
});

