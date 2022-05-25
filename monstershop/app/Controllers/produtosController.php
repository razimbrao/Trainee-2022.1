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
