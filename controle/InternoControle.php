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
            $interno = new Interno($numeroCPF,$nome,$sexo,$nascimento,$rg,$orgaoEmissor,$dataExpedicao,$nomePai,$nomeMae,$sangue);
            return $interno;
       // }
    }
    
    public function listarTodos(){
        extract($_REQUEST);
        $internoDAO= new InternoDAO();
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
            $msg= "O interno ".$interno->getNome()." foi adicionado!";
        } catch (Exception $e){
            $msg= "Não foi possível registrar o interno"."<br>".$e->getMessage();
        }
        header('Location: ../html/msg.php?msg='.$msg);
    }
