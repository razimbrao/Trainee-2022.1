<?php

use App\Controllers\CategoriasController;
use App\Core\Router;

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

//---------------Rotas de Login-------------//


?>