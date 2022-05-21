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

    public function adicionaUsuario($table, $dados)
    {
        $sql = "insert into {$table} (nome, email, senha, foto) values ('{$dados['nome']}', '{$dados['email']}', '{$dados['senha']}', '{$dados['foto']}')";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function deletaUsuario($table, $id)
    {
        $sql = "delete from {$table} where id={$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function editaUsuario($table, $dados)
    {
        $sql = "update {$table} set nome = '{$dados['nome']}', email = '{$dados['email']}', senha = '{$dados['senha']}', foto = '{$dados['foto']}' where id='{$dados['id']}'";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
