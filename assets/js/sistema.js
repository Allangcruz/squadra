/** 
 * Arquivo "sistema", possui as funções de beforeSend  e callback das requisições
 * relacionada com a entidade sistema
 * Versão: 1.0.0
 * Data: 14/01/2016
 * Desenvolvedor: Allan Gonçalves da Cruz <allangcruz@gmail.com>
 * ************************************************************************** */

$(document).ready(function() {

    //regras de validacao do formulario
    var validacao = $('#form_sistema').validate({
      rules: {
        descricao: { required: true},
        sigla: { required: true},
      },
      messages: {
        descricao: { required: 'Preencha o campo Descrição' },
        sigla: { required: 'Preencha o campo Sigla' },
      }
    });
    
    //exibi a funcionalidade de adicionar
    $('.novo-cadastro').click(function(){
        showViewForm();
        $('#id').val('');
        refreshForm('#form_sistema');
    });

    //realiza a operação de salvar
    $('.salvar-sistema').click(function(){
        if($("#form_sistema").valid()){

            if($('#id').val() == '') {
                salvar_alterar('#form_sistema', 'create', 'json',antesEnviar('#resposta','#load'),retornoSalvar);
            } else {
                 salvar_alterar('#form_sistema', 'update', 'json',antesEnviar('#resposta','#load'),retornoAlterar);
            }
            
        } else {
            validacao.focusInvalid();
        }
    });

    $('#expressao').keyup(function() {
        //consultar('#form_sistema_consultar', 'read', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
    });    

    $('#filtro').change(function() {
        //consultar('#form_sistema_consultar', 'read', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
    });
});


/*
 | -------------------------------------------------------------------
 | Funções "retornoSalvar"
 | -------------------------------------------------------------------
 | Função que retorna resultado da função 'salvar'
 |
 */
function retornoSalvar(json, erro) {
    notificacao(json.msg, '#resposta');

    if(json.msg.tipo == "s"){
        consultar('#form_sistema_consultar', 'read', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
        refreshForm('#form_sistema');
        $('input[type=tel]').val('');
    }
    
    loading('#load', 0);

    $('html, body').animate({
        scrollTop: $('.view-form').offset().top
    }, 1000);
}

 /*
 | -------------------------------------------------------------------
 | Funções "retornoAlterar"
 | -------------------------------------------------------------------
 | Função que retorna resultado da função 'alterar'
 |
 */
function retornoAlterar(json, erro) {
    notificacao(json.msg, '#resposta');

    if(json.msg.tipo == "s") {
        consultar('#form_sistema_consultar', 'read', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
    }
    
    loading('#load', 0);

    $('html, body').animate({
        scrollTop: $('.view-form').offset().top
    }, 1000);
}


 /*
 | -------------------------------------------------------------------
 | Funções "retornoPesquisar"
 | -------------------------------------------------------------------
 | Função que retorna resultado da função 'readById', alem de preencher
 | os dados no formulario
 |
 */
function retornoPesquisar(json, erro) {
    removerNotificacao('#resposta');
    $('#id').val(json.id);
    $('#nome').val(json.nome);
    $('#email').val(json.email);
    $('#telefone').val(json.telefone);
    $('#celular').val(json.telefone);

    showViewForm();
}  

//habilita a view do grid
function showViewGrid()
{
    $('.view-grid').removeClass('ls-display-none');  
    $('.view-form').addClass('ls-display-none');
    $('.view-detail').addClass('ls-display-none');
}

//habilita a view do formulario
function showViewForm()
{
    $('.view-form').removeClass('ls-display-none');
    $('.view-grid').addClass('ls-display-none');
    $('.view-detail').addClass('ls-display-none');
    
    removerNotificacao('#resposta');
}
