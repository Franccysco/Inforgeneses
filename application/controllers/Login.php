<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function index()
    {

        $dados['titulo'] = 'Login';
       
        $this->load->view('login', $dados);
    }

   

}
