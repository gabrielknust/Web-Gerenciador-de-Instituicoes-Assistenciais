<?php
include_once '../classes/Entrada.php';
include_once '../dao/EntradaDAO.php';
class EntradaControle
{
    public function verificar(){
        extract($_REQUEST);
        
        if((!isset($origem)) || (empty($origem))){
            $msg .= "Descricao da origem nÃ£o informada. Por favor, informe uma origem!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($almoxarifado)) || (empty($almoxarifado))){
            $msg .= "Descricao da almoxarifado nÃ£o informada. Por favor, informe uma almoxarifado!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($tipo)) || (empty($tipo))){
            $msg .= "Descricao da tipo nÃ£o informada. Por favor, informe uma tipo!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($responsavel)) || (empty($responsavel))){
            $msg .= "Descricao da responsavel nÃ£o informada. Por favor, informe uma responsavel!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($data)) || (empty($data))){
            $msg .= "Descricao da data nÃ£o informada. Por favor, informe uma data!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($hora)) || (empty($hora))){
            $msg .= "Descricao da hora nÃ£o informada. Por favor, informe uma hora!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($valor_total)) || (empty($valor_total))){
            $msg .= "Descricao da valor_total nÃ£o informada. Por favor, informe uma valor_total!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        else{
        	$entrada = new Entrada($data,$hora,$valor_total);
            $saida->setId_origem($origem);
            $saida->setId_almoxarifado($almoxarifado);
            $saida->setId_tipo($tipo);
            $saida->setId_responsavel($responsavel);

        }
        return $entrada;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $entradaDAO= new EntradaDAO();
        $entradas = $entradaDAO->listarTodos();
        session_start();
        $_SESSION['entrada']=$entradas;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $entrada = $this->verificar();
        $entradaDAO = new EntradaDAO();
        try{
            $entradaDAO->incluir($entrada);
            session_start();
            $_SESSION['msg']="Entrada cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outro entrada";
            $_SESSION['link']="../html/adicionar_entrada.php";
            header("Location: ../html/cadastro_entrada.php");
        } catch (PDOException $e){
            $msg= "NÃ£o foi possÃ­vel registrar a entrada"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function excluir(){

    }
}