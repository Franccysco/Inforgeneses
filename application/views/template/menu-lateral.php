<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url('assets/dist/img/user.png')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                 <?php echo $this->session->userdata('usuarioLogado')->nome; ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU OPÇÕES</li>
            <li>
                <a href="<?=base_url()?>">
                    <i class="fa fa-home"></i> <span>Dashboard - Home</span>
                </a>
            </li>
            <li>
                <a href="<?=base_url('produtos')?>">
                    <i class="fa fa-barcode"></i> <span>Produtos</span>
                </a>
            </li>
            <li>
                <a href="<?=base_url('clientes')?>">
                    <i class="fa fa-users"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li>
                <a href="<?=base_url('vendas')?>">
                    <i class="fa fa-shopping-cart"></i> <span>Vendas</span>
                </a>
            </li>
            <li>
                <a href="<?=base_url('usuarios')?>">
                    <i class="ion ion-person-add"></i> <span>Usuários</span>
                </a>
            </li>
                        
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->