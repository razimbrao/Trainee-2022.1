<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuariosController
{

    public function show()
    {
        $usuarios = App::get('database')->selectAll('usuarios');

        $tabela = [
            'usuarios' => $usuarios
        ];        

        return view('/admin/usuarios', $tabela);
    }

    public function create()
    {
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => $_POST['foto']
        ];

        App::get('database')->adicionaUsuario('usuarios', $dados);

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
        
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->deletaUsuario('usuarios', $id);

        header('Location: /admin/usuarios');
    }
}
