<div class="modal fade" id="modal-editar-senha">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar senha do usuário</h4>
      </div>
      <!-- form start -->
      <form action="<?=base_url('usuario/atualizaSenha')?>" method="post">

        <div class="modal-body">

          <div class="box-body">
            <div class="row">

              <!-- Id do usuário para atualização dos dados do formulário -->
              <input type="hidden" name="id" class="form-control" value="<?=$usuario_ed['id']?>">

              <div class="form-group col-md-6">
                <label>*Senha antiga:</label>
                <input type="password" class="form-control" name="senha_antiga" id="senha_antiga"
                  placeholder="Digite senha antiga" required>
              </div>

              <div class="form-group col-md-6">
                <label>*Nova Senha:</label>
                <input type="password" class="form-control" name="nova_senha" id="nova_senha"
                  onkeyup="checkPasswordMatch()" placeholder="Digite sua nova senha" required>
              </div>

              <div class="form-group col-md-6">
                <label>*Confirmar Senha:</label>
                <input type="password" class="form-control" name="confirm_senha" id="confirm_senha"
                  onkeyup="checkPasswordMatch()" placeholder="Confirmar senha" required>
              </div>

              <div class="form-group col-md-12">
                <div id="divcheck"></div>
              </div>

            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left">Limpar</button>
          <button type="submit" class="btn btn-primary" id="enviarsenha">Salvar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>