<?php
include_once '../classes/Saida.php';
include_once '../dao/SaidaDAO.php';
class SaidaControle
{
    public function verificar(){
        extract($_REQUEST);
        
        if((!isset($destino)) || (empty($destino))){
            $msg .= "Descricao da destino nÃ£o informada. Por favor, informe uma destino!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($almoxarifado)) || (empty($almoxarifado))){
            $msg .= "Descricao da almoxarifado nÃ£o informada. Por favor, informe uma almoxarifado!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($tipo)) || (empty($tipo))){
            $msg .= "Descricao da tipo nÃ£o informada. Por favor, informe uma tipo!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($responsavel)) || (empty($responsavel))){
            $msg .= "Descricao da responsavel nÃ£o informada. Por favor, informe uma responsavel!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($data)) || (empty($data))){
            $msg .= "Descricao da data nÃ£o informada. Por favor, informe uma data!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($hora)) || (empty($hora))){
            $msg .= "Descricao da hora nÃ£o informada. Por favor, informe uma hora!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($valor_total)) || (empty($valor_total))){
            $msg .= "Descricao da valor_total nÃ£o informada. Por favor, informe uma valor_total!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        else{
            $saida = new Saida($data,$hora,$valor_total);
            $saida->setId_destino($destino);
            $saida->setId_almoxarifado($almoxarifado);
            $saida->setId_tipo($tipo);
            $saida->setId_responsavel($responsavel);

        }
        return $saida;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $saidaDAO= new SaidaDAO();
        $saidas = $saidaDAO->listarTodos();
        session_start();
        $_SESSION['saida']=$saidas;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $saida = $this->verificar();
        $saidaDAO = new SaidaDAO();
        try{
            $saidaDAO->incluir($saida);
            session_start();
            $_SESSION['msg']="saida cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outro saida";
            $_SESSION['link']="../html/adicionar_saida.php";
            header("Location: ../html/cadastro_saida.php");
        } catch (PDOException $e){
            $msg= "NÃ£o foi possÃ­vel registrar a saida"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function excluir(){

    }
}