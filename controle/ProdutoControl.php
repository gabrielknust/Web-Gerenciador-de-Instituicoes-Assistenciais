<?php
include_once '../classes/produto.php';
include_once '../daoprodutoDAO.php';
include_once '../classesCategoria.php';
include_once '../dao/CategoriaDAO.php';
class ProdutoControle
{
    public function verificar(){
        extract($_REQUEST);
        if((!isset($preco)) || empty(($preco))){
            $msg .= "Preço do produto nÃ£o informado. Por favor, informe um preço!";
            header('Location: ../html/produto.html?msg='.$msg);
        }
        if((!isset($descricao)) || empty(($descricao))){
            $msg .= "descricao do produto nÃ£o informado. Por favor, informe um descricao!";
            header('Location: ../html/produto.html?msg='.$msg);
        }
        if((!isset($codigo)) || empty(($codigo))){
            $msg .= "Código do produto nÃ£o informado. Por favor, informe o código!";
            header('Location: ../html/produto.html?msg='.$msg);
        }
        $produto = new produto($preco,$descricao,$codigo);
        return $produto;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $produtoDAO= new produtoDAO();
        $produtos = $produtoDAO->listarTodos();
        session_start();
        $_SESSION['produtos']=$produtos;
        header('Location: '.$nextPage);
    }
    
    public function listarporCodigo($codigo)
    {
        session_start();
        $codigo = $_REQUEST['codigo'];
        try {
            $produtoDao = new ProdutoDAO();
            $produto = $produtoDao->listarUm($codigo);
            $_SESSION['produto']= $produto;
        } catch (Exception $e) {
            $msg = "Não foi possível listar o produto!";
            //header('Location: caminho.php?msg='.$msg);
        }

        $catDao = new CategoriaDAO();
        $categorias = $catDao->listarTodos();
        $_SESSION['categorias']= $categorias;
        
        header('Location: '.$_REQUEST['nextPage']);
        
    }
    public function listarporNome($descricao)
    {
        session_start();
        $descricao = $_REQUEST['descricao'];
        try {
            $produtoDao = new ProdutoDAO();
            $produto = $produtoDao->listarUm($descricao);
            $_SESSION['produto']= $produto;
        } catch (Exception $e) {
            $msg = "Não foi possível listar o produto!";
            header('Location: ../html/msg.php?msg='.$msg);
        }

        $catDao = new CategoriaDAO();
        $categorias = $catDao->listarTodos();
        $_SESSION['categorias']= $categorias;
        
        header('Location: '.$_REQUEST['nextPage']);
        
    }

    public function incluir(){
        $produto = $this->verificar();
        $produtoDAO = new produtoDAO();
        try{
            $produtoDAO->incluir($produto);
            
            session_start();
            $_SESSION['msg']="produto cadastrado com sucesso";
            $_SESSION['proxima']="Cadastrar outro produto";
            $_SESSION['link']="../html/cadastrar_produto.php";
            header("Location: ../html/sucesso.php");
        } catch (PDOException $e){
            $msg= "NÃ£o foi possÃ­vel registrar o funcionário"."<br>".$e->getMessage();
            echo $msg;
        }
    }
    public function excluir()
    {
        $produto = new Produto(null,null,null);
        $produto->setId($_REQUEST['id']);
       
        try {
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->excluir($produto);
            $msg = "O produto foi excluido com sucesso!";
        } catch (PDOException $e) {
            $msg = "Não foi possível salvar! Tente novamente";
        }
        header('Location: ../html/msg.php?msg=' . $msg);
    }
}