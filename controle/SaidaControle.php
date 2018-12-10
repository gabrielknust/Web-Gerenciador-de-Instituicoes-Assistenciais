<?php
include_once '../classes/Saida.php';
include_once '../dao/SaidaDAO.php';
class SaidaControle
{
    public function verificar(){
        extract($_REQUEST);

        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do saida nÃ£o informado. Por favor, informe um nome!";
            header('Location: ../html/saida.html?msg='.$msg);
        }
        if((!isset($cnpj)) || (empty($cnpj))){
            $calcado='null';
        }
        if((!isset($cpf)) || (empty($cpf))){
            $calca='null';
        }
        if((!isset($telefone)) || (empty($telefone))){
            $msg .= "Telefone do saida nÃ£o informado. Por favor, informe um telefone!";
            header('Location: ../html/saida.html?msg='.$msg);
        }

        $saida = new Saida($data,$hora,$valor_total);
        $saida->setId_saida($linha['id_saida']);
        $saida->setId_origem($linha['id_origem']);
        $saida->setId_almoxarifado($linha['id_almoxarifado']);
        $saida->setId_tipo($linha['id_tipo']);
        $saida->setId_respondavel($linha['id_responsavel']);
        
        return $saida;
    }
    
    public function listarTodos(){
        extract($_REQUEST);
        $saidaDAO= new SaidaDAO();
        $origens = $saidaDAO->listarTodos();
        session_start();
        $_SESSION['saida']=$origens;
        header('Location: ../html/cadastro_saida.php');
    }
    
    public function incluir(){
        $saida = $this->verificar();
        $saidaDAO = new SaidaDAO();
        try{
            $saidaDAO->incluir($saida);
            session_start();
            $_SESSION['msg']="saida cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outra saida";
            $_SESSION['link']="../html/cadastro_doador.php";
            header("Location: ../html/cadastro_produto.php");
        } catch (PDOException $e){
            $msg= "NÃ£o foi possÃ­vel registrar o tipo"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function listarId(){
        extract($_REQUEST);
        try{
            $saidaDAO = new SaidaDAO();
            $saida = $saidaDAO->listarId($id_saida);
            session_start();
            $_SESSION['saida'] = $saida;
            header('Location: ' . $nextPage);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}