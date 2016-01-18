<!-- Grid -->
<main class="ls-main" id="view-usuario" >
    <div class="container-fluid">
      <h1 class="ls-title-intro ls-no-margin-bottom">Usuários</h1>

      <div class="ls-box-filter hidden-print">
        <?php echo form_open('usuario', array('id' => 'form_usuario_consulta', 'class' => 'ls-form ls-form-inline'));?>
          <label class="ls-label col-md-2">
            <div class="ls-custom-select ls-field">
              <select name="filtro" id="filtro" class="ls-select">
                <option value="0">Nome</option>
                <option value="1">E-mail</option>
                <option value="2">Telefones</option>
              </select>
            </div>
          </label>

          <label class="ls-label col-md-4">
            <b class="ls-label-text ls-hidden-accessible">Nome do Usuário</b>
            <input type="text" id="descricao" name="descricao" placeholder="Nome do usuario" class="ls-field">
          </label>
          
          <div class="col-md-2 ls-actions-btn">
            <a href="#"  onclick="consultar('#form_usuario_consulta', 'consultar', 'html', function() {loading('#load_consulta', 1);}, retornoConsulta);" class="ls-btn ls-btn-sm" title="Buscar">Buscar</a>
            <a href="#" title="Cadastrar Novo" id="ac-novo" class="ls-btn-primary">Novo</a>
            &nbsp;<span id="load_consulta"></span>
          </div>  
        <?php echo form_close(); ?>

      </div>

      <!--Mensagem de exclusão-->
      <div id="resposta_excluir"></div>

      <!--Gera a tabela-->
      <div id="resposta_consulta"></div>
    </div>
</main>

<!--Formulario -->
<main class="ls-main" id="view-form-usuario" style="display:none;">
    <div class="container-fluid">
      <h1 class="ls-title-intro ls-no-margin-bottom">Cadastrar usuário</h1>

      <!-- Auxilia na navegação -->
      <ol class="ls-breadcrumb ls-no-margin-bottom">
        <li><a href="#" class="bc-voltar">Todos os usuários</a></li>
        <li>Cadastro</li>
      </ol>
      <br>

      <div id="resposta"></div>

      <?php echo form_open('usuario', array('id' => 'form_usuario', 'class' => 'ls-form ls-form-horizontal','data-ls-module'=>'form'));?>
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="vet_id" name="vet_id">
        <input type="hidden" id="existesenha" name="existesenha" value="1">

        <legend class="ls-title-4">Identificação</legend>

        <div class="row">
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text ac-req">Nome</span>
              <input type="text" id="nome" name="nome" maxlength="60">
            </label>
            
            <div class="ls-label col-md-3 col-xs-12">
              <b class="ls-label-text ac-req">Sexo:</b>
              <br>
              <label class="ls-label-text">
                <input type="radio" name="sexo" class="ls-field-radio" value="f">
                Feminino
              </label>
              <label class="ls-label-text">
                <input type="radio" name="sexo" class="ls-field-radio" value="m">
                Masculino
              </label>
              <b><label for="sexo" class="error"></label></b>
            </div>

            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">Nascimento</span>
              <input type="text" id="nascimento" name="nascimento" class="datepicker" placeholder="dd/mm/aaaa" maxlength="10" >
            </label>
        </div>

        <div class="row">
            <label class="ls-label col-md-4 col-xs-12">
              <span class="ls-label-text ac-req">Email</span>
              <input type="email" id="email" name="email">
            </label>

            <label class="ls-label col-md-2">
              <span class="ls-label-text ls-display-none" >
                  <a class="ls-btn ac-toggle-senha">Alterar Senha</a>
              </span>                  
            </label>

            <label class="ls-label col-md-3 col-xs-12 ac-password">
              <span class="ls-label-text ac-req">Senha</span>
                <input type="password" maxlength="20" id="senha" name="senha">
            </label>

            <label class="ls-label col-md-3 col-xs-12 ac-password">
              <span class="ls-label-text ac-req">Confirmar Senha</span>
                <input type="password" maxlength="20" id="cofsenha" name="cofsenha">
            </label>
        </div>   
             
        <div class="row">
            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">Perfil</span>
              <div class="ls-custom-select">
                  <select class="ls-select" id="perfil" name="perfil">
                      <option value="1">Veterinário </option>
                      <option value="0">Administrador </option>
                  </select>
              </div>
            </label>
            
            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">CRMV</span>
              <input type="number" id="crmv" name="crmv" maxlength="6">
            </label>

            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">Telefone 1</span>
              <input type="tel" id="telefone1" name="telefone1" max-length="14" class="ls-mask-phone8_with_ddd" placeholder="(00) 0000-0000">
            </label>

            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text">Telefone 2</span>
              <input type="tel" id="telefone2" name="telefone2" max-length="14" class="ls-mask-phone8_with_ddd" placeholder="(00) 0000-0000">
            </label>
        </div>

        <legend class="ls-title-4">Endereço</legend>

        <div class="row">
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text ac-req">Endereco</span>
              <input type="text" id="endereco" name="endereco">
            </label>
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text">Complemento</span>
              <input type="text" id="complemento" name="complemento">
            </label>
        </div>        

        <div class="row">
            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">Bairro</span>
              <input type="text" id="bairro" name="bairro">
            </label>
            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text">Cep</span>
              <input type="text" id="cep" name="cep" max-length="9" class="ls-mask-cep" placeholder="00000-000">
            </label>

            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">Estado</span>
              <div class="ls-custom-select">
                <select class="ls-select" id="estado" name="estado">
                  <option value=""></option>
                  <?php echo $estados;?>
                </select>
              </div>
              <b><label for="estado" class="error"></label></b>          
            </label>

            <label class="ls-label col-md-3 col-xs-12">
              <span class="ls-label-text ac-req">Cidade</span>
              <div class="ls-custom-select">
                <select class="ls-select" name="cidade" id="cidade">
                </select>
              </div>
              <b><label for="cidade" class="error"></label></b>          
            </label>
        </div>          

        <div class="row">
          <div class="col-md-12">
          <hr>
            <span id="load"></span>
            <a href="#" id="ac-salvar" class="ls-btn-primary ac-btn-disable">Salvar</a>
            <a href="#" id="ac-cancelar" class="ls-btn">Voltar</a>
          </div>
        </div>
        <br><br><br><br>
      <?php echo form_close(); ?>
    </div>
</main>

<script src="<?php echo base_url()?>assets/js/principal.js"></script>
<script src="<?php echo base_url()?>assets/js/crud.js"></script>
<script src="<?php echo base_url()?>assets/js/notificacao.js"></script>
<script src="<?php echo base_url()?>assets/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/jquery-validation/messages_pt_BR.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sistema.js"></script>
