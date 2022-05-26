<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ProdutosController
{

    public function show()
    {
        
    }

    public function create()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'categoria' => $_POST['categoria'],
            'preco' => $_POST['preco'],
            'foto1' => $_POST['foto1'],
            'foto2' => $_POST['foto2'],
            'foto3' => $_POST['foto3'],
        ];
        App::get('database')->criaProdutos('produtos', $parametros);
        header('Location: /admin/produtos');
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'categoria' => $_POST['categoria'],
            'preco' => $_POST['preco'],
            'foto1' => $_POST['foto1'],
            'foto2' => $_POST['foto2'],
            'foto3' => $_POST['foto3'],
        ];
        $id = $_POST['id'];
        App::get('database')->editaProdutos($id, 'produtos', $parametros);
        header('Location: /admin/produtos');
    }
    public function view()
    {
        $produtos = App::get('database')->selectAll('produtos');
        $table = [
            'produtos' => $produtos,
        ];
        return view('admin/produtos', $table);
    }

    public function delete()
    {

        app::get('database')->deletaProdutos('produtos', $_POST['id']);
        header('Location: /admin/produtos');
    }
}
