<?php
include_once '../classes/Funcionario.php';
class FuncionarioControle
{
    public function verificar()
    {
        /*if (!isset($cpf)||empty($cpf))
        {
            $msg= "CPF não foi imformado, por favor, informe um cpf válido!<br>";
        }
        if(!empty($msg))
        {
            header('Location:../html/funcionario.php?msg='.$msg);
        }
        else{*/
            $funcionario=new Funcionario($vale_transporte,$data_admissao,$pis,$ctps,$uf_ctps,$numero_titulo,$zona,$secao,$certificado_reservista_numero,$certificado_reservista_serie,$calcado,$calca,$jaleco,$camisa,$usa_vtp,$cesta_basica,$situacao);
        //}
    }
    public function inserir()
    {
        $funcio=$this->verificar();
        print_r($funcio);
    }
}