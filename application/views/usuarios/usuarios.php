<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manter Usuarios
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('')?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active"><a href="<?=base_url('usuarios')?>">usuarios</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">


    <?php if ($this->session->flashdata('error') == true): ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-times-circle"></i> Erros</h4>
      <?php echo $this->session->flashdata('error');?>
    </div>
    <?php endif;?>

    <?php if ($this->session->flashdata('success') == true): ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check-circle"></i> Sucesso</h4>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif;?>

 
        <div class="box box-defaut">

          <div class="box-header col-md-12">
            <a href="<?=base_url('usuarios/cadastro')?>" class="btn btn-success pull-right">
              <i class="fa fa-plus-circle"></i> Cadastrar usuario
            </a>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <table id="tables-exp" class="table table-striped" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Matricula</th>
                      <th>Nome</th>
                      <th>Status</th>
                      <th style="width: 140px">Ações</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php if ($usuarios == FALSE): ?>
                    <tr>
                      <td colspan="6">
                        <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-exclamation-circle"></i> Cadastre um usuario!</h4>
                          Nenhum usuario encontrado!
                        </div>
                      </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($usuarios as $usuario){ ?>
                    <tr>
                      <td>
                        <?=$usuario['id']?>
                      </td>
                      <td>
                        <?=$usuario['matricula']?>
                      </td>
                      <td>
                        <span <?=$usuario['status']==1 ? 'class="label label-success">Ativo</span>' :
                          'class="label label-danger">Inativo</span>' ?>
                      </td>
                    
                      <td>
                        <a href="<?=base_url('usuarios/editar/'.$usuario['id'])?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                          Editar</a>

                        <a href="#" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $usuario['id'];?>"
                          data-rota="<?php echo base_url('exluir-usuario/');?>" class="btn btn-danger btn-xs">
                          <i class="fa fa-trash"></i> Excluir</a>
                      </td>

                    </tr>

                    <?php } ?>
                    <?php endif; ?>

                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>

        </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->