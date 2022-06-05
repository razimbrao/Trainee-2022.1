<?php

use App\Controllers\ExampleController;
use App\Core\Router;

//-----------Rotas do Front-------------//

$router->get('quem-somos', 'ViewController@quemSomos');

$router->get('', 'ViewController@home');
$router->get('home', 'ViewController@home');

$router->get('produtos', 'ViewController@produtos');

//-----------Rota de Contato-------------//

$router->get('contato', 'ContatoController@view');

?> 
