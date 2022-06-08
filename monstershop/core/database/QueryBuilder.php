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

    public function selectAll($table, $start_limit = null, $rows_amount = null)
    {
        $sql = "select * from {$table}"; 

        if  ($start_limit >= 0 && $rows_amount > 0)
        {
            $sql .= " LIMIT {$start_limit}, {$rows_amount}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Funções de Categorias

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
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


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


    public function deletar($table, $id, $campoPesquisado = 'id')
    {
        
        $sql = sprintf( 
            'DELETE FROM %s WHERE %s;',
            $table,
            "$campoPesquisado = :id"
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

    public function countAll($table)
    {
        $sql = "SELECT COUNT(*) FROM {$table}";

        try {
            $statement = $this->pdo->prepare($sql);
    
            $statement->execute();

            return intval($statement->fetch(PDO::FETCH_NUM)[0]);
        } catch (Exception $e) {
            die("An error occurred when trying to count from database: {$e->getMessage()}");
        }
    }
    
}
