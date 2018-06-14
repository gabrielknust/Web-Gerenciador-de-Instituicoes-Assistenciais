<?php
require_once ('acesso.php');

abstract class Pessoa
{
    
    protected $idpessoa;
    
    protected $login;
    
    protected $senha;
    
    protected $nome;
    
    protected $sexo;
    
    protected $telefone;
    
    protected $data_nascimento;
    
    protected $imagem;
    
    protected $cep;
    
    protected $cidade;
    
    protected $bairro;
    
    protected $ibge;
    
    protected $rua;
    
    protected $numero_endereco;
    
    protected $complemento;
    
    protected $registro_geral;
    
    protected $orgao_emissor;
    
    protected $data_expedicao;
    
    protected $nome_mae;
    
    protected $nome_pai;
    
    
    
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }
    
    public function getLogin()
    {
        return $this->login;
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
    
    public function setLogin($login)
    {
        $this->login = $login;
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
    public function incluir($login, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $ibge, $rua, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai)
    {
        try {
            $sql = 'INSERT pessoa (login, senha, nome, sexo, telefone, data_nascimento, imagem, cep, cidade, bairro, ibge, rua, numero_endereco, complemento, registro_geral, orgao_emissor, data_expedicao, nome_mae, nome_pai)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':ibge', $ibge);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero_endereco', $numero_endereco);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            
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
    public function alterar($idpessoa, $login, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $ibge, $rua, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai)
    {
        try {
            $sql = 'update pessoas set  idpessoa=:idpessoa, nome=:nome, telefone=:telefone, data_nascimento=:data_nascimento, cpf=:cpf, sexo=:sexo, email=:email, senha=:senha, cep=:cep, cidade=:cidade, bairro=:bairro, ibge=:ibge, rua=:rua, numero_endereco=:numero_endereco, complemento=:complemento WHERE idpessoa = :idpessoa';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':ibge', $ibge);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero_endereco', $numero_endereco);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
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

