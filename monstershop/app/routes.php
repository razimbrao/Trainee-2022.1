<?php

use App\Controllers\CategoriasController;
use App\Core\Router;

//-----------Rotas do Front-------------//

$router->get('quem-somos', 'ViewController@quemSomos');

$router->get('', 'ViewController@home');
$router->get('home', 'ViewController@home');

$router->get('produtos', 'ViewController@produtos');


//-----------Rota de Contato-------------//

$router->get('contato', 'ContatoController@view');


//---------Rotas de Usuários----------//

$router->get('admin/usuarios', 'UsuariosController@view');

$router->post('admin/usuarios/adicionar', 'UsuariosController@create');

$router->post('admin/usuarios/excluir', 'UsuariosController@delete');

$router->post('admin/usuarios/editar', 'UsuariosController@update');


//---------Rotas de Categorias----------//

$router->get('admin/categorias', 'CategoriasController@index');
$router->post('admin/categorias', 'CategoriasController@index');

$router->post('admin/categorias/create', 'CategoriasController@create');

$router->post('admin/categorias/delete', 'CategoriasController@delete');

$router->post('admin/categorias/edit', 'CategoriasController@update');

$router->get('admin/usuarios', 'UsuariosController@view');

$router->post('admin/usuarios/adicionar', 'UsuariosController@create');

$router->post('admin/usuarios/excluir', 'UsuariosController@delete');

$router->post('admin/usuarios/editar', 'UsuariosController@update');



//---------Rotas de Categorias----------//

$router->get('admin/categorias', 'CategoriasController@index');
$router->post('admin/categorias', 'CategoriasController@index');

$router->post('admin/categorias/create', 'CategoriasController@create');

$router->post('admin/categorias/delete', 'CategoriasController@delete');

$router->post('admin/categorias/edit', 'CategoriasController@update');


//---------------Rotas de Login-------------//

$router->get('admin/login','LoginController@view');

$router->post('admin/login/validacao', 'LoginController@validacao');

?>