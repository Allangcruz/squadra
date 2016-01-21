/** 
 * Arquivo "sistema", possui as funções de beforeSend  e callback das requisições
 * relacionada com a entidade sistema
 * Versão: 1.0.0
 * Data: 14/01/2016
 * Desenvolvedor: Allan Gonçalves da Cruz <allangcruz@gmail.com>
 * ************************************************************************** */

$(document).ready(function() {

    //exibi a funcionalidade de adicionar
    $('.novo-cadastro').click(function(){
        showViewForm();
        $('#id').val('');
        refreshForm('#form_sistema');
    });

    //realiza a operação de salvar
    $('.salvar-sistema').click(function(){
        var desabilitado = $(this).attr('disabled');
        
        if(desabilitado == undefined){
        
            if($('#id').val() == '') {
                salvar_alterar('#form_sistema', 'incluir', 'json', antesEnviar('#resposta','#load'), retornoSalvar);
            } else {
                 salvar_alterar('#form_sistema', 'alterar', 'json', antesEnviar('#resposta','#load'), retornoAlterar);
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


//callback do funcao salvar
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


//callback da funcao alterar
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


//callback da funcao pesquisarPorId
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
    
    if($('#id').val() == ''){
        $('.view-controle-sistema').addClass('ls-display-none');
    } else {
        $('.view-controle-sistema').removeClass('ls-display-none');
    }
    
    removerNotificacao('#resposta');
}

//limpa a consulta
function limpar()
{
    refreshForm('#form_sistema_consulta');
    consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);
}
