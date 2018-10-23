<?php
include_once '../classes/Categoria.php';
include_once '../dao/CategoriaDAO.php';
class CategoriaControle
{
    public function verificar(){
        extract($_REQUEST);
        if((!isset($descricao_categoria)) || (empty($descricao_categoria))){
            $msg = "Descricao da Categoria não informada. Por favor, informe uma descricao!";
            //header('Location: ../html/unidade.html?msg='.$msg);
        }
        else{
            $categoria = new Categoria($descricao_categoria);
        }
        return $categoria;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $categoriaDAO= new CategoriaDAO();
        $categorias = $categoriaDAO->listarTodos();
        session_start();
        $_SESSION['categoria']=$categorias;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $categoria = $this->verificar();
        $categoriaDAO = new CategoriaDAO();
        try{
            $categoriaDAO->incluir($categoria);
            session_start();
            $_SESSION['msg']="categoria cadastrada com sucesso";
            $_SESSION['proxima']="Cadastrar outra categoria";
            $_SESSION['link']="../html/cadastrar_categoria.php";
            header("Location: ../html/cadastro_produto.php");
        } catch (PDOException $e){
            $msg= "Não foi possível registrar o funcionário"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function excluir(){
    	
    }
}