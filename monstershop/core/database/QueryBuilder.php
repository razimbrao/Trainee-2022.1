<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}"; 

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Funções de Categorias

    public function adicionaCategoria($table, $dados)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)', 
            $table, implode(',', array_keys($dados)), 
            ':' . implode(', :', array_keys($dados))
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dados);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function editaCategoria($table, $dados, $id)
    {
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s', 
            $table, implode(', ', array_map(function ($dados){
                return "{$dados} = :{$dados}";
            },
            array_keys($dados))),
            'id = :id'
        );

        $dados['id'] = $id;

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dados);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function deletaCategoria($table, $id)
    {
        
        $sql = sprintf( 
            'DELETE FROM %s WHERE %s;',
            $table,
            "id = :id"
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute(compact('id'));
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function procurarCategoria($table, $nome)
    {

        $sql = sprintf( 
            'SELECT * FROM %s WHERE %s;',
            $table,
            "nome like '%' :nome '%' "
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute(compact('nome'));
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch(Exception $e) {
            die($e->getMessage());
        }  
    }


    // Funções de Usuários

    public function adicionar($table, $dados)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table, implode(',', array_keys($dados)),
            ':' . implode(', :', array_keys($dados))
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dados);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = "delete from {$table} where id={$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function editaUsuario($table, $dados, $foto, $id)
    {
        /* $dados['id'] = $id;

       $sql = sprintf(
            'UPDATE %s SET %s WHERE %s', 
            $table, implode(', ', array_map(function ($dados){
                return "{$dados} = :{$dados}";
            },
            array_keys($dados))),
            'id = :id'  
        );

        if($foto != ''){
            $sql = $sql . ", `foto` = {$foto}";
        }

        $sql = $sql . " WHERE `id` = {$id}";
        


        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dados);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    } */

        $sql = "update {$table} set nome = '{$dados['nome']}', email = '{$dados['email']}', senha = '{$dados['senha']}'";

        if ($foto != '') {
            $sql = $sql . ", foto = '{$foto}' WHERE id = {$id}";
        } else {
            $sql = $sql . "WHERE id = {$id}";
        }
        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Funcoes de Produtos

    public function editaProdutos($idp, $table, $parametros)
    {
        $sql = sprintf(
            'UPDATE %s
            SET %s
            WHERE %s;', 
            $table,
            implode(', ', array_map(function ($parametros) {
                return "{$parametros} = :{$parametros}";
            }, array_keys($parametros))),
            'id = :id'
        );

        $parametros['id'] = $idp;

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parametros);
        } catch (Exception $e) {
            die("An error occurred when trying to update database: {$e->getMessage()}");
        }
    }

    
   
    public function selectImagem($id){

        $sql = 'SELECT nome_imagem FROM imagens WHERE imagens.produto_id = :id';
        
        try {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(["id"=> $id]);

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectProduto(){

        $sql = 'SELECT id FROM produtos ORDER BY id DESC LIMIT 1';
        
        try {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function search($tabela, $nome){
        $sql = sprintf( 
            'SELECT * FROM %s WHERE %s;',
            $tabela,
            "nome like '%' :nome '%' "
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute(compact('nome'));
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch(Exception $e) {
            die($e->getMessage());
        }  
    }
}
