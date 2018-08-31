<?php
include_once '../classes/Funcionario.php';
include_once '../dao/FuncionarioDAO.php';
class FuncionarioControle
{
    public function verificar()
    {
        $funcionario=new Funcionario($vale_transporte,$data_admissao,$pis,$ctps,$uf_ctps,$numero_titulo,$zona,$secao,$certificado_reservista_numero,$certificado_reservista_serie,$calcado,$calca,$jaleco,$camisa,$usa_vtp,$cesta_basica,$situacao,$cpf,$senha,$nome,$sexo,$telefone,$data_nascimento,$imagem,$cep,$cidade,$bairro,$logradouro,$numero_endereco,$complemento,$registro_geral,$orgao_emissor,$data_expedicao,$nome_mae,$nome_pai,$tipo_sanguineo,$ibge);
        return $funcionario;
    }
    public function incluir(){
        $funcionario = $this->verificar();
        $funcDAO= new FuncionarioDAO();
        try{
            $funcDAO->incluir($funcionario);
            $msg= "O interno ".$funcionario->getNome()." foi adicionado!";
        } catch (Exception $e){
            $msg= "Não foi possível registrar o interno"."<br>".$e->getMessage();
        }
    }
}