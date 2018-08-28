<?php
require_once ('acesso.php');
require_once 'Pessoa.php';

class Interno extends Pessoa
{

    private $idInterno;

    private $idSituacaoInterno;

    private $nomeContatoUrgente;

    private $telefoneContatoUrgente1;

    private $telefoneContatoUrgente2;

    private $telefoneContatoUrgente3;

    function __construct($cpf,$nome,$sexo,$dataNascimento,$registroGeral,$orgaoEmissor,$dataExpedicao,$nomeMae,$nomePai,$tipoSanguineo)
    {
        $this->cpf=$cpf;

        $this->nome=$nome;

        $this->sexo=$sexo;

        $this->dataNascimento=$dataNascimento;

        $this->registroGeral=$registroGeral;

        $this->orgaoEmissor=$orgaoEmissor;

        $this->dataExpedicao=$dataExpedicao;

        $this->nomeMae=$nomeMae;

        $this->nomePai=$nomePai;
        
        $this->tipoSanguineo=$tipoSanguineo;
    }
    
    public function getIdInterno()
    {
        return $this->idInterno;
    }

    public function getIdSituacaoInterno()
    {
        return $this->idSituacaoInterno;
    }

    public function setIdInterno($idInterno)
    {
        $this->idInterno = $idInterno;
    }

    public function setIdSituacaoInterno($idSituacaoInterno)
    {
        $this->idSituacaoInterno = $idSituacaoInterno;
    }

    public function getNomeContatoUrgente()
    {
        return $this->nomeContatoUrgente;
    }

    public function getTelefoneContatoUrgente1()
    {
        return $this->telefoneContatoUrgente1;
    }

    public function getTelefoneContatoUrgente2()
    {
        return $this->telefoneContatoUrgente2;
    }

    public function getTelefoneContatoUrgente3()
    {
        return $this->telefoneContatoUrgente3;
    }

    public function setNomeContatoUrgente($nomeContatoUrgente)
    {
        $this->nomeContatoUrgente = $nomeContatoUrgente;
    }

    public function setTelefoneContatoUrgente1($telefoneContatoUrgente1)
    {
        $this->telefoneContatoUrgente1 = $telefoneContatoUrgente1;
    }

    public function setTelefoneContatoUrgente2($telefoneContatoUrgente2)
    {
        $this->telefoneContatoUrgente2 = $telefoneContatoUrgente2;
    }

    public function setTelefoneContatoUrgente3($telefoneContatoUrgente3)
    {
        $this->telefoneContatoUrgente3 = $telefoneContatoUrgente3;
    }
}

