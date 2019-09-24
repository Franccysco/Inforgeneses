<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends MY_Controller
{

    public function index()
    {

        $this->verifica_login();
        // Titulo da página
        $dados['titulo'] = 'Usuarios';
        // Recupera os usuarios através do model
        $dados['usuarios'] = $this->usuario_model->GetAll();
        // Chama a pagina de usuarios enviando um array de dados a serem exibidos
        $this->render_page('usuarios/usuarios', $dados);

    }

    /**
     * Carrega a view para cadastro dos usuários
     */
    public function cadastro()
    {
        $this->verifica_login();
        $dados['titulo'] = 'Usuarios-cadastro';
        $this->render_page('usuarios/cadastroUsuario', $dados);

    }

    /**
     * Processa o formulário para salvar os dados
     */
    public function salvar()
    {

        // Executa o processo de validação do formulário
        $validacao = self::validar();
        // Verifica o status da validação do formulário
        // Se não houverem erros, então insere no banco e informa ao usuário
        // caso contrário informa ao usuários os erros de validação
        if ($validacao) {
            // Recupera os dados do formulário
            $usuario['nome'] = $this->input->post('nome');
            $usuario['matricula'] = $this->input->post('matricula');
            $usuario['senha'] = md5($this->input->post('senha'));
            $usuario['status'] = $this->input->post('status');

            // Insere os dados no banco recuperando o status dessa operação
            $status = $this->usuario_model->Inserir($usuario);
            // Checa o status da operação gravando a mensagem na seção
            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível inserir o usuario.');
            } else {
                $this->session->set_flashdata('success', 'Usuário inserido com sucesso.');
                // Redireciona o usuário para a home
                redirect(base_url('usuarios'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));

        }
        redirect(base_url('usuarios/cadastro'));

    }

    /**
     * Carrega a view para edição dos dados
     */
    public function editar()
    {
        $this->verifica_login();
        // Recupera o ID do registro - através da URL - a ser editado
        $id = $this->uri->segment(3);
        // Se não foi passado um ID, então redireciona para a home
        if (is_null($id)) {
            redirect();
        }

        // Recupera os dados do registro a ser editado
        $dados['usuario_ed'] = $this->usuario_model->GetById($id);

        // Titulo da página
        $dados['titulo'] = 'Usuarios-editar';
        // Carrega a view passando os dados do registro
        $this->render_page('usuarios/editarUsuario', $dados);

    }

    /**
     * Processa o formulário para atualizar os dados
     */
    public function atualizar()
    {
        // Realiza o processo de validação dos dados
        $validacao = self::validar('update');
        // Verifica o status da validação do formulário
        // Se não houverem erros, então insere no banco e informa ao usuário
        // caso contrário informa ao usuários os erros de validação
        if ($validacao) {
            // Recupera os dados do formulário
            $usuario = $this->input->post();
            // Atualiza os dados no banco recuperando o status dessa operação
            $status = $this->usuario_model->atualizar($usuario['id'], $usuario);
            // Checa o status da operação gravando a mensagem na seção
            if (!$status) {
                $dados['usuario'] = $this->usuario_model->GetById($usuario['id']);
                $this->session->set_flashdata('error', 'Não foi possível atualizar o usuário.');
            } else {
                $this->session->set_flashdata('success', 'Usuário atualizado com sucesso.');
                // Redireciona o usuário para a home
                redirect(base_url('usuarios'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        // Titulo da página
        $dados['titulo'] = 'Usuarios-editar';
        // Carrega a view passando os dados do registro
        $this->render_page('usuarios/editarUsuario', $dados);

    }

    /**
     * Processa o formulário para atualizar os dados
     */
    public function atualizaSenha()
    {
        $this->verifica_login();

        // Recupera os dados do formulário
        $idUsuario = $this->input->post('id');
        $senhaAntiga = md5($this->input->post('senha_antiga'));
        $novaSenha = md5($this->input->post('nova_senha'));
        // Atualiza os dados no banco recuperando o status dessa operação
        $status = $this->usuario_model->atualizaSenha($idUsuario, $novaSenha, $senhaAntiga);
        // Checa o status da operação gravando a mensagem na seção
        if (!$status) {
            $this->session->set_flashdata('error', 'Não foi possível atualizar a senha do usuário. Verifique sua senha antiga');
        } else {
            $this->session->set_flashdata('success', 'Senha atualizada com sucesso.');

        }

        // Redireciona o usuário para o usuário sendo editado
        redirect(base_url('usuarios/editar/' . $idUsuario));

    }

    /**
     * Realiza o processo de exclusão dos dados
     */
    public function excluir()
    {
        $this->verifica_login();

        // Recupera o ID do registro - através da URL - a ser editado
        $id = $this->uri->segment(3);
        // Se não foi passado um ID, então redireciona para a home
        if (is_null($id)) {
            redirect();
        }

        // Remove o registro do banco de dados recuperando o status dessa operação
        $status = $this->usuario_model->excluir($id);
        // Checa o status da operação gravando a mensagem na seção
        if ($status) {
            $this->session->set_flashdata('success', '<p>Usuario excluído com sucesso.</p>');
        } else {
            $this->session->set_flashdata('error', '<p>Não foi possível excluir o usuario.</p>');
        }
        // Redirecionao o usuário para a tela de usuários
        redirect(base_url('usuarios'));
    }

    /**
     * Valida os dados do formulário
     *
     * @param string $operacao Operação realizada no formulário: insert ou update
     *
     * @return boolean
     */
    private function validar($operacao = 'insert')
    {
        // Com base no parâmetro passado
        // determina as regras de validação
        switch ($operacao) {
            case 'insert':
                $rules['nome'] = array('trim', 'required', 'min_length[3]');
                $rules['status'] = array('trim', 'required');
                $rules['matricula'] = array('trim', 'required', 'is_unique[usuarios.matricula]');
                $rules['senha'] = array('trim', 'required', 'min_length[3]');
                break;

            case 'update':
                $rules['nome'] = array('trim', 'required', 'min_length[3]');
                $rules['status'] = array('trim', 'required');
                $rules['matricula'] = array('trim', 'required');
                // $rules['senha'] = array('trim', 'required', 'min_length[3]');
                break;

            default:
                $rules['nome'] = array('trim', 'required', 'min_length[3]');
                $rules['status'] = array('trim', 'required');
                $rules['matricula'] = array('trim', 'required');
                $rules['senha'] = array('trim', 'required', 'min_length[3]');
                break;
        }
        $this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
        $this->form_validation->set_rules('status', 'Status', $rules['status']);
        $this->form_validation->set_rules('matricula', 'Matricula', $rules['matricula']);
        $this->form_validation->set_rules('senha', 'Senha', $rules['senha']);

        // Executa a validação e retorna o status
        return $this->form_validation->run();
    }

}
