<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Inforgeneses</a>.</strong>
    Todos
    os Direitos Reservados.
</footer>


<!-- Modal para exlusão de dados gerais -->
<div class="modal modal-default fade" id="delete-modal">
    <div class="modal-dialog" style="top: 20%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4>Excluir dado! <i class="fa fa-trash"></i></h4>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir?</p>
            </div>
            <div class="modal-footer">
                <a id="confirm" class="btn btn-danger" href="#">Sim</a>
                <a id="cancel" class="btn btn-default" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal para logout do sistema -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog" style="top: 20%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4>Deseja realmente sair? <i class="fa fa-sign-out-alt"></i></h4>
            </div>
            <div class="modal-body">
                <p>Ao sair todas as ações que estão em andamento serão encerradas.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <a href="<?=base_url('logout')?>" class="btn btn-danger">Sair</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!-- jQuery 3 -->
<script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/dist/js/jquery.mask.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap  -->
<script src="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/bower_components/chart.js/Chart.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<=base_url('assets/dist/js/pages/dashboard2.js')?>"></script> -->
<!-- AdminLTE for demo purposes -->

<!-- iCheck 1.0.1 -->
<script src="<?=base_url('assets/')?>plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url('assets/dist/js/custom.js')?>"></script>



<!-- DataTables -->
<script src="<?=base_url('assets/')?>bower_components/datatables/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>bower_components/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js">
</script>
<script src="<?=base_url('assets/')?>bower_components/datatables/buttons-1.5.4/js/dataTables.buttons.min.js"></script>
<!-- <script src="<=base_url('assets/')?>bower_components/datatables/buttons-1.5.4/js/buttons.flash.min.js"></script> -->
<script src="<?=base_url('assets/')?>bower_components/datatables/buttons-1.5.4/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/')?>bower_components/datatables/buttons-1.5.4/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/')?>bower_components/datatables/buttons-1.5.4/js/buttons.bootstrap.min.js"></script>

<script src="<?=base_url('assets/')?>bower_components/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>bower_components/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>bower_components/datatables/jszip-2.5.0/jszip.min.js"></script>




<script>
    $(function () {
        $('#tables-exp').DataTable({

            "sScrollX": true,
            "scrollCollapse": true,
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostrar _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",

                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                }
            }

        })



    })
</script>



<script>
    $(function () {

        //Initialize Select2 Elements
        $('.select2').select2();

    });


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    })
</script>

<script>
    $(document).ready(function () {
        $('.date').mask('11/11/1111');
       
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.rg').mask('00.000.000-0');        
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.money').mask('000.000.000.000.000,00', {
            reverse: true
        });
    });
</script>


</body>

</html>