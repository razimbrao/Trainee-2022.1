<?php

use App\Controllers\ContatoController;
use App\Core\Router;
$router->get('contato', 'ContatoController@view');
$router->post('contato/enviaremail', 'ContatoController@enviaEmail');
?> 
