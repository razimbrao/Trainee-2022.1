<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ViewController
{

    public function quemSomos()
    {
        return view('site/quem-somos');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function home()
    {
        $produtos = App::get('database')->selectAll('produtos');

        $tabela = [
            'produtos' => $produtos
        ];

        return view('site/home', $tabela);
    }

    public function produtos()
    {
        $produtos = App::get('database')->selectAll('produtos');

        $tabela = [
            'produtos' => $produtos
        ];

        return view('site/produtos', $tabela);
    }

    public function produto()
    {
        $id = intval($_GET['id']);
        
        $result = App::get('database')->selectProduto("produtos", "categorias" ,$id);

        $categoriaProduto = array();
        foreach ($result["categorias"] as $categoria)
        {
            $categoriaProduto += [
                "{$categoria->id}" => $categoria->nome
            ];
        }

        $tabela = [
            "produto" => $result["produtos"][0],
            "categorias" => $categoriaProduto
        ];

        return view('site/produto', $tabela);
    }

    public function create()
    {
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
    }
}
