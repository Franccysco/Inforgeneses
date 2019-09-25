<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Login
$route['login'] = 'login';
$route['logout'] = 'login/logout';

//Produtos
$route['produtos'] = 'produto';
$route['produtos/cadastro'] = 'produto/cadastro';
$route['produtos/editar/(:num)'] = 'produto/editar/$1';
$route['produto/salvar'] = 'produto/salvar';
$route['produto/atualizar'] = 'produto/atualizar';
$route['produto/excluir/(:num)'] = 'produto/excluir/$1';


//Usuários
$route['usuarios'] = 'usuario';
$route['usuarios/cadastro'] = 'usuario/cadastro';
$route['usuarios/salvar'] = 'usuario/salvar';
$route['usuarios/editar/(:num)'] = 'usuario/editar/$1';
$route['usuario/atualizar'] = 'usuario/atualizar';
$route['usuario/excluir/(:num)'] = 'usuario/excluir/$1';
$route['usuario/atualizaSenha'] = 'usuario/atualizaSenha';


//Clientes
$route['clientes'] = 'cliente';
$route['clientes/cadastro'] = 'cliente/cadastro';
$route['clientes/editar/(:num)'] = 'cliente/editar/$1';
$route['cliente/salvar'] = 'cliente/salvar';
$route['cliente/atualizar'] = 'cliente/atualizar';
$route['cliente/excluir/(:num)'] = 'cliente/excluir/$1';


//vendas
$route['vendas'] = 'venda';
$route['venda/vendas'] = 'venda/todasVendas';
$route['venda/produtos_vista/(:num)'] = 'venda/produtoPrecoVenda/$1';
$route['venda/produtos_prazo/(:num)'] = 'venda/produtoPrecoPrazo/$1';
$route['venda/salvar'] = 'venda/salvar';
$route['venda/excluir'] = 'venda/excluir';





