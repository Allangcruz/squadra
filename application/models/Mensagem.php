<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem extends CI_Model{

    public static function MN001() 
    {
        return 'Nenhum Sistema foi encontrado. Favor revisar os critérios da sua pesquisa!';
    }

    public static function MN002() 
    {
        return 'Operação realizada com sucesso.';
    }    
    
    public static function MN003() 
    {
        return 'Dados obrigatórios não informados.';
    }

    public static function MN004() 
    {
        return 'E-mail inválido.';
    }

}
