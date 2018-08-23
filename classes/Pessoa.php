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
}