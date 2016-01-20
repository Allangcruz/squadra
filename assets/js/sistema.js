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
        validacao.resetForm();
        refreshForm('#form_sistema');
    });

    //realiza a operação de salvar
    $('.salvar-sistema').click(function(){
        var desabilitado = $(this).attr('disabled');
        
        if(desabilitado == undefined){
        
            if($("#form_sistema").valid()){

                if($('#id').val() == '') {
                    salvar_alterar('#form_sistema', 'incluir', 'json', antesEnviar('#resposta','#load'), retornoSalvar);
                } else {
                     salvar_alterar('#form_sistema', 'alterar', 'json', antesEnviar('#resposta','#load'), retornoAlterar);
                }

            } else {
                validacao.focusInvalid();
            }
            
        }
    });

    consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
    
    $('#expressao').keyup(function() {
        consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
    });    

    $('#filtro').change(function() {
        consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
    });
});


/*
 | -------------------------------------------------------------------
 | Funções "retornoSalvar"
 | -------------------------------------------------------------------
 | Função que retorna resultado da função 'salvar'
 |
 */
function retornoSalvar(json, erro) 
{
    notificacao(json.msg, '#resposta');

    if(json.msg.tipo == "s"){
        consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
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
function retornoAlterar(json, erro) 
{
    notificacao(json.msg, '#resposta');

    if(json.msg.tipo == "s") {
        consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
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
 | Função que retorna resultado da função 'pesquisarById', alem de preencher
 | os dados no formulario
 |
 */
function retornoPesquisarPorId(json, erro) 
{
    removerNotificacao('#resposta');
    
    for(var index in json) {
        $('#'+index).val(json[index]);
    }
    
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

//limpa a consulta
function limpar()
{
    refreshForm('#form_sistema_consulta');
    consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
}
