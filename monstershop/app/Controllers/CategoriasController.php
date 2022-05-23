<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{
    public function index()
    {
       $allCategorias = App::get('database')->selectAll('categorias');

       return view('admin/frontend_adm_categorias', compact('allCategorias'));
    }

    public function show()
    {
       
    }

    public function create()
    {
        
 
    }

    public function store()
    {   
        $nome = filter_input(INPUT_POST, 'nomeCat');
        $descricao = filter_input(INPUT_POST, 'desCat');

        if($nome && $descricao) {
            App::get('datebase')->store('categorias', $nome, $descricao);
        }
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
