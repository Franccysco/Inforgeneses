<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends MY_Controller
{

    public function index()
    {

        $dados['titulo'] = 'Clientes';
        $dados['clientes'] = null;

        $this->render_page('clientes/clientes', $dados);

    }

    /**
     * Carrega a view para cadastro dos usuários
     */
    public function cadastro()
    {
        $dados['titulo'] = 'Clientes-cadastro';
        $this->render_page('clientes/cadastroCliente', $dados);
    }


    /**
     * Carrega a view para edição dos dados
     */
    public function editar()
    {

        $dados['titulo'] = 'Clientes-editar';
        $this->render_page('clientes/editarCliente', $dados);

    }
}
