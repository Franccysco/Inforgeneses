<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Produto
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?=base_url('produtos')?>">Produtos</a></li>
            <li class="active"><a href="">Editar produto</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Produto: <?=$produto_ed['codigo_barras']?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?=base_url('produto/atualizar')?>" method="post">
                        <div class="box-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>* Código de barras:</label>
                                    <input type="text" class="form-control" name="codigo_barras"
                                        placeholder="Digite o codigo de barras"
                                        value="<?=$produto_ed['codigo_barras']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>* Preço à vista</label>
                                    <input type="text" class="form-control money" max="45" name="preco_vista"
                                        placeholder="Digite o preço à vista" value="<?=$produto_ed['preco_vista']?>"
                                        required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>* Preço a prazo:</label>
                                    <input type="text" class="form-control money" name="preco_prazo"
                                        placeholder="Digite o preço a prazo" value="<?=$produto_ed['preco_prazo']?>"
                                        required>
                                </div>
                            </div>
                            <!-- editar status  do produto -->
                            <div class="form-group col-md-3">
                                <label>*Status do produto:</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option disabled="disabled">Selecione o status</option>

                                    <?php if($produto_ed['status'] == 1){?>

                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>

                                    <?php } else{?>
                                    <option value="1">Ativo</option>
                                    <option value="0" selected>Inativo</option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <label>* Descrição:</label>
                                    <textarea rows="3" type="text" class="form-control" max="45" name="descricao"
                                        placeholder="Descreva o produto"
                                        required><?=$produto_ed['descricao']?></textarea>
                                </div>


                                <!-- id do produto para edição -->
                                <input type="hidden" class="form-control" name="id" value="<?=$produto_ed['id']?>">


                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Editar</button>
                            <a href="<?=base_url('produtos')?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->