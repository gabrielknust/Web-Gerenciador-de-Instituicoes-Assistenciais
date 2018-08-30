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
        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do interno não informado. Por favor, informe um nome!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($sexo)) || (empty($sexo))){
            $msg .= "Sexo do interno não informado. Por favor, informe um sexo!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($nascimento)) || (empty($nascimento))){
            $msg .= "Data de nascimento do interno não informado. Por favor, informe uma data de nascimento!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($pai)) || (empty($pai))){
            $msg .= "Nome do pai do interno não informado. Por favor, informe um nome!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($nomeMae)) || (empty($nomeMae))){
            $msg .= "Nome da mae do interno não informado. Por favor, informe um nome!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($sangue)) || (empty($sangue))){
            $msg .= "Tipo sanguineo do interno não informado. Por favor, informe um tipo sanguineo!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($rg)) || (empty($rg))){
            $msg .= "Registro geral do interno não informado. Por favor, informe um registro geral!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($orgaoEmissor)) || (empty($orgaoEmissor))){
            $msg .= "Orgao emissor do interno não informado. Por favor, informe um orgão emissor!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($dataExpedicao)) || (empty($dataExpedicao))){
            $msg .= "Data de expedição do rg do interno não informado. Por favor, informe um data de expedição!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($numeroCPF)) || (empty($numeroCPF))){
            $msg .= "CPF do interno não informado. Por favor, informe um CPF!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($certidao)) || (empty($certidao))){
            $msg .= "Existência da certidão do interno não informada. Por favor, informe a existência!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($curatela)) || (empty($curatela))){
            $msg .= "Existência da curatela do interno não informada. Por favor, informe a existência!";
            header('Location: ../html/interno.php?msg='.$msg);
        }
        if((!isset($observacoes)) || (empty($observacoes))){
            $observacoes=NULL;
        }
        if((!isset($telefone1)) || (empty($telefone1))){
            $telefone1=null;
        }
        if((!isset($telefone2)) || (empty($telefone2))){
            $telefone2=null;
        }
        if((!isset($telefone3)) || (empty($telefone3))){
            $telefone3=null;
        }
        if((!isset($contatoUrgente)) || (empty($contatoUrgente))){
            $contatoUrgente=null;
        }
            $telefone = null;
            $senha=null;
            $imagem=null;
            $cep=null;
            $cidade=null;
            $bairro=null;
            $logradouro=null;
            $numeroEndereco=null;
            $complemento=null;
            $interno = new Interno($numeroCPF,$nome,$sexo,$nascimento,$rg,$orgaoEmissor,$dataExpedicao,$nomeMae,$pai,$sangue,$senha,$telefone,$imagem,$cep,$cidade,$bairro,$logradouro,$numeroEndereco,$complemento,$contatoUrgente,$telefone1,$telefone2,$telefone3);
            return $interno;
        }
    
    public function listarTodos(){
        extract($_REQUEST);
        $internoDAO= new InternoDAO();
        $internos = $internoDAO->listarTodos();
        session_start();
        $_SESSION['internos']=$interno;
        header('Location: '.$nextPage);
    }


    
    public function incluir(){
        $interno = $this->verificar();
        $intDAO= new InternoDAO();
        try{
            $intDAO->incluir($interno);
            $msg= "O interno ".$interno->getNome()." foi adicionado!";
        } catch (Exception $e){
            $msg= "Não foi possível registrar o interno"."<br>".$e->getMessage();
        }
        header('Location: ../html/msg.php?msg='.$msg);
    }
}