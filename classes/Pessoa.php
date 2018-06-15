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
    
    private $ibge;
    
    private $rua;
    
    private $numero_endereco;
    
    private $complemento;
    
    private $registro_geral;
    
    private $orgao_emissor;
    
    private $data_expedicao;
    
    private $nome_mae;
    
    private $nome_pai;
    
    
    
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }
    
    public function getcpf()
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
    
    public function getIbge()
    {
        return $this->ibge;
    }
    
    public function getRua()
    {
        return $this->rua;
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
    
    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }
    
    public function setcpf($cpf)
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
    
    public function setIbge($ibge)
    {
        $this->ibge = $ibge;
    }
    
    public function setRua($rua)
    {
        $this->rua = $rua;
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
    
    // Insert
    
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

