<?php

class Unidade
{
   private $id_unidade;
   private $descricao_unidade;
   
    public function __construct($descricao_unidade)
    {

        $this->descricao_unidade=$descricao_unidade;

    }

   public function getId_unidade()
    {
        return $this->id_unidade;
    }

    public function getDescricao_categoria()
    {
        return $this->descricao_categoria;
    }

    public function setId_unidade($id_unidade)
    {
        $this->id_unidade = $id_unidade;
    }

    public function setDescricao_categoria($descricao_categoria)
    {
        $this->descricao_categoria = $descricao_categoria;
    }
}