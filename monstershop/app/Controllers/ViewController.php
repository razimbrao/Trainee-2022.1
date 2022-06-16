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

        $produtosHome = [];

        for($i = 0; $i < 6; $i++) {
            $produtosHome[$i] =  $produtos[$i];
        }

        $tabela = [
            'produtos' => $produtosHome
        ];

        return view('site/home', $tabela);
    }

    public function produtos()
    {
        $page = 1;

        // Filtro produtos barra de pesquisa
        if (!empty($_POST['nome'])) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $produtos = App::get('database')->procurar('produtos', 'nome', $nome);
            $categorias = App::get('database')->selectAll('categorias');
            return view('site/produtos', compact('produtos', 'categorias'));
        }

        // Filtro categorias dropdown
        if (!empty($_POST['categoriaID'])) {

            if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
                $page = intval($_GET['pagina']);

                if ($page <= 0) {
                    return redirect('produtos');
                }
            }

            $items_per_page = 9;
            $start_limit = $items_per_page * $page - $items_per_page;

            $categoria = filter_input(INPUT_POST, 'categoriaID', FILTER_SANITIZE_SPECIAL_CHARS);
            $produtos = App::get('database')->procurar('produtos', 'categoriaID', $categoria);
            $categorias = App::get('database')->selectAll('categorias');

            $rows_count = count($produtos);

            if ($start_limit > $rows_count) {
                return redirect('produtos');
            }

            $total_pages = ceil($rows_count / $items_per_page);
            return view('site/produtos', compact('produtos', 'categorias', 'page', 'total_pages'));
        }


        if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
            $page = intval($_GET['pagina']);

            if ($page <= 0) {
                return redirect('produtos');
            }
        }

        $items_per_page = 9;
        $start_limit = $items_per_page * $page - $items_per_page;
        $rows_count = App::get('database')->countAll('produtos');

        if ($start_limit > $rows_count) {
            return redirect('produtos');
        }

        $total_pages = ceil($rows_count / $items_per_page);

        $produtos = App::get('database')->selectAll('produtos', $start_limit, $items_per_page);
        $categorias = App::get('database')->selectAll('categorias');
        return view('site/produtos', compact('produtos', 'categorias', 'page', 'total_pages'));
    }


    
    public function produto()
    {
        $id = intval($_GET['id']);

        $result = App::get('database')->selectProduto("produtos", "categorias", $id);

        $categoriaProduto = array();
        foreach ($result["categorias"] as $categoria) {
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
