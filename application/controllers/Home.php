<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

   
    public function index()
    {

        $dados['titulo'] = 'Home';
        $this->load->view('template/header', $dados);
        $this->load->view('template/menu-lateral');
        $this->load->view('home');
        $this->load->view('template/footer');

    }
}
