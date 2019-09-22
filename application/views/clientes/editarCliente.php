<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Clientes
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?=base_url('clientes')?>">Clientes</a></li>
            <li class="active"><a href="">Editar Cliente</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cliente: x</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?=base_url('cliente/salvar')?>" method="post">
                        <div class="box-body">
                            <hr> <label>Dados</label><br><br>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome"
                                        value="<?=set_value('nome')?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>CPF:</label>
                                    <input type="text" class="form-control" name="cpf" placeholder="Digite o CPF"
                                        value="<?=set_value('cpf')?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>RG:</label>
                                    <input type="text" class="form-control" name="rg" placeholder="Digite seu RG"
                                        value="<?=set_value('rg')?>" required>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Renda:</label>
                                    <input type="text" class="form-control" name="renda" placeholder="Digite sua renda"
                                        value="<?=set_value('renda')?>" required>
                                </div>
                                
                                <!-- status ativo do cliente ao cadastra-lo -->
                                <input type="hidden" class="form-control" name="status" value="1">


                            </div>
                            <div class="row col-md-12">
                                <hr> <label>Endereço</label><br><br>

                                <div class="form-group col-md-8">
                                    <label>Rua:</label>
                                    <input type="text" class="form-control" name="endereco" placeholder="Digite sua rua"
                                        value="<?=set_value('endereco')?>" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Numero:</label>
                                    <input type="text" class="form-control" name="numero"
                                        placeholder="Digite seu número" value="<?=set_value('numero')?>" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="despassword">Estado:</label>
                                    <input type="text" class="form-control" name="estado"
                                        placeholder="Digite seu estado" value="<?=set_value('estado')?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Cidade:</label>
                                    <input type="text" class="form-control" name="cidade"
                                        placeholder="Digite sua cidade" value="<?=set_value('cidade')?>" required>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <a href="<?=base_url('clientes')?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->