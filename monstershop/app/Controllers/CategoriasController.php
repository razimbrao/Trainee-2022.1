<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{
    public function index()
    {
        if(!empty($_POST['categoria'])) {
            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);  
            $categorias = App::get('database')->procurarCategoria('categorias', $categoria);
            return view('admin/frontend_adm_categorias', compact('categorias'));  
        }
        
        $categorias = App::get('database')->selectAll('categorias');
        return view('admin/frontend_adm_categorias', compact('categorias')); 
    }


    public function create()
    {
        //filtagrem para seguranca
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);             
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);      
        
        App::get('database')->adicionar('categorias', compact('nome', 'descricao'));

        header('Location: /admin/categorias');
 
    }

    public function update()
    {
        //filtagrem para seguranca
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);             
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
   
        App::get('database')->editaCategoria('categorias', compact('nome', 'descricao'), $_POST['id']);

        header('Location: /admin/categorias');
    }

    public function delete()
    {
        App::get('database')->delete('categorias', $_POST['id']);

        header('Location: /admin/categorias');
    }


}
