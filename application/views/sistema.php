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
        <li><a href="javascript:showViewGrid();$('#id').val('');">Todos os sistemas</a></li>
        <li>Cadastro</li>
      </ol>
      <br>
        
     <div id="resposta"></div>
     
     <div>  
      <?php echo form_open('sistema', array('id' => 'form_sistema', 'class' => 'ls-form','data-ls-module'=>'form'));?>
        <input type="hidden" id="id" name="id">
        
        <div class="row">
            <div class="col-md-4">
                <legend class="ls-title-5">Dados do sistema</legend>
            </div>
            
            <div class="col-md-8">
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
        
        
        <!-- Controle do sistema -->
        <div class="view-controle-sistema">
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <legend class="ls-title-5">Dados do sistema</legend>
                </div>        
            </div>        
        
            <div class="row">
                <label class="ls-label col-md-3 col-xs-12">
                  <span class="ls-label-text req">Status:</span>
                   <div class="ls-custom-select">
                      <select class="ls-select" id="status" name="status">
                        <option value="0">Ativo</option>  
                        <option value="1">Cancelado</option>  
                      </select>
                    </div>
                </label>
            </div>

            <div class="row">
                <label class="ls-label col-md-6 col-xs-12">
                  <span class="ls-label-text">Usuário responsavel pela ultima alteração:</span>
                  <input type="text" value="Allan Gonçalves da Cruz" disabled="disabled">
                </label>
            </div>        

            <div class="row">
                <label class="ls-label col-md-6 col-xs-12">
                  <span class="ls-label-text">Data da ultima alteração</span>
                  <input type="text" id="updated_at" disabled="disabled">
                </label>
            </div>

            <div class="row">
                <label class="ls-label col-md-6 col-xs-12">
                  <span class="ls-label-text">Justificativa da última alteração: </span>
                  <textarea id="ultima_justificativa" rows="7" disabled="disabled"  maxlength="500"></textarea>
                </label>
            </div>            
            
            <div class="row">
                <label class="ls-label col-md-6 col-xs-12">
                  <span class="ls-label-text">Nova justificativa de alteração</span>
                  <textarea id="justificativa" name="justificativa" rows="7" maxlength="500"></textarea>
                </label>
            </div>
        </div>
        <!-- Fim Controle do sistema -->
        

        <div class="row">
          <div class="col-md-12">
          <hr>
            <span id="load"></span>
            <a href="javascript:;" class="ls-btn-primary ac-btn-disable salvar-sistema">Salvar</a>
            <a href="javascript:showViewGrid();$('#id').val('');" class="ls-btn">Voltar</a>
          </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <?php echo form_close(); ?>
    </div>          
    </div>
</main>

<script src="<?php echo base_url()?>assets/js/principal.js"></script>
<script src="<?php echo base_url()?>assets/js/crud.js"></script>
<script src="<?php echo base_url()?>assets/js/notificacao.js"></script>
<script src="<?php echo base_url()?>assets/js/sistema.js"></script>
