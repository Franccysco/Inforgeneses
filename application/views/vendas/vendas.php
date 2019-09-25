<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Minhas vendas
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?=base_url('vendas')?>">Vendas</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        
        <div id="msg_div">           
        </div>
       

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vendedor atual:
                            <?php echo $this->session->userdata('usuarioLogado')->nome;?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="form_vendas" action="javascript:void(0)" method="post">
                        <div class="box-body">
                            <label>Dados da venda</label>
                            <div class="row col-md-12">
                                
                                <div class="form-group col-md-6">
                                    <label for="cliente">*Cliente</label>
                                    <select id="clientes_id" name="clientes_id" class="form-control"
                                        style="width: 100%;">
                                        <option disabled="disabled" selected="selected">Selecione um cliente</option>
                                        <?php foreach ($clientes as $cliente)  {?>
                                        <option value="<?=$cliente['id']?>"><?=$cliente['nome']?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="row col-md-12">

                                <div class="form-group col-md-7">
                                    <label for="produto">*Produto</label>
                                    <select id="produtos_id" name="produtos_id" class="form-control "
                                        style="width: 100%;">
                                        <option disabled="disabled" selected="selected">Selecione um produto</option>
                                        <?php foreach ($produtos as $produto)  {?>
                                        <option value="<?=$produto['id']?>">Código: <?=$produto['codigo_barras']?> |
                                            Descrição: <?=$produto['descricao']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>*Qtd:</label>
                                    <input id="quantidade" type="text" class="form-control" name="quantidade"
                                        placeholder="Digite a qtd" value="1" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pagamento">*Forma de pagamento</label>
                                    <select id="forma_pagamento" name="forma_pagamento" class="form-control"
                                        style="width: 100%;">
                                        <option disabled="disabled" selected="selected">Selecione o pagamento</option>
                                        <option value="DINHEIRO">DINHEIRO</option>
                                        <option value="CARTAO">CARTÃO</option>
                                        <option value="CHEQUE">CHEQUE</option>
                                        <option value="BOLETO">BOLETO</option>
                                    </select>
                                </div>

                                <!-- status ativo do usuario ao cadastra-lo -->
                                <input type="hidden" id="status" class="form-control" name="status" value="1">
                                <!-- id  do usuario que cadastrou a venda-->
                                <input id="usuarios_id" type="hidden" class="form-control" name="usuarios_id"
                                    value="<?php echo $this->session->userdata('usuarioLogado')->id;?>">


                                <div class="row col-md-12">

                                    <div class="form-group col-md-3">
                                        <label>Total: R$</label>                                        
                                        <input  type='text' id='total_venda' class='form-control money' name='valor_total' readonly >
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-right">
                                    <button type="submit" id="btn_save" class="btn btn-success">Finalizar venda</button>
                                    <a href="<?=base_url()?>" class="btn btn-danger">Cancelar</a>
                                </div>
                            </form>
                            </div>                            
                        </div>

                    
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->