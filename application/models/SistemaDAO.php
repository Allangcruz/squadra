<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SistemaDAO extends CI_Model {

    protected $tabela = 'sistema';

    //conta para gerar a paginacao
    public function countAll($filtro, $descricao)
    {
        $this->db->from($this->tabela);
        
        switch($filtro)
        {
            case '0':
                $this->db->like('descricao', $descricao);
            break;
                
            case '1':
                $this->db->like('sigla', $descricao);
            break;            

            case '2':
                $this->db->like('email', $descricao);
            break;
                
            default:
                $this->db->like('descricao', $descricao);
            break;
            
        }

        return $this->db->count_all_results();        
    }


    //retorna todos os dados necessarios
    public function listAll($filtro, $descricao, $limite, $apartir) 
    {
        $this->db->select("id, descricao, sigla, email");
        $this->db->order_by('id desc');

        switch($filtro)
        {
            case '0':
                $this->db->like('descricao', $descricao);
            break;
                
            case '1':
                $this->db->like('sigla', $descricao);
            break;            

            case '2':
                $this->db->like('email', $descricao);
            break;
                
            default:
                $this->db->like('descricao', $descricao);
            break;
            
        }

        //teste se é para pesquisar todos, ou com limite
        if($limite) {
            return $this->db->get($this->tabela, $limite, $apartir)->result();
        } else {
            return $this->db->get($this->tabela)->result();
        }    
    }


}