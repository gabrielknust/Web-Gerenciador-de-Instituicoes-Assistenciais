<?php
require_once ('acesso.php');

abstract class Pessoa
{

    protected $idpessoa;

    protected $nome;

    protected $telefone;

    protected $data_nascimento;

    protected $cpf;

    protected $sexo;

    protected $email;

    protected $senha;

    protected $cep;

    protected $cidade;

    protected $bairro;

    protected $ibge;

    protected $rua;

    protected $numero_endereco;

    protected $complemento;

    public function getIdpessoa()
    {
        return $this->idpessoa;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
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

    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
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

    // Insert
    public function incluir($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo, $email, $senha, $cep, $cidade, $bairro, $ibge, $rua, $numero_endereco, $complemento)
    {
        try {
            $sql = 'INSERT pessoa (idpessoa, nome, telefone, data_nascimento, cpf, sexo, email, senha, cep, cidade, bairro, ibge, rua, numero_endereco, complemento) VALUES (:idpessoa, :nome, :telefone, :data_nascimento, :cpf, :sexo, :email, :senha, :cep, :cidade, :bairro, :ibge, :rua, :numero_endereco, :complemento)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idpessoa', $idpessoa);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':ibge', $ibge);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero_endereco', $numero_endereco);
            $stmt->bindParam(':complemento', $complemento);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
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

    // Editar
    public function alterar($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo, $senha)
    {
        try {
            $sql = 'update pessoas set  idpessoa=:idpessoa, nome=:nome, telefone=:telefone, data_nascimento=:data_nascimento, cpf=:cpf, sexo=:sexo, email=:email, senha=:senha, cep=:cep, cidade=:cidade, bairro=:bairro, ibge=:ibge, rua=:rua, numero_endereco=:numero_endereco, complemento=:complemento';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idpessoa', $idpessoa);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':ibge', $ibge);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero_endereco', $numero_endereco);
            $stmt->bindParam(':complemento', $complemento);
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

