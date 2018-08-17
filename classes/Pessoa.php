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

    
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getNumero_endereco()
    {
        return $this->numero_endereco;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getRegistro_geral()
    {
        return $this->registro_geral;
    }

    public function getOrgao_emissor()
    {
        return $this->orgao_emissor;
    }

    public function getData_expedicao()
    {
        return $this->data_expedicao;
    }

    public function getNome_mae()
    {
        return $this->nome_mae;
    }

    public function getNome_pai()
    {
        return $this->nome_pai;
    }

    public function getTipo_sanguineo()
    {
        return $this->tipo_sanguineo;
    }

    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function setNumero_endereco($numero_endereco)
    {
        $this->numero_endereco = $numero_endereco;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function setRegistro_geral($registro_geral)
    {
        $this->registro_geral = $registro_geral;
    }

    public function setOrgao_emissor($orgao_emissor)
    {
        $this->orgao_emissor = $orgao_emissor;
    }

    public function setData_expedicao($data_expedicao)
    {
        $this->data_expedicao = $data_expedicao;
    }

    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;
    }

    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;
    }

    public function setTipo_sanguineo($tipo_sanguineo)
    {
        $this->tipo_sanguineo = $tipo_sanguineo;
    }

    // Insert
    public function incluirPessoa($pessoa)
    {
        try {
            
            $sql = 'insert into pessoa( cpf, senha, nome, sexo, telefone, data_nascimento, imagem, cep, cidade, bairro, logradouro, numero_endereco, complemento, registro_geral, orgao_emissor, data_expedicao, nome_mae, nome_pai, tipo_sanguineo) values ( :cpf, :senha, :nome, :sexo, :telefone, :data_nascimento, :imagem, :cep, :cidade, :bairro, :logradouro, :numero_endereco, :complemento, :registro_geral, :orgao_emissor, :data_expedicao, :nome_mae, :nome_pai, :tipo_sanguineo);';
            
            $sql = str_replace("'", "\'", $sql);
            
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':cpf', $pessoa->getCpf());
            $stmt->bindParam(':senha', $pessoa->getSenha());
            $stmt->bindParam(':nome', $pessoa->getNome());
            $stmt->bindParam(':sexo', $pessoa->getSexo());
            $stmt->bindParam(':telefone', $pessoa->getTelefone());
            $stmt->bindParam(':data_nascimento', $pessoa->getData_nascimento());
            $stmt->bindParam(':imagem', $pessoa->getImagem());
            $stmt->bindParam(':cep', $pessoa->getCep());
            $stmt->bindParam(':cidade', $pessoa->getCidade());
            $stmt->bindParam(':bairro', $pessoa->getBairro());
            $stmt->bindParam(':logradouro', $pessoa->getLogradouro());
            $stmt->bindParam(':numero_endereco', $pessoa->getNumero_endereco());
            $stmt->bindParam(':complemento', $pessoa->getComplemento());
            $stmt->bindParam(':registro_geral', $pessoa->getRegistro_geral());
            $stmt->bindParam(':orgao_emissor', $pessoa->getOrgao_emissor());
            $stmt->bindParam(':data_expedicao', $pessoa->getData_expedicao());
            $stmt->bindParam(':nome_mae', $pessoa->getNome_mae());
            $stmt->bindParam(':nome_pai', $pessoa->getNome_pai());
            $stmt->bindParam(':tipo_sanguineo', $pessoa->getTipo_sanguineo());
            
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

