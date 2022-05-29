<?php

use App\Controllers\CategoriasController;
use App\Core\Router;

$router->get('admin/categorias', 'CategoriasController@index');
$router->post('admin/categorias', 'CategoriasController@index');

$router->post('admin/categorias/create', 'CategoriasController@create');

$router->post('admin/categorias/delete', 'CategoriasController@delete');

$router->post('admin/categorias/edit', 'CategoriasController@update');


?> 
