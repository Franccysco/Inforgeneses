<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends MY_Controller
{

   

    public function index()
    {

        $this->verifica_login();
        // Titulo da página
        $dados['titulo'] = 'Produtos';
        // Recupera os produtos através do model
        $dados['produtos'] = $this->produto_model->getAll();
        // Chama a pagina de produtos enviando um array de dados a serem exibidos
        $this->render_page('produtos/produtos', $dados);

    }

    /**
     * Carrega a view para cadastro dos produtos
     */
    public function cadastro()
    {
        $this->verifica_login();

        // Titulo da página
        $dados['titulo'] = 'Produtos-cadastro';
        $this->render_page('produtos/cadastroProduto', $dados);
    }

    /**
     * Processa o formulário para salvar os dados
     */
    public function salvar()
    {

        $this->verifica_login();

        // Executa o processo de validação do formulário
        $validacao = self::validar();
        // Verifica o preco_vista da validação do formulário
        // Se não houverem erros, então insere no banco e informa ao usuário
        // caso contrário informa ao usuários os erros de validação
        if ($validacao) {
            // Recupera os dados do formulário
            $produto['descricao'] = $this->input->post('descricao');
            $preco_prazo = $this->input->post('preco_prazo');
            $produto['preco_prazo'] = str_replace(",", ".", str_replace(".", "", $preco_prazo));
            $produto['codigo_barras'] = $this->input->post('codigo_barras');
            $produto['status'] = $this->input->post('status');
            $preco_vista = $this->input->post('preco_vista');
            $produto['preco_vista'] = str_replace(",", ".", str_replace(".", "", $preco_vista));
            $produto['usuarios_id'] = $this->input->post('usuarios_id');

            //Insere os dados no banco recuperando o status dessa operação
            $status = $this->produto_model->inserir($produto);
            // Checa o status da operação gravando a mensagem na seção
            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível inserir o produto.');
            } else {
                $this->session->set_flashdata('success', 'Produto inserido com sucesso.');
                // Redireciona o usuário para a home
                redirect(base_url('produtos'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));

        }
        redirect(base_url('produtos/cadastro'));

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
        $dados['produto_ed'] = $this->produto_model->getById($id);

        // Titulo da página
        $dados['titulo'] = 'produtos-editar';
        // Carrega a view passando os dados do registro
        $this->render_page('produtos/editarProduto', $dados);

    }

    /**
     * Processa o formulário para atualizar os dados
     */
    public function atualizar()
    {
        $this->verifica_login();

        // Realiza o processo de validação dos dados
        $validacao = self::validar('update');
        // Verifica o preco_vista da validação do formulário
        // Se não houverem erros, então insere no banco e informa ao usuário
        // caso contrário informa ao usuários os erros de validação
        if ($validacao) {
            // Recupera os dados do formulário
            $produto = $this->input->post();
            $preco_prazo = $this->input->post('preco_prazo');
            $produto['preco_prazo'] = str_replace(",", ".", str_replace(".", "", $preco_prazo));
            $preco_vista = $this->input->post('preco_vista');
            $produto['preco_vista'] = str_replace(",", ".", str_replace(".", "", $preco_vista));

            // Atualiza os dados no banco recuperando o preco_vista dessa operação
            $preco_vista = $this->produto_model->atualizar($produto['id'], $produto);
            // Checa o preco_vista da operação gravando a mensagem na seção
            if (!$preco_vista) {
                $dados['produto'] = $this->produto_model->getById($produto['id']);
                $this->session->set_flashdata('error', 'Não foi possível atualizar o produto.');
            } else {
                $this->session->set_flashdata('success', 'Produto atualizado com sucesso.');
                // Redireciona o usuário para a home produtos
                redirect(base_url('produtos'));
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        // Titulo da página
        $dados['titulo'] = 'produtos-editar';
        // Carrega a view passando os dados do registro
        $this->render_page('produtos/editarProduto', $dados);

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
        $status = $this->produto_model->excluir($id);
        // Checa o status da operação gravando a mensagem na seção
        if ($status) {
            $this->session->set_flashdata('success', '<p>Produto excluído com sucesso.</p>');
        } else {
            $this->session->set_flashdata('error', '<p>Não foi possível excluir o produto.</p>');
        }
        // Redirecionao o usuário para a tela de usuários
        redirect(base_url('produtos'));
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
                $rules['descricao'] = array('trim', 'required', 'max_length[45]');
                $rules['preco_vista'] = array('trim', 'required');
                $rules['preco_prazo'] = array('trim', 'required');
                $rules['codigo_barras'] = array('trim', 'required', 'is_unique[produtos.codigo_barras]');
                $rules['status'] = array('trim', 'required');
                break;

            case 'update':
                $rules['descricao'] = array('trim', 'required', 'max_length[45]');
                $rules['preco_vista'] = array('trim', 'required');
                $rules['preco_prazo'] = array('trim', 'required');
                $rules['codigo_barras'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');
                break;

            default:
                $rules['descricao'] = array('trim', 'required', 'max_length[45]');
                $rules['preco_vista'] = array('trim', 'required');
                $rules['preco_prazo'] = array('trim', 'required');
                $rules['codigo_barras'] = array('trim', 'required', 'is_unique[produtos.codigo_barras]');
                $rules['status'] = array('trim', 'required');
                break;
        }
        $this->form_validation->set_rules('descricao', 'Descricao', $rules['descricao']);
        $this->form_validation->set_rules('preco_vista', 'Preço à vista', $rules['preco_vista']);
        $this->form_validation->set_rules('preco_prazo', 'Preço a prazo', $rules['preco_prazo']);
        $this->form_validation->set_rules('codigo_barras', 'Código de barras', $rules['codigo_barras']);
        $this->form_validation->set_rules('status', 'Status', $rules['status']);

        // Executa a validação e retorna o preco_vista
        return $this->form_validation->run();
    }

}
