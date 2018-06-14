<?php

require_once('acesso.php');

class Voluntario extends Pessoa
{
    private $idvoluntario;
    private $tipo;
    public function __construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo,$idvoluntario,$idpessoa,$tipo)
    {
        parent::__construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->idvoluntario=$idvoluntario;
        $this->idpessoa=$idpessoa;
        $this->tipo=$tipo;
    }
    public function getIdvoluntario()
    {
        return $this->idvoluntario;
    }
    
    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function setIdvoluntario($idvoluntario)
    {
        $this->idvoluntario = $idvoluntario;
    }
    
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    //Insert
    public function incluir($tipo) {
        try {
            $sql = 'INSERT cargo (tipo) VALUES (:tipo)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':tipo', $tipo);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    
    //excluir
    public function excluir($idcargo) {
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
    
    //Editar
    public function alterar($idfuncionario,$tipo,$carga_mensal,$primeira_entrada,$primeira_saida,$segunda_entrada,$segunda_saida,$carga_diaria,$dias_trabalhados,$folgas) {
        try {
            $sql = 'update pessoas set idfuncionario=:idfuncionario, idpessoa=:idpessoa, idcargo=:idcargo, imagem=:imagem, vale_transporte=:vale_transporte, data_admissao=:data_admissao, registro_geral=:registro_geral, orgao_emissor=:orgao_emissor, data_expedicao=:data_expedicao, pis=:pis, ctps=:ctps, uf_ctps=:uf_ctps, zona=:zona, certificado_reservista_numero=:certificado_reservista_numero, nome_mae=:nome_mae, nome_pai=:nome_pai';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    //Consultar
    public function consultar($sql) {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
    
}

