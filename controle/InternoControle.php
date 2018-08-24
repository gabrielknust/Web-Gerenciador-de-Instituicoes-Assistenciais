<?php
require_once '../classes/Interno.php';
require_once '../dao/InternoDAO.php';
class InternoControle 
{
	public function formatoDataYMD($data)
    	{
        	$data_arr = explode("/", $data);
        
        	$datac = $data_arr[2] . '-' . $data_arr[1] . '-' . $data_arr[0];
        
       		return $datac;
    	}
   public function verificar(){
        extract($_REQUEST);
        //if((!isset($descricao)) || (empty($descricao))){
            //$msg = "Descricao da categoria não informada. Por favor, informe uma descrição válida!";
            //header('Location: /sisvenda/html/categoria.php?msg='.$msg);
        //}else{
            $categoria = new Interno();
            //$categoria->setDescricao($descricao);
            return $categoria;
       // }
        
    }
    
    public function listarTodos(){
        extract($_REQUEST);
        $catDAO= new CategoriaDAO();
        $categorias = $catDAO->listarTodos();
        session_start();
        $_SESSION['categorias']=$categorias;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $categoria = $this->verificar();
        $intDAO= new InternoDAO();
        try{
            $intDAO->adicionar($interno);
            $msg= "A categoria ".$interno->getDescricao()." foi adicionada!";
        } catch (Exception $e){
            $msg= "Não foi possível registrar a categoria"."<br>".$e->getMessage();
        }
        header('Location: /sisvenda/html/msg.php?msg='.$msg);
    }
