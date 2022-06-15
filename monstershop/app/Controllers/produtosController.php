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
            $produtos = App::get('database')->procurar('produtos', $produto);
            return view('admin/produtos', compact('produtos'));  
        }  

        $produtos = App::get('database')->selectAll('produtos');

        for ($i = 0; $i < count($produtos) ; $i++) { 
            $produtoImagem = App::get('database')->selecionarNomeImagem($produtos[$i]->id);
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

    public function create()
    {
        //parte de produtos
        $parametros = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'categoriaID' => $_POST['categoriaID'],
            'preco' => $_POST['preco'],
        ];
        
        App::get('database')->adicionar('produtos', $parametros);

        //parte de imagens
        $produto_id = App::get('database')->selecionarIDProduto();

        $coluna = $_FILES['txtimagem']['name'];
        for ($i=0; $i < count($coluna); $i++) { 
            
            $imagens = [
                'produtoID' => $produto_id[0]->id,
                'nome_imagem' => $coluna[$i],
            ];
            App::get('database')->adicionar('imagens', $imagens);
        }
        header('Location: /admin/produtos');
    }

    public function update()
    {
        //parte de produtos
        $parametros = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'categoriaID' => $_POST['categoriaID'],
            'preco' => $_POST['preco'],
        ];
        
        $id = $_POST['id'];
        
        App::get('database')->editar('produtos', $parametros, $id);

        //parte de imagens
        $contador = false;

        $coluna = $_FILES['txtimagem']['name'];
        if($_FILES['txtimagem'] != NULL && $coluna[0] != ""){
            $contador = true;
        }
        
        if($contador){
            app::get('database')->deletarImagens($_POST['id']);

            for($i = 0; $i < sizeof($coluna); $i++){
                $imagens = [
                    'produtoID' => $id,
                    'nome_imagem' => $coluna[$i],
                ];
                App::get('database')->adicionar('imagens', $imagens);
            }
        }
        
        header('Location: /admin/produtos');
    }
    

    public function delete()
    {
        app::get('database')->deletar('produtos', $_POST['id']);
        app::get('database')->deletarImagens($_POST['id']);

        header('Location: /admin/produtos');
    }
}
