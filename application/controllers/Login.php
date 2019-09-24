<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function index()
    {

        $dados['titulo'] = 'Login';

        $this->form_validation->set_rules('matricula', 'Matricula', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if ($this->form_validation->run() === true) {
            // Recupera os dados do formulário
            $matricula = $this->input->post('matricula');
            $senha = md5($this->input->post('senha'));

            $usuario = $this->usuario_model->login($matricula, $senha);
          
            // Checa o status da operação gravando a mensagem na seção
            if (is_null($usuario)) {
                $this->session->set_flashdata('error', "Verifique sua a matriucla ou senha de acesso estão corretos e se seu usuario esteja ativo");
            } else {
                $this->session->set_flashdata('success', "Sessão iniciada com sucesso");
                // Salva os dados do usuario na sessão e redireciona o usuário para a home
                $dadosSessao['usuarioLogado'] = $usuario['usuarioLogado'];
                $dadosSessao['logado'] = true;
                $this->session->set_userdata($dadosSessao);

                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));

        }

        $this->load->view('login', $dados);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
