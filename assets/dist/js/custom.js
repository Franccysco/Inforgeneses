/**	 * Passa os dados  para o Modal, e atualiza o link para exclusão	 */
$('#delete-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('customer');
    var rota = button.data('rota');
    var modal = $(this);
   // modal.find('.modal-title').text('Excluir Cliente #' + id);
    modal.find('#confirm').attr('href', rota + id);
})

/**	 * Verifica os campos de edeição da senha	 */

$(document).ready(function () {
    $("#nova_senha").keyup(checkPasswordMatch);
    $$("#confirm_senha").keyup(checkPasswordMatch);
});
function checkPasswordMatch(){
    var password = $("#nova_senha").val();
    var confirmPassword = $("#confirm_senha").val();

    if (password == '' || confirmPassword == ''){
        $("#divcheck").html("<span class='label label-danger'>Campos de senhas vazios</span>");
        document.getElementById("enviarsenha").disabled = true;

    }else if (password != confirmPassword) {
        $("#divcheck").html("<span class='label label-danger'>Senhas não conferem</span>");
        document.getElementById("enviarsenha").disabled = true;
    } else {
        $("#divcheck").html("<span class='label label-success'>Senhas iguais</span>");
        document.getElementById("enviarsenha").disabled = false;
    }

}

