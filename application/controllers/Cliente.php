<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends MY_Controller
{

    public function index()
    {
        $this->verifica_login();


        $dados['titulo'] = 'Clientes';
        $dados['clientes'] = $this->cliente_model->getAll();

        $this->render_page('clientes/clientes', $dados);

    }

    /**
     * Carrega a view para cadastro dos clientes
     */
    public function cadastro()
    {
        $this->verifica_login();

        // Titulo da página
        $dados['titulo'] = 'Clientes-cadastro';
        $this->render_page('clientes/cadastroCliente', $dados);
    }

    /**
     * Processa o formulário para salvar os dados
     */
    public function salvar()
    {
        $this->verifica_login();


        // Executa o processo de validação do formulário
        $validacao = self::validar();
        // Verifica o status da validação do formulário
        // Se não houverem erros, então insere no banco e informa ao usuário
        // caso contrário informa ao usuários os erros de validação
        if ($validacao) {
            // Recupera os dados do formulário
            $cliente['nome'] = $this->input->post('nome');
            $cliente['cpf'] = $this->input->post('cpf');
            $cliente['rg'] = $this->input->post('rg');
            $renda = $this->input->post('renda');
            $cliente['renda'] = str_replace(",", ".", str_replace(".", "", $renda));
            $cliente['endereco'] = $this->input->post('endereco');
            $cliente['status'] = $this->input->post('status');
            $cliente['usuarios_id'] = $this->input->post('usuarios_id');
            $cliente['numero'] = $this->input->post('numero');
            $cliente['estado'] = $this->input->post('estado');
            $cliente['cidade'] = $this->input->post('cidade');

            //Insere os dados no banco recuperando o status dessa operação
            $status = $this->cliente_model->inserir($cliente);
            // Checa o status da operação gravando a mensagem na seção
            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível inserir o cliente.');
            } else {
                $this->session->set_flashdata('success', 'Cliente inserido com sucesso.');
                // Redireciona o usuário para a home clientes
                redirect(base_url('clientes'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));

        }
        redirect(base_url('clientes/cadastro'));

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
        $dados['cliente_ed'] = $this->cliente_model->getById($id);

        // Titulo da página
        $dados['titulo'] = 'Clientes-editar';
        // Carrega a view passando os dados do registro
        $this->render_page('clientes/editarCliente', $dados);

    }

    /**
     * Processa o formulário para atualizar os dados
     */
    public function atualizar()
    {
        $this->verifica_login();

        // Realiza o processo de validação dos dados
        $validacao = self::validar('update');
        // Verifica o cpf da validação do formulário
        // Se não houverem erros, então insere no banco e informa ao usuário
        // caso contrário informa ao usuários os erros de validação
        if ($validacao) {
            // Recupera os dados do formulário
            $cliente = $this->input->post();
            $renda = $this->input->post('renda');
            $cliente['renda'] = str_replace(",", ".", str_replace(".", "", $renda));

            // Atualiza os dados no banco recuperando o cpf dessa operação
            $cpf = $this->cliente_model->atualizar($cliente['id'], $cliente);
            // Checa o cpf da operação gravando a mensagem na seção
            if (!$cpf) {
                $dados['cliente'] = $this->cliente_model->getById($cliente['id']);
                $this->session->set_flashdata('error', 'Não foi possível atualizar o cliente.');
            } else {
                $this->session->set_flashdata('success', 'Cliente atualizado com sucesso.');
                // Redireciona o usuário para a home clientes
                redirect(base_url('clientes'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        // Titulo da página
        $dados['titulo'] = 'clientes-editar';
        // Carrega a view passando os dados do registro
        $this->render_page('clientes/editarCliente', $dados);

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
        $status = $this->cliente_model->excluir($id);
        // Checa o status da operação gravando a mensagem na seção
        if ($status) {
            $this->session->set_flashdata('success', '<p>Cliente excluído com sucesso.</p>');
        } else {
            $this->session->set_flashdata('error', '<p>Não foi possível excluir o cliente.</p>');
        }
        // Redirecionao o usuário para a tela de usuários
        redirect(base_url('clientes'));
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
                $rules['cpf'] = array('trim', 'required', 'is_unique[clientes.cpf]');
                $rules['rg'] = array('trim', 'required');
                $rules['endereco'] = array('trim', 'required');
                $rules['numero'] = array('trim', 'required');
                $rules['estado'] = array('trim', 'required');
                $rules['cidade'] = array('trim', 'required');
                $rules['renda'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');
                
                break;

            case 'update':
                $rules['nome'] = array('trim', 'required', 'min_length[3]');
                $rules['cpf'] = array('trim', 'required');
                $rules['rg'] = array('trim', 'required');
                $rules['endereco'] = array('trim', 'required');
                $rules['numero'] = array('trim', 'required');
                $rules['estado'] = array('trim', 'required');
                $rules['cidade'] = array('trim', 'required');
                $rules['renda'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');

                break;

            default:
                $rules['nome'] = array('trim', 'required', 'min_length[3]');
                $rules['cpf'] = array('trim', 'required');
                $rules['rg'] = array('trim', 'required');
                $rules['endereco'] = array('trim', 'required', 'is_unique[clientes.endereco]');
                $rules['numero'] = array('trim', 'required');
                $rules['estado'] = array('trim', 'required');
                $rules['cidade'] = array('trim', 'required');
                $rules['renda'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');

                break;
        }
        $this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
        $this->form_validation->set_rules('cpf', 'CPF', $rules['cpf']);
        $this->form_validation->set_rules('rg', 'RG', $rules['rg']);
        $this->form_validation->set_rules('endereco', 'Endereço', $rules['endereco']);
        $this->form_validation->set_rules('numero', 'Número', $rules['numero']);
        $this->form_validation->set_rules('estado', 'Estado', $rules['estado']);
        $this->form_validation->set_rules('cidade', 'Cidade', $rules['cidade']);
        $this->form_validation->set_rules('renda', 'Renda', $rules['renda']);
        $this->form_validation->set_rules('status', 'Status', $rules['status']);

        // Executa a validação e retorna o cpf
        return $this->form_validation->run();
    }
}
