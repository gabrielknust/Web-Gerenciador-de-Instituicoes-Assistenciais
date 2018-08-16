<?php
require_once ('acesso.php');

abstract class Pessoa
{

    private $idpessoa;

    private $cpf;

    private $senha;

    private $nome;

    private $sexo;

    private $telefone;

    private $data_nascimento;

    private $imagem;

    private $cep;

    private $cidade;

    private $bairro;

    private $logradouro;

    private $numero_endereco;

    private $complemento;

    private $registro_geral;

    private $orgao_emissor;

    private $data_expedicao;

    private $nome_mae;

    private $nome_pai;
    
    private $tipo_sanguineo;

    // Insert
    public function incluirPessoa($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $tipo_sanguineo)
    {
        try {
            
            $sql = 'insert into pessoa( cpf, senha, nome, sexo, telefone, data_nascimento, imagem, cep, cidade, bairro, logradouro, numero_endereco, complemento, registro_geral, orgao_emissor, data_expedicao, nome_mae, nome_pai, tipo_sanguineo) values ( :cpf, :senha, :nome, :sexo, :telefone, :data_nascimento, :imagem, :cep, :cidade, :bairro, :logradouro, :numero_endereco, :complemento, :registro_geral, :orgao_emissor, :data_expedicao, :nome_mae, :nome_pai, :tipo_sanguineo);';
            
            $sql = str_replace("'", "\'", $sql);
            
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numero_endereco', $numero_endereco);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            $stmt->bindParam(':tipo_sanguineo', $tipo_sanguineo);
            
            $stmt->execute();
            
            $this->consultar("select max(id_pessoa) as idP from pessoa");
            $linha = $this->Linha;
            $rs = $this->Result;
            $id_pessoa = $rs[0]['idP'];
            
            // $logs = new Logs();
            // $logs->incluir($_SESSION['idusuarios'], $sql, 'pessoa', 'Inserir');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoa = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
        
        return $id_pessoa;
    }

    // excluir
    public function excluir($idpessoa)
    {
        try {
            $sql = 'DELETE from pessoa WHERE idpessoa = :idpessoa';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idpessoa', $idpessoa);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    public function consultar($sql)
    {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
}

