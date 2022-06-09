<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ProdutosController
{
    public function view()
    {
        $produtos = App::get('database')->selectAll('produtos');
        
        $tabela = [
            'produtos' => $produtos
        ];        

        return view('/admin/produtos', $tabela);
    }

    public function show()
    {
        echo "Passou";
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
