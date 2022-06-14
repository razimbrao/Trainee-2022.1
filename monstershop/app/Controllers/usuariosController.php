<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController
{

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

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function view()
    {
        $usuarios = App::get('database')->selectAll('usuarios');

        $tabela = [
            'usuarios' => $usuarios
        ];        

        return view('/admin/usuarios', $tabela);
    }

    public function create()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $foto = filter_input(INPUT_POST, 'foto');

        if(!$nome || !$email || !$senha) {
            header('Location: /admin/usuarios');
            exit();
        }

        if(!$foto) {
            $foto = 'fotoPadrao.txt';
        }

        $emailExist = App::get('database')->procurar('usuarios', 'email', $email);

        if($emailExist) {
            $_SESSION['emailCadastrado'] = 'Erro ao criar usuário: Email já cadastrado!';
            header('Location: /admin/usuarios');
            exit();
        }

        App::get('database')->adicionar('usuarios', compact('nome', 'email', 'senha', 'foto'));

        header('Location: /admin/usuarios');
        exit();
    }

    public function store()
    {

    }

    public function edit()
    {
  
    }

    public function update()
    {
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        $foto = $_POST['foto'];

        App::get('database')->editaUsuario('usuarios', $dados, $foto, $_POST['id']);

        header('Location: /admin/usuarios');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->deletaUsuario('usuarios', $id);

        header('Location: /admin/usuarios');
    }
}
