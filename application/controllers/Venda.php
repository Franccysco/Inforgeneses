<?php
defined('BASEPATH') or exit('No direct script access allowed');

class venda extends MY_Controller
{

    public function index()
    {

        $this->verifica_login();
        // Titulo da página
        $dados['titulo'] = 'Vendas';
        // Recupera os vendas através do model
        $dados['clientes'] = $this->cliente_model->getAll();
        $dados['produtos'] = $this->produto_model->getAll();
        // Chama a pagina de vendas enviando um array de dados a serem exibidos
        $this->render_page('vendas/vendas', $dados);

    }


    public function produtoPrecoVenda($id)
    {
        $this->verifica_login();

        $data = $this->produto_model->getprecoVista($id);
        echo json_encode($data);

    }

    public function produtoPrecoPrazo($id)
    {
        $this->verifica_login();

        $data = $this->produto_model->getprecoPrazo($id);
        echo json_encode($data);

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
            
            $venda['produtos_id'] = $this->input->post('produtos_id');
            $valor_total = $this->input->post('valor_total');
            $venda['valor_total'] =$valor_total;
            $venda['clientes_id'] = $this->input->post('clientes_id');
            $venda['quantidade'] = $this->input->post('quantidade');
            $venda['forma_pagamento'] = $this->input->post('forma_pagamento');
            $venda['usuarios_id'] = $this->input->post('usuarios_id');
            $venda['status'] = $this->input->post('status');

            //Insere os dados no banco recuperando o status dessa operação
            $status = $this->venda_model->inserir($venda);
            // Checa o status da operação gravando a mensagem na seção
            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível inserir o venda.');
                $data = array('success' => true, 'msg_err' => 'Não foi possível inserir o venda.');

            } else {
                $data = array('success' => false, 'msg' => 'Venda feita com sucesso.');

                $this->session->set_flashdata('success', 'Venda inserida com sucesso.');

            }
        } else {
            $data = array('success' => false, 'msg_erros' => validation_errors('<p>', '</p>'));

            $this->session->set_flashdata('error', validation_errors('<p>', '</p>'));

        }

        echo json_encode($data);

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
                $rules['produtos_id'] = array('trim', 'required');
                $rules['valor_total'] = array('trim', 'required');
                $rules['clientes_id'] = array('trim', 'required');
                $rules['quantidade'] = array('trim', 'required');
                $rules['forma_pagamento'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');
                break;

            case 'update':
                $rules['produtos_id'] = array('trim', 'required');
                $rules['valor_total'] = array('trim', 'required');
                $rules['clientes_id'] = array('trim', 'required');
                $rules['forma_pagamento'] = array('trim', 'required');
                $rules['quantidade'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');
                break;

            default:
                $rules['produtos_id'] = array('trim', 'required');
                $rules['valor_total'] = array('trim', 'required');
                $rules['clientes_id'] = array('trim', 'required');
                $rules['forma_pagamento'] = array('trim', 'required');
                $rules['quantidade'] = array('trim', 'required');
                $rules['status'] = array('trim', 'required');
                break;
        }
        $this->form_validation->set_rules('produtos_id', 'Produto', $rules['produtos_id']);
        $this->form_validation->set_rules('valor_total', 'Valor Total', $rules['valor_total']);
        $this->form_validation->set_rules('clientes_id', 'Cliente', $rules['clientes_id']);
        $this->form_validation->set_rules('quantidade', 'Quantida do produto', $rules['quantidade']);
        $this->form_validation->set_rules('forma_pagamento', 'Forma de Pagamento', $rules['forma_pagamento']);
        $this->form_validation->set_rules('status', 'Status', $rules['status']);

        // Executa a validação e retorna o preco_vista
        return $this->form_validation->run();
    }

}
