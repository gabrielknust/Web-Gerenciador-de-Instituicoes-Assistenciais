<?php
	$usuario = "root";
  	$senha = "";
  	$servidor = "localhost";
  	$bddnome = "wegia";
  	$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
  	$tamanho=$_POST['tamanho'];
  	mysqli_query ($conexao,'INSERT INTO camisa (tamanhos) values ('.$tamanho.')');
?>