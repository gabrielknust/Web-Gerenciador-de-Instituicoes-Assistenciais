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

    private $dataNascimento;

    private $imagem;

    private $cep;

    private $cidade;

    private $bairro;

    private $logradouro;

    private $numeroEndereco;

    private $complemento;

    private $registroGeral;

    private $orgao_emissor;

    private $dataExpedicao;

    private $nomeMae;

    private $nomePai;
    
    private $tipoSanguineo;
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

    public function getDataNascimento()
    {
        return $this->dataNascimento;
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

    public function getNumeroEndereco()
    {
        return $this->numeroEndereco;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getRegistroGeral()
    {
        return $this->registroGeral;
    }

    public function getOrgao_emissor()
    {
        return $this->orgao_emissor;
    }

    public function getDataExpedicao()
    {
        return $this->dataExpedicao;
    }

    public function getNomeMae()
    {
        return $this->nomeMae;
    }

    public function getNomePai()
    {
        return $this->nomePai;
    }

    public function getTipoSanguineo()
    {
        return $this->tipoSanguineo;
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

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
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

    public function setNumeroEndereco($numeroEndereco)
    {
        $this->numeroEndereco = $numeroEndereco;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function setRegistroGeral($registroGeral)
    {
        $this->registroGeral = $registroGeral;
    }

    public function setOrgao_emissor($orgao_emissor)
    {
        $this->orgao_emissor = $orgao_emissor;
    }

    public function setDataExpedicao($dataExpedicao)
    {
        $this->dataExpedicao = $dataExpedicao;
    }

    public function setNomeMae($nomeMae)
    {
        $this->nomeMae = $nomeMae;
    }

    public function setNomePai($nomePai)
    {
        $this->nomePai = $nomePai;
    }

    public function setTipoSanguineo($tipoSanguineo)
    {
        $this->tipoSanguineo = $tipoSanguineo;
    }
}