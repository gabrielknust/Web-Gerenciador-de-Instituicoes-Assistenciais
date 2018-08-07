<?php

class Funcao extends Cargo
{

    private $idfuncao_voluntario;

    private $descricao_funcao;

    public function __construct($idcargo, $descricao)
    {
        parent::__construct($idcargo, $descricao);
    }
}