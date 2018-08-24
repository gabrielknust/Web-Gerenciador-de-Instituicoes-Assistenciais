<?php
require_once ('acesso.php');
require_once 'Pessoa.php';

class Interno extends Pessoa
{

    private $id_interno;

    private $id_situacao_interno;

    private $nome_contato_urgente;

    private $telefone_contato_urgente_1;

    private $telefone_contato_urgente_2;

    private $telefone_contato_urgente_3;

    private function __construct($cpf,$senha,$nome,$sexo,$telefone,$data_nascimento,$imagem,$cep,$cidade,$bairro,$logradouro,$numero_endereco,$complemento,$registro_geral,$orgao_emissor,$data_expedicao,$nome_mae,$nome_pai,$tipo_sanguineo,$nome_contato_urgente,$telefone_contato_urgente_1,$telefone_contato_urgente_2,$telefone_contato_urgente_3)
    {
        $this->cpf=$cpf;

        $this->senha=$senha;

        $this->nome=$nome;

        $this->sexo=$sexo;

        $this->telefone=$telefone;

        $this->data_nascimento=$data_nascimento;

        $this->imagem=$imagem;

        $this->cep=$cep;

        $this->cidade=$cidade;

        $this->bairro=$bairro;

        $this->logradouro=$logradouro;

        $this->numero_endereco=$numero_endereco;

        $this->complemento=$complemento;

        $this->registro_geral=$registro_geral;

        $this->orgao_emissor=$orgao_emissor;

        $this->data_expedicao=$data_expedicao;

        $this->nome_mae=$nome_mae;

        $this->nome_pai=$nome_pai;
        
        $this->tipo_sanguineo=$tipo_sanguineo;

        $this->nome_contato_urgente=$nome_contato_urgente;

        $this->telefone_contato_urgente_1=$telefone_contato_urgente_1;

        $this->telefone_contato_urgente_2=$telefone_contato_urgente_2;

        $this->telefone_contato_urgente_3=$telefone_contato_urgente_3;
    }

    public function getId_interno()
    {
        return $this->id_interno;
    }

    public function getId_situacao_interno()
    {
        return $this->id_situacao_interno;
    }

    public function getNome_contato_urgente()
    {
        return $this->nome_contato_urgente;
    }

    public function getTelefone_contato_urgente_1()
    {
        return $this->telefone_contato_urgente_1;
    }

    public function getTelefone_contato_urgente_2()
    {
        return $this->telefone_contato_urgente_2;
    }

    public function getTelefone_contato_urgente_3()
    {
        return $this->telefone_contato_urgente_3;
    }

    public function setId_interno($id_interno)
    {
        $this->id_interno = $id_interno;
    }

    public function setId_situacao_interno($id_situacao_interno)
    {
        $this->id_situacao_interno = $id_situacao_interno;
    }

    public function setNome_contato_urgente($nome_contato_urgente)
    {
        $this->nome_contato_urgente = $nome_contato_urgente;
    }

    public function setTelefone_contato_urgente_1($telefone_contato_urgente_1)
    {
        $this->telefone_contato_urgente_1 = $telefone_contato_urgente_1;
    }

    public function setTelefone_contato_urgente_2($telefone_contato_urgente_2)
    {
        $this->telefone_contato_urgente_2 = $telefone_contato_urgente_2;
    }

    public function setTelefone_contato_urgente_3($telefone_contato_urgente_3)
    {
        $this->telefone_contato_urgente_3 = $telefone_contato_urgente_3;
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

