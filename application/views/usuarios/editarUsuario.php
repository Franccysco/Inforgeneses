<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Usuários
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?=base_url('usuarios')?>">Usuários</a></li>
            <li class="active"><a href="">Editar Usuário</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php if ($this->session->flashdata('success') == true): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check-circle"></i> Sucesso</h4>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif;?>

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
                        <h3 class="box-title">Usuário: <?=$usuario_ed['nome']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?=base_url('usuario/atualizar')?>" method="post">
                        <div class="box-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>*Nome:</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome"
                                        value="<?=$usuario_ed['nome']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>*Matrícula:</label>
                                    <input type="text" class="form-control" name="matricula"
                                        placeholder="Digite sua matrícula" value="<?=$usuario_ed['matricula']?>"
                                        required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label><i class="icon fa fa-warning" data-toggle="tooltip"
                                            title="Clicar somente se quiser alterar a senha"></i> Senha:</label>
                                    <input type="button" class="btn btn-default btn-block" data-toggle="modal"
                                        data-target="#modal-editar-senha" value="Alterar senha">
                                </div>

                                <!-- editar status  do usuario -->
                                <div class="form-group col-md-3">
                                    <label>*Status do usuário:</label>
                                    <select name="status" class="form-control" style="width: 100%;">
                                        <option disabled="disabled">Selecione o status</option>

                                        <?php if($usuario_ed['status'] == 1){?>

                                        <option value="1" selected>Ativo</option>
                                        <option value="0">Inativo</option>

                                        <?php } else{?>
                                        <option value="1">Ativo</option>
                                        <option value="0" selected>Inativo</option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <!-- Id do usuário para atualização dos dados do formulário -->
                            <input type="hidden" name="id" class="form-control" value="<?=$usuario_ed['id']?>">


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Editar</button>
                            <a href="<?=base_url('usuarios')?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('usuarios/modal-editar-senha');?>

<!-- /.content-wrapper -->