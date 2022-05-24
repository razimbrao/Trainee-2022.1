<?php

use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('produtos', 'ProdutosController@index');

$router->post('produtos/create', 'ProdutosController@create');

$router->post('produtos/delete', 'PController@delete');

$router->get('produtos/show', 'PController@show');

$router->post('produtos/update', 'PController@update');

?> 
