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
    
}
