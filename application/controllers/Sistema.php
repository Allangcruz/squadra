<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Sistema extends CI_Controller {
    private $tabela = 'sistema';

    function __construct() 
    {
        parent::__construct();
        $this->load->model('Crud', '', true);
        $this->load->model('Util', '', true);
        $this->load->model('Mensagem', '', true);
        $this->load->model('SistemaDAO', '', true);
    }
    
	public function index()
	{
		$this->load->view('header', ['title' => 'Manter Sistema']);
		$this->load->view('side-bar');
		$this->load->view('sistema');
		$this->load->view('footer');
	}

    //Seta as regras de validações dos campos
    public function setRegrasValidacao()
    {
        $this->form_validation->set_rules('descricao', '<b>Descrição</b>', 'trim|required');
        $this->form_validation->set_rules('sigla', '<b>Sigla</b>', 'trim|required');
        $this->form_validation->set_rules('email', '<b></b>', 'trim|valid_email');

        $this->form_validation->set_error_delimiters('<span>', '</span>');        
    }         
    
    //pega todos os dados necessarios da view
    private function getDados()
    {    
        $sistema = [
            'id' => $this->input->post('id'),
            'descricao' => $this->input->post('descricao'),
            'email' => $this->input->post('email'),
            'sigla' => $this->input->post('sigla'),
            'url' => $this->input->post('url'),
            'updated_at' => date("Y-m-d H:i:s")  
        ];
        
        if($this->input->post('id') != '')
        {
            $sistema['status'] = $this->input->post('status'); 
            
            if($this->input->post('justificativa') != '')
            {
                $sistema['justificativa'] = $this->input->post('justificativa');
            }
        }
              
        return $sistema;
    }
    
    //salva o registro no banco
    public function incluir()
    {
        try {
            
            $data = array();

             //Seta as validações
             $this->setRegrasValidacao();   

            //Testa as validações
            if ($this->form_validation->run() === false) {
                $data['msg'] = array('tipo' => 'e', 'texto' => validation_errors());
            } else {
                
                //pega todos os dados necessarios da view
                $sistema = $this->getDados();
                
                //grava o sistema
                if(!$this->Crud->create($this->tabela, $sistema, false)) {
                  $data['msg'] = array('tipo' => 'e', 'texto' => 'Erro ao incluir o sistema');
                }else {
                  $data['msg'] = array('tipo' => 's', 'texto' => Mensagem::MN002());
                }
            }
            
        } catch (Exception $exc) {
            $data['msg'] = array('tipo' => 'e', 'texto' => $exc->getMessage());
        }
        
        echo json_encode($data);    
    }
    
    
    public function pesquisar($offset = 0)
    {
        try {
             
            $filtro = $this->input->post('filtro');
            $descricao = $this->input->post('expressao');
            
            $limite =  10;
            $config['base_url'] = site_url('sistema/pesquisar/');
            $config['total_rows'] = $this->SistemaDAO->countAll($filtro, $descricao);
            $config['per_page'] = $limite;
            $config['show_count'] = true;
            $config['div'] = '#resposta_consulta'; 

            $this->jquery_pagination->initialize($config);
            $dados['paginacao'] = $this->jquery_pagination->create_links();

            $resultado = $this->SistemaDAO->listAll($filtro, $descricao, $limite, $offset);

            if ($resultado == null) {
                echo '<b>'.Mensagem::MN001().'<b/>';
            } else {
                $this->table->set_template(array('table_open'=>'<table class="ls-table ls-table-bordered ls-sm-space ls-bg-header">'));
                $this->table->set_empty('');//Se a tabela estiver vazia
                $this->table->set_heading('Descrição', '<b class="ac-align-center">Sigla</b>', '<b class="ac-align-center">E-mail</b>', '<b class="ac-align-center">Status</b>', '<b class="ac-align-right">Ações</b>');//Cria o cabeçalho

                //exibe a lista de pessoa           
                foreach ($resultado as $value) {

                $this->table->add_row(
                        $value->descricao,
                        '<span class="ac-align-center">'.$value->sigla.'</span>',
                        '<span class="ac-align-center">'.$value->email.'</span>',
                        '<span class="ac-align-center">'.$value->status.'</span>',
                        '<a class="ac-align-right ac-btn-right ls-btn ls-btn-xs" href="javascript:pesquisar(\'#form_sistema_consulta\',\'pesquisarPorId/'.$value->id.'\',\'json\', function(){}, retornoPesquisarPorId);" title="Alterar" ><i class="ls-ico-pencil"></i></a>'
                  );           
                }
          
                //gera a tabela e a paginação    
                echo $this->table->generate();
                echo $dados['paginacao'];
            }
        } catch (Exception $exc) {
            echo 'Erro Sala->controller->consultar: ' . $exc->getMessage();
        }        
    }
    
    
    public function pesquisarPorId($id)
    {
        $data = array();

        try {

            $pessoa = $this->SistemaDAO->pesquisarPorId($id);

            if(!$pessoa){
                $data['msg'] = array('tipo' => 'e', 'texto' => 'O registro com codigo <b>'.$id.'</b> não existe!');
            }else {              
                $data = $pessoa;
            }

        } catch (Exception $exc) {
            $data['msg'] = array('tipo' => 'e', 'texto' => $exc->getMessage());
        }

        echo json_encode($data);    
    }
    
    
    public function alterar()
    {
        try {
            $data = array();

             //Seta as validações
             $this->setRegrasValidacao();   

            //Testa as validações
            if ($this->form_validation->run() === false) {
                $data['msg'] = array('tipo' => 'e', 'texto' => validation_errors());
            } else {
                
                //pega todos os dados necessarios da view
                $sistema = $this->getDados();
                
                //grava o endereco
                if(!$this->Crud->update($this->tabela, $sistema)) {
                  $data['msg'] = array('tipo' => 'e', 'texto' => 'Erro ao alterar sistema');
                }else {
                  $data['msg'] = array('tipo' => 's', 'texto' => Mensagem::MN002());
                }

            }
            
        } catch (Exception $exc) {
            $data['msg'] = array('tipo' => 'e', 'texto' => $exc->getMessage());
        }
        
        echo json_encode($data);        
    } 

}
