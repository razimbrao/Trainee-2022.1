<?php

use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('admin/produtos', 'ProdutosController@view');

$router->post('admin/produtos/adicionar', 'ProdutosController@create');

$router->post('admin/produtos/excluir', 'ProdutosController@delete');

$router->post('admin/produtos/pesquisar', 'ProdutosController@show');

$router->post('admin/produtos/editar', 'ProdutosController@update');

?> 
