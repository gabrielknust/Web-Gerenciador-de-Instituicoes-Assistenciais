<?php
	$usuario = "root";
  	$senha = "";
  	$servidor = "localhost";
  	$bddnome = "wegia";
  	$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
  	$calcado= mysqli_query ($conexao,'SELECT * FROM calcado');
  	$calca = mysqli_query ($conexao,'SELECT * FROM calca');
	$camisa = mysqli_query ($conexao,'SELECT * FROM camisa');
	$situacao = mysqli_query ($conexao,'SELECT * FROM situacao');
	$jaleco = mysqli_query ($conexao,'SELECT * FROM jaleco');
?>
<!doctype html>
<html class="fixed">
<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Cadastro de Funcionário</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="../assets/vendor/fontawesome/svg-with-js/css/fa-svg-with-js.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
	<link rel="icon" href="../img/logofinal.png" type="image/x-icon">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="../assets/vendor/modernizr/modernizr.js"></script>

	<!-- Javascript functions -->
	<script src="../Functions/onlyNumbers.js"></script>
	<script src="../Functions/onlyChars.js"></script>
	<script src="../Functions/enviar_dados.js"></script>
	<script src="../Functions/mascara.js"></script>
	<script src="../Functions/validar_senha.js"></script>
	
	<script type="text/javascript" >
		function numero_residencial(){
			if($("#numResidencial").prop('checked')){
				document.getElementById("numero_residencia").disabled = true;
			}else {
				document.getElementById("numero_residencia").disabled = false;
			}
		}

		function exibir_vale_transporte() {
			$("#esconder_exibir").show();
		}

		function esconder_vale_transporte() {
			document.getElementById('num_transporte').value=("");
			$("#esconder_exibir").hide();
		}

		function exibir_reservista() {
			$("#reservista1").show();
			$("#reservista2").show();
		}

		function esconder_reservista() {
			$('.num_reservista').val("");
			$('.serie_reservista').val("");
			$("#reservista1").hide();
			$("#reservista2").hide();
		}
    
    	function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
  		}

    	function meu_callback(conteudo) {
        	if (!("erro" in conteudo)) {
				//Atualiza os campos com os valores.
				document.getElementById('rua').value=(conteudo.logradouro);
				document.getElementById('bairro').value=(conteudo.bairro);
				document.getElementById('cidade').value=(conteudo.localidade);
				document.getElementById('uf').value=(conteudo.uf);
				document.getElementById('ibge').value=(conteudo.ibge);
			}else{
				//CEP não Encontrado.
				limpa_formulário_cep();
				alert("CEP não encontrado.");
			}
		}
        
		function pesquisacep(valor) {
			//Nova variável "cep" somente com dígitos.
			var cep = valor.replace(/\D/g, '');
			//Verifica se campo cep possui valor informado.
			if (cep != ""){
				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;
				//Valida o formato do CEP.
				if(validacep.test(cep)) {
					//Preenche os campos com "..." enquanto consulta webservice.
					document.getElementById('rua').value="...";
					document.getElementById('bairro').value="...";
					document.getElementById('cidade').value="...";
					document.getElementById('uf').value="...";
					document.getElementById('ibge').value="...";
					//Cria um elemento javascript.
					var script = document.createElement('script');
					//Sincroniza com o callback.
					script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
					//Insere script no documento e carrega o conteúdo.
					document.body.appendChild(script);
	            }else{
					//cep é inválido.
					limpa_formulário_cep();
					alert("Formato de CEP inválido.");
				}
			}else{
				//cep sem valor, limpa formulário.
				limpa_formulário_cep();
			}
		};
		function testaCPF(strCPF) { //strCPF é o cpf que será validado. Ele deve vir em formato string e sem nenhum tipo de pontuação.
			var strCPF = strCPF.replace(/[^\d]+/g,''); // Limpa a string do CPF removendo espaços em branco e caracteres especiais. 
			// PODE SER QUE NÃO ESTEJA LIMPANDO COMPLETAMENTE. FAVOR FAZER O TESTE!!!!
			var Soma;
			var Resto;
			Soma = 0;
			if (strCPF == "00000000000") return false;
            
            for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;
            
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
            
            Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
            
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
            return true;
    }

    function validarCPF(strCPF){

    	if (!testaCPF(strCPF)){
    		$('#cpfInvalido').show();
    		document.getElementById("enviar").disabled = true;

    	}else{
    		$('#cpfInvalido').hide();

    		document.getElementById("enviar").disabled = false;
    	}

    }

    </script>
		<script language="JavaScript">
				var numValidos = "0123456789-()";
				var num1invalido = "78";
				var i;
				function validarTelefone(){
					//Verificando quantos dígitos existem no campo, para controlarmos o looping;
					digitos = document.form1.telefone.value.length;
					
					for(i=0; i<digitos; i++) {
						if (numValidos.indexOf(document.form1.telefone.value.charAt(i),0) == -1) {
							alert("Apenas números são permitidos no campo Telefone!");
							document.form1.telefone.select();
							return false;
						}
						if(i==0){
							if (num1invalido.indexOf(document.form1.telefone.value.charAt(i),0) != -1) {
							alert("Número de telefone inválido!");
							document.form1.telefone.select();
							return false;
							}
						}
					} 
					
				}
		</script>

	</head>
	<body>

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="home.php" class="logo">
						<img src="../img/logofinal.png" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>	
					
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="../img/semfoto.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">Usuário</span>
								<span class="role">Funcionário</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="../html/profile.php"><i class="fa fa-user"></i> Meu perfil</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="../index.html"><i class="fa fa-power-off"></i> Sair da sessão</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navegação
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="home.php">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Início</span>
										</a>
									</li>
									<li class="nav-parent nav-expanded nav-active">
										<a>
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Cadastros</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="cadastro_funcionario.php">
													 Cadastrar funcionário
												</a>
											</li>
											<li>
												<a href="cadastro_interno.php">
													 Cadastrar interno
												</a>
											</li>
											<li>
												<a href="cadastro_voluntario.php">
													 Cadastrar voluntário
												</a>
											</li>
											<li>
												<a href="cadastro_voluntario_judicial.php">
													 Cadastrar voluntário judicial
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent nav-expanded nav-active">
										<a>
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Informação</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="informacao_funcionario.php">
													 Informações funcionarios
												</a>
											</li>
										</ul>
										<ul class="nav nav-children">
											<li>
												<a href="informacao_interno.php">
													 Informações interno
												</a>
											</li>
										</ul>
									</li>
							</nav>
						</div>
					</div>
				
				</aside>
				
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Cadastro</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./home.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Cadastros</span></li>
								<li><span>Funcionário</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<div class="row">
						<div class="col-md-4 col-lg-3">
							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="../img/semfoto.jpg" class="rounded img-responsive" alt="John Doe">
										<i class="fas fa-camera-retro btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></i>
										<div class="container">

											  <div class="modal fade" id="myModal" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <h4 class="modal-title">Adicionar uma Foto</h4>
											        </div>
											        <div class="modal-body">
											        	<form action="/action_page.php">
											        	<div class="form-group">
															<label class="col-md-4 control-label" for="imgperfil">Carregue uma imagem de perfil:</label>
															<div class="col-md-8">
																<input type="file" name="imgperfil" size="60" id="imgform" class="form-control">
															</div>
														</div>
													</form>
											        </div>
											        <div class="modal-footer">
											          <input type="submit" id="formsubmit">
											        </div>
											      </div>
											      
											    </div>
											  </div>
											  
											</div>
									</div>

									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											
											<div class="widget-content-expanded">
											<ul class="simple-todo-list">
											
											</ul>
										</div>
										</div>
									</div>

									<hr class="dotted short">

									<h6 class="text-muted"></h6>
									
									<div class="clearfix">
										<a class="text-uppercase text-muted pull-right" href="#">(View All)</a>
									</div>

								</div>
							</section>
						</div>
						<div class="col-md-8 col-lg-8">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Cadastro de Funcionário</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										<form class="form-horizontal" method="post" action="../controle/control.php">
											<input type="hidden" name="nomeClasse" value="FuncionarioControle">
											<input type="hidden" name="metodo" value="incluir">
											<h4 class="mb-xlg">Informações Pessoais</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nome completo</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="nome" id="profileFirstName" id="nome" onkeypress="return Onlychars(event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">Sexo</label>
													<div class="col-md-8">
														<input type="radio" name="gender" id="radio" id="M" value="m" style="margin-top: 10px; margin-left: 15px;" onclick="return exibir_reservista()" required><i class="fa fa-male" style="font-size: 20px;"></i>
														<input type="radio" name="gender" id="radio" id="F" value="f" style="margin-top: 10px; margin-left: 15px;" onclick="return esconder_reservista()" ><i class="fa fa-female" style="font-size: 20px;"></i> 
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telefone</label>
													<div class="col-md-8">
														<input type="text" class="form-control" maxlength="14" minlength="14" name="telefone" id="telefone" id="profileCompany" placeholder="Ex: (22)99999-9999" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#####-####',this,event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Nascimento</label>
													<div class="col-md-8">
														<input type="date" placeholder="dd/mm/aaaa" maxlength="10" class="form-control" name="nascimento" id="nascimento" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nome do pai</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="nome_pai" id="profileFirstName pai" onkeypress="return Onlychars(event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nome da mãe</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="nome_mae" id="profileFirstName" id="mae" onkeypress="return Onlychars(event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Tipo sanguíneo</label>
													<div class="col-md-6">
													<select class="form-control input-lg mb-md" name="sangue" id="sangue">
														<option selected disabled>Selecionar</option>
														<option value="A+">A+</option>
														<option value="A-">A-</option>
														<option value="B+">B+</option>
														<option value="B-">B-</option>
														<option value="O+">O+</option>
														<option value="O-">O-</option>
														<option value="AB+">AB+</option>
														<option value="AB-">AB-</option>
													</select>
													</div>	
												</div>
												<br/>

											<hr class="dotted short">
											<h4 class="mb-xlg">Endereço</h4>
											
												<div class="form-group">
													<label class="col-md-3 control-label" for="cep">CEP</label>
													<div class="col-md-8">
														<input type="text" name="cep"  value="" size="10" onblur="pesquisacep(this.value);" class="form-control" id="cep" maxlength="9" placeholder="Ex: 22222-222" onkeypress="return Onlynumbers(event)" onkeyup="mascara('#####-###',this,event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="uf">Estado</label>
													<div class="col-md-8">
														<input type="text" name="uf" size="60" class="form-control" id="uf" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="cidade">Cidade</label>
													<div class="col-md-8">
														<input type="text" size="40" class="form-control" name="cidade" id="cidade" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="bairro">Bairro</label>
													<div class="col-md-8">
														<input type="text" name="bairro" size="40" class="form-control" id="bairro" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="rua">Logradouro</label>
													<div class="col-md-8">
														<input type="text" name="rua" size="2" class="form-control" id="rua" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Número residencial</label>
													<div class="col-md-4">
														<input type="number" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" name="numero_residencia"  id="numero_residencia">
													</div>

													<div class="col-md-3"> 
														<label>Não possuo número</label>
														<input type="checkbox" id="numResidencial" name="naoPossuiNumeroResidencial"  style="margin-left: 4px" onclick="return numero_residencial()">

													</div>
												
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Complemento</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="complemento" id="complemento" id="profileCompany">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="ibge">IBGE</label>
													<div class="col-md-8">
														<input type="text" size="8" name="ibge" class="form-control"  id="ibge">
													</div>
												</div>
												<br/>
											
												<hr class="dotted short">
												<h4 class="mb-xlg doch4">Documentação</h4>

												
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Número do RG</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="rg" id="rg" onkeypress="return Onlynumbers(event)" placeholder="Ex: 22.222.222-2" required>
														</div>
														
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Órgão emissor</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="orgao_emissor" id="profileCompany" id="orgao_emissor" onkeypress="return Onlychars(event)" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Data de expedição</label>
														<div class="col-md-6">
															<input type="date" class="form-control" maxlength="10" placeholder="dd/mm/aaaa" id="profileCompany" name="data_expedicao" id="data_expedicao" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Número do CPF</label>
														<div class="col-md-6">
															<input type="text" class="form-control" id="profileCompany" id="cpf" name="cpf" placeholder="Ex: 222.222.222-22" maxlength="14" onblur="validarCPF(this.value)"" onkeypress="return Onlynumbers(event)" onkeyup="mascara('###.###.###-##',this,event)" required>
														</div>														
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany"></label>
														<div class="col-md-6">
															<p id="cpfInvalido" style="display: none; color: #b30000">CPF INVÁLIDO!</p>
														</div>														
													</div>

													

													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Data de admissão</label>
														<div class="col-md-8">
															<input type="date" placeholder="dd/mm/aaaa" maxlength="10" class="form-control" name="data_admissao" id="profileCompany" id="data_admissao"  required>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="profileLastName">Certidão de nascimento</label>
														<div class="col-md-4">
															<input type="radio" name="certidao" id="radio" value="certidaosim" id="sim" style="margin-top: 15px; margin-left: 15px;" required
															><i class="fa fa-check" style="font-size: 20px;"></i>
															<input type="radio" name="certidao" id="radio" id="nao" value="certidaonao" style="margin-top: 15px; margin-left: 15px;"><i class="fa fa-times" style="font-size: 20px;"></i>
														</div>
													</div>

												<h4 class="mb-xlg doch4">Outros</h4>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">Vale transporte</label>
													<div class="col-md-8">
														<input type="radio" name="vale_transporte" id="vale_transporte" value="Possui" style="margin-top: 10px; margin-left: 15px;"  onclick="return exibir_vale_transporte()" required><i class="fa fa-check" style="font-size: 20px;"></i>

														<input type="radio" name="vale_transporte" id="vale_transporte" value="Não possui" class="vale_transporte" style="margin-top: 10px; margin-left: 15px;" onclick="return esconder_vale_transporte()"><i class="fa fa-times" style="font-size: 20px;" ></i> 
													</div>
												</div>

												

												<div class="form-group" id="esconder_exibir" style="display: none;">
													<label class="col-md-3 control-label" >Número vale transporte</label>
													<div class="col-md-6">
														<input type="text" id="num_transporte" name="num_vale_transporte" class="form-control">
													</div>														
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">Cesta básica</label>
													<div class="col-md-8">
														<input type="radio" name="cesta_basica" id="cesta_basica" value="Possui" style="margin-top: 10px; margin-left: 15px;" required><i class="fa fa-check" style="font-size: 20px;"></i>

														<input type="radio" name="cesta_basica" id="cesta_basica" value="Não possui" class="vale_transporte" style="margin-top: 10px; margin-left: 15px;"><i class="fa fa-times" style="font-size: 20px;" ></i> 
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >PIS</label>
													<div class="col-md-6">
														<input type="text" name="pis" class="form-control" required>
													</div>														
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >CTPS</label>
													<div class="col-md-6">
														<input type="text" name="ctps" class="form-control" required>
													</div>														
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="uf">Estado CTPS</label>
													<div class="col-md-6">
														<input type="text" name="uf_ctps" size="60" class="form-control" id="uf" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Título de eleitor</label>
													<div class="col-md-6">
														<input type="text" name="titulo_eleitor" class="form-control" required>
													</div>														
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Zona eleitoral</label>
													<div class="col-md-6">
														<input type="text" name="zona_eleitoral" class="form-control" required>
													</div>														
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Seção do título de eleitor</label>
													<div class="col-md-6">
														<input type="text" name="secao_titulo_eleitor" class="form-control" required>
													</div>														
												</div>


	
												<div class="form-group" id="reservista1" style="display: none">
													<label class="col-md-3 control-label" >Número do certificado reservista</label>
													<div class="col-md-6">
														<input type="text" name="certificado_reservista_numero" class="form-control num_reservista">
													</div>														
												</div>


												<div class="form-group" id="reservista2" style="display: none">
													<label class="col-md-3 control-label" >Série do certificado reservista</label>
													<div class="col-md-6">
														<input type="text" name="certificado_reservista_serie" class="form-control serie_reservista">
													</div>														
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Calçado</label>
													<a href="adicionar_calcado.php"><i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i></a>
													<div class="col-md-6">
													<select class="form-control input-lg mb-md" name="calcado" id="calcado">
														<option selected disabled>Selecionar</option>
														<option value="Não utiliza">Não utiliza</option>
														<?php 
															while($linha=mysqli_fetch_array($calcado))
															{
																echo "<option value=".$linha['tamanhos'].">".$linha['tamanhos']."</option>";
															}
														?>
													</select>
													</div>	
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Calça</label>
													<a href="adicionar_calca.php"><i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i></a>
													<div class="col-md-6">
													<select class="form-control input-lg mb-md" name="calca" id="calca">
														<option selected disabled>Selecionar</option>
														<option value="Não utiliza">Não utiliza</option>
														<?php 
															while($linha=mysqli_fetch_array($calca))
															{
																echo "<option>".$linha['tamanhos']."</option>";
															}
														?>
													</select>
													</div>	
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Jaleco</label>
													<a href="adicionar_jaleco.php"><i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i></a>
													<div class="col-md-6">
													<select class="form-control input-lg mb-md" name="jaleco" id="jaleco">
														<option selected disabled>Selecionar</option>
														<option value="Não utiliza">Não utiliza</option>
														<?php 
															while($linha=mysqli_fetch_array($jaleco))
															{
																echo "<option>".$linha['tamanhos']."</option>";
															}
														?>
													</select>
													</div>	
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Camisa</label>
													<a href="adicionar_camisa.php"><i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i></a>
													<div class="col-md-6">
													<select class="form-control input-lg mb-md" name="camisa" id="camisa">
														<option selected disabled>Selecionar</option>
														<option value="Não utiliza">Não utiliza</option>
														<?php 
															while($linha=mysqli_fetch_array($camisa))
															{
																echo "<option>".$linha['tamanhos']."</option>";
															}
														?>
													</select>
													</div>	
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Situação</label>
													<a href="adicionar_situacao.php"><i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i></a>
													<div class="col-md-6">
														<select class="form-control input-lg mb-md" name="situacao" id="situacao">
															<option selected disabled>Selecionar</option>
															<option value="Não informada">Não informada</option>
															<?php 
															while($linha=mysqli_fetch_array($situacao))
															{
																echo "<option>".$linha['situacoes']."</option>";
															}
														?>
														</select>
													</div>														
												</div>


											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<input id="enviar" type="submit" class="btn btn-primary" disabled="true" >
														<input type="reset" class="btn btn-default">
													</div>
												</div>
											</div>

											</form>


										</fieldset>
											

				
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<!-- end: page -->
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<script src="../assets/vendor/jquery/jquery.js"></script>
		<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../assets/javascripts/theme.init.js"></script>

	</body>
</html>