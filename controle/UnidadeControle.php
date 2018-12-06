<?php
include_once '../classes/Unidade.php';
include_once '../dao/UnidadeDAO.php';
class UnidadeControle
{
    public function verificar(){
        extract($_REQUEST);
        
        if((!isset($descricao_unidade)) || (empty($descricao_unidade))){
            $msg .= "Descricao da Unidade nÃ£o informada. Por favor, informe uma descricao!";
            header('Location: ../html/unidade.html?msg='.$msg);
        }else{
        	$unidade = new Unidade($descricao_unidade);
        }
        return $unidade;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $unidadeDAO = new UnidadeDAO();
        $unidades = $unidadeDAO->listarTodos();
        session_start();
        $_SESSION['unidade']=$unidades;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $unidade = $this->verificar();
        $unidadeDAO = new UnidadeDAO();
        try{
            $unidadeDAO->incluir($unidade);
            session_start();
            $_SESSION['msg']="Unidade cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outra unidade";
            $_SESSION['link']="../html/cadastrar_unidade.php";
            header("Location: ../html/cadastro_produto.php");
        } catch (PDOException $e){
            $msg= "NÃ£o foi possÃ­vel registrar o funcionário"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function excluir(){
        extract($_REQUEST);
        try{
            $unidadeDAO = new UnidadeDAO();
            $unidadeDAO->excluir($id_unidade);
            header('Location:../html/listar_unidade.php');
        }catch (PDOException $e) {
            echo "ERROR";
        }
    }
}