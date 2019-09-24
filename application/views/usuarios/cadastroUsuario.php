<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastrar Usuários
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?=base_url('usuarios')?>">Usuários</a></li>
            <li class="active"><a href="">Cadastrar Usuário</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php if ($this->session->flashdata('error') == true): ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-times-circle"></i> Erros</h4>
      <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php endif;?>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo usuário</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?=base_url('usuarios/salvar')?>" method="post">
                        <div class="box-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>*Nome:</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome"
                                        value="<?=set_value('nome')?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>*Matrícula:</label>
                                    <input type="text" class="form-control" name="matricula" placeholder="Digite sua matrícula"
                                        value="<?=set_value('matricula')?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label id="senha">*Senha:</label>
                                    <input type="password" name="senha" class="form-control" placeholder="Senha do usuário" value="<?=set_value('senha')?>"
                                    required>
                                </div>

                                 <!-- status ativo do usuario ao cadastra-lo -->
                                <input type="hidden" class="form-control" name="status" value="1">

                            </div>

                            
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <a href="<?=base_url('usuarios')?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->