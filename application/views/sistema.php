<!-- Grid -->
<main class="ls-main view-grid">
    <div class="container-fluid">
      <h1 class="ls-title-intro ls-no-margin-bottom">Sistemas</h1>

      <div class="ls-box-filter hidden-print">
        <?php echo form_open('sistema', array('id' => 'form_sistema_consulta', 'class' => 'ls-form ls-form-inline'));?>
          <label class="ls-label col-md-4">
            <!--<b class="ls-label">Filtro</b>-->
            <div class="ls-custom-select ls-field">
              <select name="filtro" id="filtro" class="ls-select">
                <option value="0">Descrição</option>
                <option value="1">Sigla</option>
                <option value="2">E-mail de atendimento do sistema</option>
              </select>
            </div>
          </label>

          <label class="ls-label col-md-4">
            <b class="ls-label-text ls-hidden-accessible">Nome do Usuário</b>
            <input type="text" id="expressao" name="expressao" placeholder="Descricao do sistema" class="ls-field" maxlength="100">
          </label>
          
          <div class="col-md-2 ls-actions-btn">
            <a href="javascript:consultar('#form_sistema_consulta', 'pesquisar', 'html', function() {loading('#load_consulta', 1); }, retornoConsulta);" class="ls-btn ls-btn-sm" title="Pesquisar">Pesquisar</a>
            <a href="javascript:limpar();" title="Limpar" class="ls-btn ls-btn-sm">Limpar</a>
            <a href="javascript:;" title="Novo Sistema" class="ls-btn-sm ls-btn-primary novo-cadastro">Novo Sistema</a>
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
<main class="ls-main view-form ls-display-none">
    <div class="container-fluid">
      <h1 class="ls-title-intro ls-no-margin-bottom">Cadastrar sistema</h1>

      <!-- Auxilia na navegação -->
      <ol class="ls-breadcrumb ls-no-margin-bottom">
        <li><a href="javascript:showViewGrid();">Todos os sistemas</a></li>
        <li>Cadastro</li>
      </ol>
      <br>

      <div id="resposta"></div>

      <?php echo form_open('sistema', array('id' => 'form_sistema', 'class' => 'ls-form','data-ls-module'=>'form'));?>
        <input type="hidden" id="id" name="id">
        
        <div class="row">
            <div class="col-md-4">
                <legend class="ls-title-5">Dados do sistema</legend>
            </div>
            
            <div class="col-md-6">
                <p class="msg-req">* Campos Obrigatório</p>
            </div>
        </div>

        <div class="row">
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text req">Descrição:</span>
              <input type="text" id="descricao" name="descricao" maxlength="100">
            </label>
        </div>
        
        <div class="row">
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text req">Sigla:</span>
              <input type="text" id="sigla" name="sigla" maxlength="10">
            </label>
        </div>        
        
        <div class="row">
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text">E-mail de atendimento do sistema:</span>
              <input type="email" id="email" name="email" maxlength="100">
            </label>
        </div>
        
        <div class="row">
            <label class="ls-label col-md-6 col-xs-12">
              <span class="ls-label-text">URL:</span>
              <input type="text" id="url" name="url" maxlength="50">
            </label>
        </div>

        <div class="row">
          <div class="col-md-12">
          <hr>
            <span id="load"></span>
            <a href="javascript:;" class="ls-btn-primary ac-btn-disable salvar-sistema">Salvar</a>
            <a href="javascript:showViewGrid();" class="ls-btn">Voltar</a>
          </div>
        </div>
        <br><br>
      <?php echo form_close(); ?>
    </div>
</main>

<script src="<?php echo base_url()?>assets/js/principal.js"></script>
<script src="<?php echo base_url()?>assets/js/crud.js"></script>
<script src="<?php echo base_url()?>assets/js/notificacao.js"></script>
<script src="<?php echo base_url()?>assets/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/jquery-validation/messages_pt_BR.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sistema.js"></script>
