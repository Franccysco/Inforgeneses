<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends MY_Controller
{

    public function index()
    {

        $dados['titulo'] = 'Produtos';
        $dados['produtos'] = null;

        $this->render_page('produtos/produtos', $dados);

    }

    /**
     * Carrega a view para cadastro dos usuários
     */
    public function cadastro()
    {
        $dados['titulo'] = 'Produtos-cadastro';
        $this->render_page('produtos/cadastroProduto', $dados);
    }

    /**
     * Carrega a view para edição dos dados
     */
    public function Editar()
    {

        $dados['titulo'] = 'produtos-editar';
        $this->render_page('produtos/editarProduto', $dados);

    }

}
