<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Cadastro de Interno</title>
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

		<!-- Vendor -->
		<script src="../assets/vendor/jquery/jquery.min.js"></script>
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


		<!-- javascript functions -->
		<script src="../Functions/onlyNumbers.js"></script>
		<script src="../Functions/onlyChars.js"></script>
		<script src="../Functions/enviar_dados.js"></script>
		<script src="../Functions/mascara.js"></script>

		<!-- jquery functions -->
		<script>
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

	</head>
		<body>
		<section class="body">

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
									<a role="menuitem" tabindex="-1" href="../index.php"><i class="fa fa-power-off"></i> Sair da sessão</a>
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
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Cadastro</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Cadastros</span></li>
								<li><span>Interno</span></li>
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
										<div class="form-group" >										
										
												<label class="control-label" id="label-perfil">Imagem de perfil:</label>
												<input type="file" name="imgPerfil" size="60" id="imgPerfil" class="form-control">
										
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

								

									<h6 class="text-muted"></h6>
									
									

									
								</div>
							</section>
						</div>
						<div class="col-md-8 col-lg-8">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Cadastro de Interno</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">

											<h4 class="mb-xlg">Informações Pessoais</h4>
											<form id="formulario" action="../controle/control.php">
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label">Nome completo</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="nome" id="nome" id="profileFirstName" onkeypress="return Onlychars(event)" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Sexo</label>
													<div class="col-md-8">
														<input type="radio" name="sexo" id="radio1" value="m" style="margin-top: 10px margin-left: 15px;" required><i class="fa fa-male" style="font-size: 20px;" required></i>
														<input type="radio" name="sexo" id="radio2"  value="f" style="margin-top: 10px; margin-left: 15px;"><i class="fa fa-female" style="font-size: 20px;"></i> 
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" >Nome Contato</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="nomeContato" id="nomeContato" id="profileFirstName" onkeypress="return Onlychars(event)">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telefone contato 1</label>
													<div class="col-md-8">
														<input type="text" class="form-control" maxlength="14" minlength="14" name="telefone1" id="telefone1" id="profileCompany" placeholder="Ex: (22)99999-9999" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#####-####',this,event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telefone contato 2</label>
													<div class="col-md-8">
														<input type="text" class="form-control" maxlength="14" minlength="14" name="telefone2" id="telefone2" id="profileCompany" placeholder="Ex: (22)99999-9999" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#####-####',this,event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Telefone contato 3</label>
													<div class="col-md-8">
														<input type="text" class="form-control" maxlength="14" minlength="14" name="telefone3" id="telefone3" id="profileCompany" placeholder="Ex: (22)99999-9999" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#####-####',this,event)" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Nascimento</label>
													<div class="col-md-8">
														<input type="date" placeholder="dd/mm/aaaa" maxlength="10" class="form-control" name="nascimento" id="nascimento" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileName">Nome do Pai</label>
													<div class="col-md-8">
														<input type="text" name="pai" class="form-control"  onkeypress="return Onlychars(event)" id="pai" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Nome da Mãe</label>
													<div class="col-md-8">
														<input type="text" name="nomeMae" class="form-control" id="mae" id="profileFirstName" onkeypress="return Onlychars(event)" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Tipo Sanguíneo</label>
													<div class="col-md-6">
													<select name="sangue" id="sangue" class="form-control input-lg mb-md">
														<option selected disabled value="blank">Selecionar</option>
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
											<h4 class="mb-xlg doch4">Documentação</h4>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Número do RG</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="rg" id="rg" onkeypress="return Onlynumbers(event)" placeholder="Ex: 22.222.222-2" required>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Órgão Emissor</label>
													<div class="col-md-6">
														<input type="text" name="orgaoEmissor" class="form-control" id="orgao" onkeypress="return Onlychars(event)">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Data de Expedição</label>
													<div class="col-md-6">
															<input type="date" class="form-control" maxlength="10" placeholder="dd/mm/aaaa" id="profileCompany" name="dataExpedicao" id="data_expedicao" required>
														</div>
												</div>
												
												<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Número do CPF</label>
														<div class="col-md-6">
															<input type="text" class="form-control" id="profileCompany" id="cpf" name="numeroCPF" placeholder="Ex: 222.222.222-22" maxlength="14" onblur="validarCPF(this.value)"" onkeypress="return Onlynumbers(event)" onkeyup="mascara('###.###.###-##',this,event)" required>
														</div>														
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany"></label>
														<div class="col-md-6">
															<p id="cpfInvalido" style="display: none; color: #b30000">CPF INVÁLIDO!</p>
														</div>														
													</div>
												
												<hr class="dotted short">
												<div class="form-group">
												<label class="col-md-3 control-label">Benefícios</label>
		
													<div class="col-md-8">
														<div class="checkbox">
															<label for="beneficio">
																<input type="checkbox" name="certidao" value="Possui" id="certidao-checkbox" >Certidão de Nascimento			
															</label><br>
															<label for="beneficio">
																<input type="checkbox" name="curatela" value="Possui" id="curatela-checkbox" >Curatela
															</label><br>
															<label for="beneficio">
																<input type="checkbox" name="inss" value="Possui" id="inss-checkbox" >INSS
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="loas" value="Possui" id="loas-checkbox" >LOAS
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="funrural" value="Possui" id="funrural-checkbox" >FUNRURAL
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="rg" value="Possui" id="rg-checkbox" >RG
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="cpf" value="Possui" id="cpf-checkbox" >CPF
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="tituloEleitor" value="Possui" id="tituloEleitor-checkbox" >Título de Eleitor
																<input type="hidden" name="nomeClasse" value="InternoControle">
																<input type="hidden" name="metodo" value="incluir">
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="ctps" value="Possui" id="ctps-checkbox" >CTPS
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="saf" value="Possui" id="saf-checkbox" >SAF
															</label><br>
														
															<label for="beneficio">
																<input type="checkbox" name="sus" value="Possui" id="sus-checkbox" >SUS
															</label><br>

															<label for="beneficio">
																<input type="checkbox" name="bpc" value="Possui" id="bpc-checkbox" >BPC
															</label><br>
														</div>
													</div>
													<br>
													<hr class="dotted short">
													<h4 class="mb-xlg doch4" id="label-imagens">Imagens</h4> 
													<div class="form-group" >

															<label class="col-md-4 control-label" id="label-rg" for="imgRg" >RG:</label>
															<div class="col-md-8">
																<input type="file" name="imgRg" size="60" id="imgRg" class="form-control" >
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="imgCpf" id="label-cpf">CPF:</label>
															<div class="col-md-8">
																<input type="file" name="imgCpf" size="60" id="imgCpf" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="imgCertidaoNascimento" id="label-certidao">Certidão de Nascimento:</label>
															<div class="col-md-8">
																<input type="file" name="imgCertidaoNascimento" size="60" id="imgCertidaoNascimento" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-curatela" for="imgCuratela">Curatela:</label>
															<div class="col-md-8">
																<input type="file" name="imgCuratela" size="60" id="imgCuratela" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label"  for="imgInss" id="label-inss">INSS:</label>
															<div class="col-md-8">
																<input type="file" name="imgInss" size="60" id="imgInss" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-loas"  for="imgLoas">LOAS:</label>
															<div class="col-md-8">
																<input type="file" name="imgLoas" size="60" id="imgLoas" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-funrural" for="imgFunrural">FUNRURAL:</label>
															<div class="col-md-8">
																<input type="file" name="imgFunrural" size="60" id="imgFunrural" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-titulo" for="imgTituloEleitor">Título de Eleitor:</label>
															<div class="col-md-8">
																<input type="file" name="imgTituloEleitor" size="60" id="imgTituloEleitor" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-ctps" for="imgCtps">CTPS:</label>
															<div class="col-md-8">
																<input type="file" name="imgCtps" size="60" id="imgCtps" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-saf" for="imgSaf">SAF:</label>
															<div class="col-md-8">
																<input type="file" name="imgSaf" size="60" id="imgSaf" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-sus" for="imgSus">SUS:</label>
															<div class="col-md-8">
																<input type="file" name="imgSus" size="60" id="imgSus" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" id="label-bpc" for="imgBpc">BPC:</label>
															<div class="col-md-8">
																<input type="file" name="imgBpc" size="60" id="imgBpc" class="form-control">
															</div>
														</div>
												</div>

											<br/>

											<section class="panel">
												<header class="panel-heading">
													<div class="panel-actions">
														<a href="#" class="fa fa-caret-down"></a>
													</div>

													<h2 class="panel-title">Informações do Interno</h2>
												</header>
												<div class="panel-body" style="display: block;">
													<section class="simple-compose-box mb-xlg ">

															<textarea name="observacoes" data-plugin-textarea-autosize placeholder="Observações" rows="1" style="height: 10vw"></textarea>
													</section>
												</div>
											</section>
										</fieldset>
										</form>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button id="enviar" class="btn btn-primary"  type="submit" disabled="true" >Enviar</button>  
													</div>
												</div>
											</div>

										
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						
					</div>
				</div>
			</aside>
		</section>

		
	</body>
</html>
