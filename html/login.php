	<?php

		require_once '../dao/Conexao.php';

		if($_SERVER['REQUEST_METHOD']=="GET"){

			$id = $_GET['cpf'];
			$passw = $_GET['pwd'];
			$usuario = "root";
  			$senha = "";
  			$servidor = "localhost";
  			$bddnome = "wegia";
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
				if($c == true){
					if(isset($_SESSION['funcionario'])){
						//session_destroy();
						session_start();
						$_SESSION['usuario'] = $id;
						print_r($_SESSION['usuario']);
					}
					else{
						session_start();
						$_SESSION['funcionario'] = $id;
						header ("Location: home.html");
					}
				}
				else{
					header ("Location: erro.php");
				}
		}
		?>