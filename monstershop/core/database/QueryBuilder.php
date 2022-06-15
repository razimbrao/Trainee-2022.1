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

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function delete($tabela, $id)
    {
        $sql = "delete from {$tabela} where id={$id}";


        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

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

    
    public function insert($table, $parametros)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)', 
            $table, implode(',', array_keys($parametros)), 
            ':' . implode(', :', array_keys($parametros))
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($parametros);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function selectImagem($id){

        $sql = 'SELECT nome_imagem FROM imagens WHERE imagens.produtoID = :id';
        
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
            return $stmt->fetchAll(PDO::FETCH_OBJ);
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
