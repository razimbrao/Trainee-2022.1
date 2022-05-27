<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{
    public function index()
    {
       $categorias = App::get('database')->selectAll('categorias');

       return view('admin/frontend_adm_categorias', compact('categorias')); 
    }

    public function show()
    {
       
    }

    public function create()
    {
        //filtagrem para seguranca
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);             
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);      
        
        App::get('database')->adicionaCategoria('categorias', compact('nome', 'descricao'));

        header('Location: /admin/categorias');
 
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
