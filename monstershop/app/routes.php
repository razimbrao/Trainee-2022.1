<?php

use App\Controllers\ExampleController;
use App\Core\Router;

//-----------Rotas do Front-------------//

$router->get('quem-somos', 'ViewController@quemSomos');

$router->get('home', 'ViewController@home');

?> 
