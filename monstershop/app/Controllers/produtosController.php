<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ProdutosController
{

    public function view()
    {
        if(!empty($_POST['pesquisa'])) {
            $produto = filter_input(INPUT_POST, 'pesquisa', FILTER_SANITIZE_SPECIAL_CHARS);  
            $produtos = App::get('database')->search('produtos', $produto);
            return view('admin/produtos', compact('produtos'));  
        }  

        $produtos = App::get('database')->selectAll('produtos');

        for ($i = 0; $i < count($produtos) ; $i++) { 
            $produtoImagem = App::get('database')->selectImagem($produtos[$i]->id);
            $produtos[$i]->imagens = $produtoImagem;
        }

        $categorias = App::get('database')->selectAll('categorias');
        $imagens = App::get('database')->selectAll('imagens');

        $table = [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'imagens' => $imagens
        ];
        return view('admin/produtos', $table);
    }

    public function show()
    {
        
    }

    public function create()
    {

        $parametros = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'categoriaID' => $_POST['categoriaID'],
            'preco' => $_POST['preco'],
        ];
        
        App::get('database')->insert('produtos', $parametros);

        $produto_id = App::get('database')->selectProduto();

        $coluna = $_FILES['txtimagem']['name'];

        for ($i=0; $i < count($coluna); $i++) { 
            
            $imagens = [
                'produtoID' => $produto_id[0]->id,
                'nome_imagem' => $coluna[$i],
            ];
            App::get('database')->insert('imagens', $imagens);
        }
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
            'categoriaID' => $_POST['categoriaID'],
            'preco' => $_POST['preco'],
        ];
        
        $id = $_POST['id'];
        
        App::get('database')->editaProdutos($id, 'produtos', $parametros);
        
        $contador = false;
        $coluna = $_FILES['txtimagem']['name'];
        if($coluna[0] != ""){
            $contador = true;
        }

        if($contador){
            App::get('database')->delete('imagens', $_POST['id']);

            for($i = 0; $i < sizeof($coluna); $i++){
                $imagens = [
                    'produtoID' => $_POST['id'],
                    'nome_imagem' => $coluna[$i],
                ];
            }
            App::get('database')->insert('imagens', $imagens);
        }
        
        header('Location: /admin/produtos');
    }
    

    public function delete()
    {

        app::get('database')->delete('produtos', $_POST['id']);
        header('Location: /admin/produtos');
    }
}
