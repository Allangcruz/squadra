<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------
  | Class->Model "UsuarioDAO"
  | -------------------------------------------------------------------
  | Model que implemnta as funcionalidade da entidade Usuario
  | url: ./application/model/usuariodao.php
  | @author Allan gonçalves da cruz <allangcruz@gmail.com>  
  | @version 1.0.0
  |
 */
class UsuarioDAO extends CI_Model {

    protected $tabela = 'dbusuario';

    /*
     | -------------------------------------------------------------------
     | Metodo "consultarEmail"
     | -------------------------------------------------------------------
     | Metodo que consulta uma usuario especifico´para a autenticação
     |
    */
    function consultarEmail($tabela,$email) 
    {
        $this->db->where('deleted', '0');
        $this->db->where('email', $email);
        $query = $this->db->get($tabela);

        if($query->result())
          return $query->result();
        else
          return false;
    }

    /*
     | -------------------------------------------------------------------
     | Metodo "getUsuario"
     | -------------------------------------------------------------------
     | Metodo que consulta uma usuario especifico´para a autenticação
     |
    */
    function getUsuario($id) 
    {
        $sql = 'select 
                    t1.id,t1.nome,t1.nascimento,t1.sexo,t1.perfil,t1.email,t1.senha,t1.telefone1,t1.telefone2,t1.confirma_email,t1.site,
                    t2.endereco,t2.complemento,t2.bairro,t2.cep,
                    t2.cidade_id,t4.nome cidade,
                    t4.estado as estado_id,t5.nome estado,
                    t3.id as vet_id ,t3.crmv
                from dbusuario t1
                left join dbendereco t2 on (t1.id=t2.usuario_id)
                left join dbveterinario t3 on (t1.id=t3.usuario_id)
                inner join dbcidade t4 on (t2.cidade_id = t4.id)
                inner join dbestado t5 on (t4.estado=t5.id)
                where t1.deleted = 0 and t1.id = ?';
        $query = $this->db->query($sql, array($id));
        
        if($query->result())
          return $query->result();
        else
          return false;
    }

     /*
     | -------------------------------------------------------------------
     | Metodo "update"
     | -------------------------------------------------------------------
     | Metodo que altera valores no banco de dados
     | @param : $table => nome da tabela.
     | @param : $array => vetor com os chave e valor, principalmente a primary key.
     | @return : retona true ou false
     |
    */    
    public function update($table, $array) 
    {
        $this->db->where('usuario_id', $array['usuario_id']);
        $this->db->update($table, $array);
        
        if($this->db->affected_rows()>0)
            return true;
        else
            return false; 
    }

    //Consulta todos os estados existe
    public function getEstados(){
        $this->db->order_by('id','asc');          
        $result =  $this->db->get('dbestado')->result();

        $estados = '';

        foreach ($result as $value) {
            $estados .= '<option value="' . $value->id . '">' . $value->nome . ' </option>  ';
        }

        return $estados;
    }

    //Consulta todos os estados existe
    public function getCidade($id){
        $this->db->where('estado', $id);
        $this->db->order_by('id','asc');          
        return $this->db->get('dbcidade')->result();
    }

    //conta para gerar a paginacao
    public function countAll($filtro, $descricao)
    {
        $this->db->from($this->tabela);
        $this->db->where('deleted', '0');
        
        switch($filtro)
        {
            case '0':
                $this->db->like('nome', $descricao);
            break;
                
            case '1':
                $this->db->like('email', $descricao);
            break;            

            case '2':
                $this->db->like('telefone1', $descricao);
            break;
                
            default:
                $this->db->like('nome', $descricao);
            break;
            
        }

        return $this->db->count_all_results();        
    }

    //retorna todos os dados necessarios
    public function listAll($filtro, $descricao, $limite, $apartir) 
    {
        $this->db->select("id, nome, email, perfil, telefone1, telefone2");
        $this->db->where('deleted', '0');
        $this->db->order_by('id desc');

         switch($filtro)
        {
            case '0':
                $this->db->like('nome', $descricao);
            break;
                
            case '1':
                $this->db->like('email', $descricao);
            break;

            case '2':
                $this->db->like('telefone1', $descricao);
            break;

            default:
                $this->db->like('nome', $descricao);
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