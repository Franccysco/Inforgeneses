<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function index()
    {
        $this->verifica_login();

        // Titulo da página
        $dados['titulo'] = 'Home';
        // Carrega a view passando os dados do registro
        $this->render_page('home', $dados);

    }
}
