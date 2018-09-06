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
            $certidao="Não possui Certidão";
        }
        if((!isset($curatela)) || (empty($curatela))){
            $curatela="Não possui CURATELA";
        }
        if((!isset($inss)) || (empty($inss))){
            $inss="Não possui INSS";
        }
        if((!isset($loas)) || (empty($loas))){
            $loas="Não possui LOAS";
        }
        if((!isset($bpc)) || (empty($bpc))){
            $bpc="Não possui BPC";
        }
        if((!isset($funrural)) || (empty($funrural))){
            $funrural="Não possui FUNRURAL";
        }
        if((!isset($saf)) || (empty($saf))){
            $saf="Não possui SAF";
        }
        if((!isset($sus)) || (empty($sus))){
            $sus="Não possui SUS";
        }
        if((!isset($observacoes)) || (empty($observacoes))){
            $observacoes="Descrição não informada";
        }
        if((!isset($telefone1)) || (empty($telefone1))){
            $telefone1='Não informado';
        }
        if((!isset($telefone2)) || (empty($telefone2))){
            $telefone2='Não informado';
        }
        if((!isset($telefone3)) || (empty($telefone3))){
            $telefone3='Não informado';
        }
        if((!isset($nomeContato)) || (empty($nomeContato))){
            $nomeContato='Não informado';
        }   
            $dataExpedicao=$this->formatoDataYMD($dataExpedicao);
            $nascimento=$this->formatoDataYMD($nascimento);
            $telefone='(22) 2522-5130';
            $senha='null';
            $imagem='null';
            $cep='28625-520';
            $estado="RJ";
            $cidade='Nova Friburgo';
            $bairro='Centro';
            $logradouro='Rua Souza Cardoso';
            $numeroEndereco='403';
            $complemento='Mora no LAJE';
            $ibge="3303401";
            $interno = new Interno($numeroCPF,$nome,$sexo,$nascimento,$rg,$orgaoEmissor,$dataExpedicao,$nomeMae,$pai,$sangue,$senha,$telefone,$imagem,$cep,$cidade,$bairro,$logradouro,$numeroEndereco,$complemento,$ibge);
            $interno->setNomeContatoUrgente($nomeContato);
            $interno->setTelefoneContatoUrgente1($telefone1);
            $interno->setTelefoneContatoUrgente2($telefone2);
            $interno->setTelefoneContatoUrgente3($telefone3);
            $interno->setCertidaoNascimento($certidao);
            $interno->setCuratela($curatela);
            $interno->setInss($inss);
            $interno->setLoas($loas);
            $interno->setBpc($bpc);
            $interno->setFunrural($funrural);
            $interno->setSaf($saf);
            $interno->setSus($sus);
            return $interno;
        }
    
    public function listarTodos(){
        extract($_REQUEST);
        $internoDAO= new InternoDAO();
        $internos = $internoDAO->listarTodos();
        session_start();
        $_SESSION['internos']=$internos;
        header('Location: '.$nextPage);
    }

    public function listarUm($cpf)
    {
        $internoDAO=new InternoDAO();
        
    }
    
    public function incluir(){
        $interno = $this->verificar();
        $intDAO= new InternoDAO();
        try{
            $intDAO->incluir($interno);
            $msg= "O interno ".$interno->getNome()." foi adicionado!";
        } catch (PDOException $e){
            $msg= "Não foi possível registrar o interno"."<br>".$e->getMessage();
            echo $msg;
        }
    }
}