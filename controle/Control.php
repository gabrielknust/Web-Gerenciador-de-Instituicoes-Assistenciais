<?php
	/*extract($_REQUEST);
	if(!isset($nomeClasse) || (empty($nomeClasse) || !isset($metodo) || (empty($metodo)))
	{
		$msg="Página inválida, utilize as funções do sistema!";
		header('Location:../html/msg.php?msg='.$msg);
	}
	include_once $nomeClasse.".php";
	$objeto= new $nomeClasse();
	$objeto->$metodo;*/
	$x=extract($_REQUEST);
	var_dump($x);
?>