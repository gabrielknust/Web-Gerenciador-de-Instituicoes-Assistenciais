<?php
include_once '../classes/Categoria.php';
include_once '../dao/CategoriaDAO.php';
class UnidadeControle
{
    public function verificar(){
        extract($_REQUEST);
        
        if((!isset($descricao_categoria)) || (empty($descricao_categoria))){
            $msg .= "Descricao da Unidade n„o informada. Por favor, informe uma descricao!";
            header('Location: ../html/unidade.html?msg='.$msg);
        }
        $Unidade = new Unidade($descricao_unidade);
        return $unidade;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $unidadeDAO= new UnidadeDAO();
        $unidades = $unidadeDAO->listarTodos();
        session_start();
        $_SESSION['unidades']=$unidades;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $unidade = $this->verificar();
        $unidadeDAO = new UnidadeDAO();
        try{
            $UnidadeDAO->incluir($unidade);
            echo $unidade->getData_admissao();
            session_start();
            $_SESSION['msg']="Unidade cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outra unidade";
            $_SESSION['link']="../html/cadastrar_unidade.php";
            header("Location: ../html/sucesso.php");
        } catch (PDOException $e){
            $msg= "N√£o foi poss√≠vel registrar o funcion·rio"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function excluir(){
    	
    }
}