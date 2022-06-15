<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{

    /*public function __construct()
    {
        session_start();
        $url = $_SERVER['REQUEST_URI'];
        if (!str_contains($url, 'logout')) {
            if (!empty($_SESSION['logado'])) {
                header('Location: /dashboard');
                exit();
            }
        }
    }*/

    public function __construct()
    {
        session_start();
        $url = $_SERVER['REQUEST_URI'];
        if(!str_contains($url, 'usuarios')) {
            if(!isset($_SESSION['logado']) || empty($_SESSION['logado'])) {
                $_SESSION['loginInvalido'] = 'Faça login para acessar!';
                header('Location: /admin/login');
                exit();
            }
        }
    }

    public function index()
    {
        if(!empty($_POST['categoria'])) {
            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);  
            $categorias = App::get('database')->procurar('categorias', 'nome', $categoria);
            return view('admin/categorias', compact('categorias'));  
        }
        
        $categorias = App::get('database')->selectAll('categorias');
        return view('admin/categorias', compact('categorias')); 
    }
    

    public function create()
    {
        //filtagrem para seguranca
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);             
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);      
        
        App::get('database')->adicionar('categorias', compact('nome', 'descricao'));

        header('Location: /admin/categorias');
    }

    public function update()
    {
        //filtagrem para seguranca
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

        App::get('database')->editar('categorias', compact('nome', 'descricao'), $_POST['id']);

        header('Location: /admin/categorias');
    }

    public function delete()
    {
        App::get('database')->delete('categorias', $_POST['id']);

        header('Location: /admin/categorias');
    }
}
