<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ProdutosController
{
    public function index()
    {   
        $page = 1;

        if(!empty($_POST['categoria'])) {

            if (isset($_GET['pagina']) && !empty($_GET['pagina']))
            {
                $page = intval($_GET['pagina']);

                if ($page <= 0)
                {
                    return redirect('site/produtos');
                }
            }

            $items_per_page = 9;
            $start_limit = $items_per_page * $page - $items_per_page;

            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);  
            $produtos = App::get('database')->procurar('produtos', 'categoria', $categoria);
            $categorias = App::get('database')->selectAll('categorias');

            $rows_count = count($produtos);

            if ($start_limit > $rows_count) {
                return redirect('site/produtos');
            }

            $total_pages = ceil($rows_count / $items_per_page);
            return view('site/produtos', compact('produtos', 'categorias', 'page', 'total_pages')); 
        }

        if (isset($_GET['pagina']) && !empty($_GET['pagina']))
        {
            $page = intval($_GET['pagina']);

            if ($page <= 0)
            {
                return redirect('site/produtos');
            }
        }

        $items_per_page = 9;
        $start_limit = $items_per_page * $page - $items_per_page;
        $rows_count = App::get('database')->countAll('produtos');
        
        if ($start_limit > $rows_count) {
            return redirect('site/produtos');
        }

        $total_pages = ceil($rows_count / $items_per_page);

        $produtos = App::get('database')->selectAll('produtos', $start_limit, $items_per_page);
        $categorias = App::get('database')->selectAll('categorias');
        return view('site/produtos', compact('produtos', 'categorias', 'page', 'total_pages'));

    }

}


