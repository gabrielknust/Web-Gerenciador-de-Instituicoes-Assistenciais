<?php
	$usuario = "root";
  	$senha = "";
  	$servidor = "localhost";
  	$bddnome = "wegia";
  	$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
  	$situacao=$_POST['situacao'];
  	mysqli_query ($conexao,'INSERT INTO situacao (situacoes) values ('.$situacao.')');
?>