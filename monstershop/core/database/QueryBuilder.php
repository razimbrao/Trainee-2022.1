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

    //Funções Genéricas

    /*public function adicionar($table, $dados)
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
    }*/


    public function editar($table, $dados, $id)
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


    public function deletar($table, $id)
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


    public function procurar($table, $nomeCampo, $campoPesquisado)
    {

        $sql = sprintf( 
            'SELECT * FROM %s WHERE %s;',
            $table,
            "$nomeCampo like '%' :campoPesquisado '%' "
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute(compact('campoPesquisado'));
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

    public function selectProduto($produtos, $categ, $id){        

        $sql = "SELECT * FROM {$produtos} WHERE id = {$id}";
        $categorias = $this->selectAll($categ);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = [
                "produtos" => $stmt->fetchAll(PDO::FETCH_CLASS),
                "categorias" => $categorias
            ];

            return $result;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

}
