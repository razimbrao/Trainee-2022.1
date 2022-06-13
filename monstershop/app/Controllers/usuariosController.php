<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController
{

    public function view()
    {
        if(!empty($_POST['usuario'])) {
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);  
            $usuarios = App::get('database')->procurarUsuario('usuarios', $usuario);
            return view('admin/usuarios', compact('usuarios'));  
        }
        
        $usuarios = App::get('database')->selectAll('usuarios');
        return view('admin/usuarios', compact('usuarios')); 

        // $usuarios = App::get('database')->selectAll('usuarios');

        // $tabela = [
        //     'usuarios' => $usuarios
        // ];        

        // return view('/admin/usuarios', $tabela);
    }

    public function create()
    {
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => $_POST['foto']
        ];

        App::get('database')->adicionar('usuarios', $dados);

        header('Location: /admin/usuarios');
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

        App::get('database')->delete('usuarios', $id);

        header('Location: /admin/usuarios');
    }
}
