<?php

use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('admin/usuarios', 'UsuariosController@show');
$router->post('admin/usuarios/adicionar', 'UsuariosController@create');
$router->post('admin/usuarios/excluir', 'UsuariosController@delete');
$router->post('admin/usuarios/editar', 'UsuariosController@update');

?> 
