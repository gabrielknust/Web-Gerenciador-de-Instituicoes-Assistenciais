<?php
	require_once"../classes/Funcionario.php";
	$funcionario=new Funcionario();
	$sql='select * from funcionario';
	$funcionario->Consultar($sql);
	echo json_encode($funcionario->Result);