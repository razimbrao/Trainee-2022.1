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

    // Funções de Usuários

    public function adicionaUsuario($table, $dados)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(',', array_keys($dados)),
            ':' . implode(', :', array_keys($dados))
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dados);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deletaUsuario($table, $id)
    {
        $sql = "delete from {$table} where id={$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute(compact('id'));
        } catch (Exception $e) {
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
}
