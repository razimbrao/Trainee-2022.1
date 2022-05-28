<?php

use App\Controllers\ExampleController;
use App\Core\Router;

//---------Rotas de Usuários----------//

$router->get('admin/usuarios', 'UsuariosController@view');

$router->post('admin/usuarios/adicionar', 'UsuariosController@create');

$router->post('admin/usuarios/excluir', 'UsuariosController@delete');

$router->post('admin/usuarios/editar', 'UsuariosController@update');



?>  
