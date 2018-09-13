	<?php

		require_once '../dao/Conexao.php';
		require_once '../Functions/funcoes.php';

		if($_SERVER['REQUEST_METHOD']=="GET"){

			$id = $_GET['cpf'];
			$passw = $_GET['pwd'];
			$usuario = "root";
  			$senha = "";
  			$servidor = "localhost";
  			$bddnome = "wegia";
  			$id=str_replace(".", '', $id);
        	$id=str_replace("-", "", $id);
  			header('Content-Type: text/html, charset-utf-8');
  			$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
			$select = mysqli_query ($conexao,'SELECT * FROM pessoa');
				while($linha = mysqli_fetch_array($select)){
					if($linha["cpf"] == $id && $linha["senha"] == $passw){

						$c = true;
						$id = $linha["cpf"];
						break;
					}
				}
				if($c == true || $id=="admin" && $passw=="admin"){
					if(isset($_SESSION['funcionario'])){
						//session_destroy();
						session_start();
						$_SESSION['usuario'] = $id;
						print_r($_SESSION['usuario']);
					}
					else{
						session_start();
						$_SESSION['funcionario'] = $id;
						header ("Location: home.php");
					}
				}
				else{
					header ("Location: erro.php");
				}
		}
		?>