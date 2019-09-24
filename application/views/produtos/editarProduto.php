<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastrar Produtos
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?=base_url('produtos')?>">Produtos</a></li>
            <li class="active"><a href="">Cadastrar produto</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo produto</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?=base_url('produto/salvar')?>" method="post">
                        <div class="box-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>* Código de barras:</label>
                                    <input type="text" class="form-control" name="codigo_barras" placeholder="Digite o codigo de barras"
                                        value="<?=set_value('codigo_barras')?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>* Preço à vista</label>
                                    <input type="text" class="form-control" max="45" name="preco_vista" placeholder="Digite o preço à vista"
                                        value="<?=set_value('preco_vista')?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>* Preço a prazo:</label>
                                    <input type="text" class="form-control" name="preco_prazo" placeholder="Digite o preço a prazo"
                                        value="<?=set_value('preco_prazo')?>" required>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <label>* Descrição:</label>
                                    <textarea  rows="3" type="text" class="form-control" max="45" name="descricao" placeholder="Descreva o produto"
                                        value="<?=set_value('descricao')?>" required></textarea>
                                </div>
                                
                                <!-- status ativo do produto ao cadastra-lo -->
                                <input type="hidden" class="form-control" name="status" value="1">


                            </div>
                           
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
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