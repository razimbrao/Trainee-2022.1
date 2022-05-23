<?php

use App\Controllers\CategoriasController;
use App\Core\Router;

$router->get('categorias', 'CategoriasController@index');

$router->post('categorias/create', 'CategoriasController@create');

?> 
