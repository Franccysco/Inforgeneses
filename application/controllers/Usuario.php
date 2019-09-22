<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends MY_Controller
{

    public function index()
    {

        $dados['titulo'] = 'Usuarios';
        $dados['usuarios'] = null;

        $this->render_page('usuarios/usuarios', $dados);

    }

    /**
     * Carrega a view para cadastro dos usuários
     */
    public function cadastro()
    {
        $dados['titulo'] = 'Usuarios-cadastro';
        $this->render_page('usuarios/cadastroUsuario', $dados);
    }

    /**
     * Carrega a view para edição dos dados
     */
    public function Editar()
    {

        $dados['titulo'] = 'Usuarios-editar';
        $this->render_page('usuarios/editarUsuario', $dados);

    }

}
