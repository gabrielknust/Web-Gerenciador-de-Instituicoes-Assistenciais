<?php
include_once '../classes/Entrada.php';
include_once '../dao/EntradaDAO.php';
class EntradaControle
{
    public function verificar(){
        extract($_REQUEST);

        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do entrada nÃ£o informado. Por favor, informe um nome!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }
        if((!isset($cnpj)) || (empty($cnpj))){
            $calcado='null';
        }
        if((!isset($cpf)) || (empty($cpf))){
            $calca='null';
        }
        if((!isset($telefone)) || (empty($telefone))){
            $msg .= "Telefone do entrada nÃ£o informado. Por favor, informe um telefone!";
            header('Location: ../html/entrada.html?msg='.$msg);
        }

        $entrada = new Entrada($data,$hora,$valor_total);
        $entrada->setId_entrada($linha['id_entrada']);
        $entrada->setId_origem($linha['id_origem']);
        $entrada->setId_almoxarifado($linha['id_almoxarifado']);
        $entrada->setId_tipo($linha['id_tipo']);
        $entrada->setId_respondavel($linha['id_responsavel']);
        
        return $entrada;
    }
    
    public function listarTodos(){
        extract($_REQUEST);
        $entradaDAO= new EntradaDAO();
        $origens = $entradaDAO->listarTodos();
        session_start();
        $_SESSION['entrada']=$origens;
        header('Location: ../html/cadastro_entrada.php');
    }
    
    public function incluir(){
        $entrada = $this->verificar();
        $entradaDAO = new EntradaDAO();
        try{
            $entradaDAO->incluir($entrada);
            session_start();
            $_SESSION['msg']="entrada cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outra entrada";
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
            $entradaDAO = new EntradaDAO();
            $entrada = $entradaDAO->listarId($id_entrada);
            session_start();
            $_SESSION['entrada'] = $entrada;
            header('Location: ' . $nextPage);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}