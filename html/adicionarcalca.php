<?php
	$usuario = "root";
  	$senha = "";
  	$servidor = "localhost";
  	$bddnome = "wegia";
  	$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
  	$tamanho=$_POST['tamanho'];
  	mysqli_query ($conexao,'INSERT INTO calca (tamanhos) values ('.$tamanho.')');
  	$_GET['msg']="Tamanho de calca adicionado com sucesso";
  	echo $_GET['msg'];
  	//header("Location: sucesso.php");
?>