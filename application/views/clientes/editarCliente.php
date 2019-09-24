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
                        <h3 class="box-title">Cliente: <?=$cliente_ed['nome']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?=base_url('cliente/atualizar')?>" method="post">
                        <div class="box-body">
                            <hr> <label>Dados</label><br><br>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>*Nome:</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome"
                                        value="<?=$cliente_ed['nome']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>*CPF:</label>
                                    <input type="text" class="form-control cpf" name="cpf" placeholder="Digite o CPF"
                                        value="<?=$cliente_ed['cpf']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>*RG:</label>
                                    <input type="text" class="form-control rg" name="rg" placeholder="Digite seu RG"
                                        value="<?=$cliente_ed['rg']?>" required>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="form-group col-md-3">
                                    <label>*Renda:</label>
                                    <input type="text" class="form-control money" name="renda" placeholder="Digite sua renda"
                                        value="<?=$cliente_ed['renda']?>" required>
                                </div>
                                
                                <!-- editar status  do cliente -->
                            <div class="form-group col-md-3">
                                <label>*Status do cliente:</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option disabled="disabled">Selecione o status</option>

                                    <?php if($cliente_ed['status'] == 1){?>

                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>

                                    <?php } else{?>
                                    <option value="1">Ativo</option>
                                    <option value="0" selected>Inativo</option>
                                    <?php } ?>
                                </select>
                            </div>


                            </div>
                            <div class="row col-md-12">
                                <hr> <label>Endereço</label><br><br>

                                <div class="form-group col-md-8">
                                    <label>*Rua:</label>
                                    <input type="text" class="form-control" name="endereco" placeholder="Digite sua rua"
                                        value="<?=$cliente_ed['endereco']?>" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>*Numero:</label>
                                    <input type="text" class="form-control" name="numero"
                                        placeholder="Digite seu número" value="<?=$cliente_ed['numero']?>" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="despassword">*Estado:</label>
                                    <input type="text" class="form-control" name="estado"
                                        placeholder="Digite seu estado" value="<?=$cliente_ed['estado']?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>*Cidade:</label>
                                    <input type="text" class="form-control" name="cidade"
                                        placeholder="Digite sua cidade" value="<?=$cliente_ed['cidade']?>" required>
                                </div>

                                <!-- id do produto para edição -->
                                <input type="hidden" class="form-control" name="id" value="<?=$cliente_ed['id']?>">

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Editar</button>
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