function removerNotificacao(seletor) {
    $(seletor).html('');
    $(seletor).removeClass('ls-alert-success ls-sm-space');
    $(seletor).removeClass('ls-alert-danger ls-sm-space');
    $(seletor).removeClass('ls-alert-warning ls-sm-space');
}

function notificacao(msg, seletor) {
    removerNotificacao(seletor);

    $(seletor).html('<span onclick="removerNotificacao(\'' + seletor + '\')" data-ls-module="dismiss" class="ls-dismiss"><b style="color:#000;">&times;</b></span>'+msg.texto);

    switch(msg.tipo){
        case "a":
            $(seletor).addClass('ls-alert-warning ls-sm-space');
        break;
     
        case "e":
            $(seletor).addClass('ls-alert-danger ls-sm-space');
        break;
     
        case "s":
            $(seletor).addClass('ls-alert-success ls-sm-space');
        break;
    }

}