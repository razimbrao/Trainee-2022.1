<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function __construct() 
    {
        session_start();
        $url = $_SERVER['REQUEST_URI'];
        if(!str_contains($url, 'logout')) {
            if(!empty($_SESSION['logado'])) {
                header('Location: /admin/dashboard');
                exit();
            }
        }
    }

    public function view(){
        $usuarios = App::get('database')->selectAll('usuarios');
        $tables = [
            'usuarios' => $usuarios,
        ];
        return view('admin/login',$tables);
    }


    public function validacao(){

        //session_start();

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

        if(!$email || !$senha){
            $_SESSION['loginInvalido'] = "Erro ao fazer login";
            header('Location: /admin/login');
            exit();
        }

        //$senha = md5($senha);

        //$user = App::get('database')->logar($email, $senha);
        $user = App::get('database')->procurar('usuarios', 'email', $email);

        if(!$user) 
        {
            $_SESSION['loginInvalido'] = "Erro ao fazer login";
            header('Location: /admin/login');
            exit();
        }

        if(strcmp(base64_encode($senha), $user[0]->senha)) {
            $_SESSION['loginInvalido'] = "Erro ao fazer login";
            header('Location: /admin/login');
            exit();
        }

        $_SESSION['logado'] = 'logado';
        header('Location: /admin/dashboard');
        exit();
    }

    public function logout() 
    {
        session_start();
        $_SESSION['logado'] = false;
        session_destroy();
        header('Location: /admin/login');
        exit();
    }

}
