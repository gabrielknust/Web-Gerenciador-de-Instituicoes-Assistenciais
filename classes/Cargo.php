<?php
require_once ('acesso.php');
require_once ('Funcionario.php');

class Cargo
{

    private $id_cargo;

    private $descricao;

    public function __construct()
    {}

    // Insert
    public function incluir($descricao)
    {
        try {
            $sql = 'INSERT cargo (descricao) VALUES (:descricao)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':descricao', $descricao);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // excluir
    public function excluir($idcargo)
    {
        try {
            $sql = 'DELETE from cargo WHERE idcargo = :idcargo';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idcargo', $idcargo);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Editar
    public function alterar($idcargos, $descricao)
    {
        try {
            $sql = 'update cargos set idcargos=:idcargos,descricao=:descricao where idcargos= :idcargos';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idcargos', $idcargos);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela cargos = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Consultar
    public function consultar($sql)
    {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
}

