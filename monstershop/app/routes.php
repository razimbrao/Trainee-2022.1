<?php

use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('admin/produtos', 'ProdutosController@view');

$router->post('admin/produtos/criar', 'ProdutosController@create');

$router->post('admin/produtos/excluir', 'ProdutosController@delete');

$router->get('admin/produtos/show', 'ProdutosController@show');

$router->post('admin/produtos/editar', 'ProdutosController@update');

?> 
