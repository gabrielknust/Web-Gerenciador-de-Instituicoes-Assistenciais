<?php session_start(); 
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Perfil funcionário</title>
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="icon" href="../img/logofinal.png" type="image/x-icon">

		<script src="../assets/vendor/jquery/jquery.min.js"></script>
		<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="../assets/vendor/modernizr/modernizr.js"></script>

		<!-- jquery functions -->
		<script>
			$(function(){

				var funcionarios=<?php echo $_SESSION['funcionarios'];?>;
				console.log(funcionarios);
				var id=<?php echo $_GET['id']; ?>;
				$.each(funcionarios,function(i,item){
					if(i==id)
					{


						if (item.sexo == 'f') {
							$('#reservista').hide();
						}

						console.log(item);
						$("#nome").text("Nome: "+item.nome);

						if(item.sexo=="m")
						{
							$("#sexo").html("Sexo: <i class='fa fa-male'></i>  Masculino");
						}
						else if(item.sexo=="f")
						{
							$("#sexo").html("Sexo: <i class='fa fa-female'>  Feminino");
						}

						$("#telefone").text("Telefone: "+item.telefone);

						$("#sangue").text("Sangue: "+item.tipo_sanguineo);
						
						$("#nascimento").text("Data de nascimento: "+item.data_nascimento);

						$("#cep").text("CEP: "+item.cep);

						$("#cidade").text("Cidade: "+item.cidade);

						$("#bairro").text("Bairro: "+item.bairro);

						$("#logradouro").text("Logradouro: "+item.logradouro);

						$("#numero").text("Numero: "+item.numero_endereco);

						$("#complemento").text("Complemento: "+item.complemento);

						$("#rg").text("Registro geral: "+item.registro_geral);

						$("#data_expedicao").text("Data de expedição: "+item.data_expedicao);

						$("#cpf").text("CPF: "+item.cpf);

						$("#pis").text("PIS: "+item.pis);

						$("#zona").text("Zona Eleitoral: "+item.zona);

						$("#titulo_eleitor").text("Título de eleitor: "+item.numero_titulo);

						$("#tituloEleitor").text("Título de eleitor: "+item.tituloEleitor);

						$("#ctps").text("CTPS: "+item.ctps);

						$("#uf_ctps").text("UF: "+item.uf_ctps);

						$("#jaleco").text("Jaleco: "+item.jaleco);

						$("#camisa").text("Camisa: "+item.camisa);

						$("#calcado").text("Calçado: "+item.calcado);

						$("#calca").text("Calça: "+item.calca);

						$("#certificado_reservista_numero").text("Número: "+item.certificado_reservista_numero);

						$("#certificado_reservista_serie").text("Série: "+item.certificado_reservista_serie);

						if (item.usa_vtp== "Possui") {

							$("#usa_vtp").html("Vale Transporte: <i class='fa fa-check'>");
							$("#vale_transporte").text("Número do vale transporte: "+item.vale_transporte);

						}else {
							$("#usa_vtp").html("Vale Transporte: <i class='fa fa-times'>");
							$("#vale_transporte").hide();
						}

						$("#data_admissao").text("Data de admissão: "+item.data_admissao);
					}
				})
			});
		</script>


	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="home.html" class="logo">
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
								<img src="../img/koala.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">John Doe Junior</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Logout</a>
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
							Navigation
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
										<a href="home.html">
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
												<a href="cadastro_funcionario.html">
													 Cadastrar funcionário
												</a>
											</li>
											<li>
												<a href="cadastro_interno.html">
													 Cadastrar interno
												</a>
											</li>
											<li>
												<a href="cadastro_voluntario.html">
													 Cadastrar voluntário
												</a>
											</li>
											<li>
												<a href="cadastro_voluntario_judicial.html">
													 Cadastrar voluntário judicial
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
						<h2>Perfil</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Páginas</span></li>
								<li><span>Perfil</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-4 col-lg-3">
							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="../img/semfoto.jpg" class="rounded img-responsive" alt="John Doe"><br>
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
								</div>
							</section>
						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Visaõ Geral</a>
									</li>

									<li>
										<a href="#edit" data-toggle="tab">Editar Dados</a>
									</li>
								</ul>
								
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										<div>
											<section class="panel">
												<header class="panel-heading">
													<div class="panel-actions">
														<a href="#" class="fa fa-caret-down"></a>
													</div>

													<h2 class="panel-title">Visão Geral</h2>
												</header>
												 
												<div class="panel-body" style="display: block;">
													<ul class="nav nav-children" id="info">

														<li id="cap">Dados Pessoais:</li>
														<li id="nome">Nome:</li>
														<li id="sexo">Sexo: <i class="fa fa-male"></i>   <i class="fa fa-female"></i></li>
														<li id="telefone">Telefone:</li>
														<li id="nascimento">Data de Nascimento:</li>
														<li id="sangue">Tipo Sanguineo</li>
														<li id="cep">CEP:</li>
														<li id="cidade">Cidade:</li>
														<li id="bairro">Bairro:</li>
														<li id="logradouro">Logradouro:</li>
														<li id="numero">Número:</li>
														<li id="complemento">Complemento:</li>
														<br/>

														<li id="cap">RG</li>
														<li id="rg">Número:</li>
														<li id="data_expedicao">Data de Expedição do RG:</li>
														<br/>

														<li id="cap">CTPS</li>
														<li id="ctps">Número:</li> 
														<li id="uf_ctps">UF:</li>
														<li id="pis">PIS:</li>
														<br/>

														<li id="zona">Zona Eleitoral: </li>
														<li id="titulo_eleitor">Título de Eleitor:</li>
														<br/>
														
														<div id="reservista">
															
														<li id="cap">Certificado de Reservista</li>
														<li id="certificado_reservista_numero">Número:</li>
														<li id="certificado_reservista_serie">Série:</li>
														<br/>

														</div>

														

														<li id="cap">Empresa</li>
														<li id="usa_vtp">Vale Transporte: <i class="fa fa-check"></i>   <i class="fa fa-times"></i> </li>
														<li id="vale_transporte">Número do vale transporte</li>
														<li id="data_admissao">Data de Admissão: 00/00/0000</li>
														<br/>
														<li id="cap">Vestuário</li>
														<li id="calcado">Calçado: </li>
														<li id="calca">Calça: </li>
														<li id="jaleco">Jaleco: </li>
														<li id="camisa">Camisa: </li>
													</ul>
												</div>
											</section>
										</div>
									</div>
									
									<div id="edit" class="tab-pane">

										<form class="form-horizontal" method="get">
											<h4 class="mb-xlg">Editar informçoes</h4>
											<fieldset>
												<form method="get" action=".">
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileFirstName">Nome</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="profileFirstName">
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Telefone</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="profileCompany">
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Nascimento</label>
														<div class="col-md-8">
															<input type="date" class="form-control" id="profileCompany">
														</div>
													</div>
				
													<div class="form-group">
														<label class="col-md-3 control-label" for="cep">CEP</label>
															<div class="col-md-8">
																<input type="text" name="cep"  value="" size="10" onblur="pesquisacep(this.value);" class="form-control" id="cep">
															</div>
													</div>
												
													<div class="form-group">
														<label class="col-md-3 control-label" for="uf">Estado</label>
														<div class="col-md-8">
															<input type="text" name="uf" size="60" class="form-control" id="uf">
														</div>
													</div>
												
													<div class="form-group">
														<label class="col-md-3 control-label" for="cidade">Cidade</label>
														<div class="col-md-8">
															<input type="text" size="40" class="form-control" id="cidade">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="bairro">Bairro</label>
														<div class="col-md-8">
															<input type="text" name="bairro" size="40" class="form-control" id="bairro">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="rua">Logradouro</label>
														<div class="col-md-8">
															<input type="text" name="rua" size="2" class="form-control" id="rua">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Número</label>
														<div class="col-md-8">
															<input type="number" class="form-control" id="profileCompany">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Complemento</label>
														<div class="col-md-8">
															<input type="text" class="form-control" id="profileCompany">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="ibge">IBGE</label>
														<div class="col-md-8">
															<input type="text" size="8" name="ibge" class="form-control" id="ibge">
														</div>
													</div><br/>
												</form>
											</fieldset>
											
											<hr class="dotted tall">
											<h4 class="mb-xlg">Alterar Senha de Acesso</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPassword">Nova Senha</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileNewPassword">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Confirmação</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileNewPasswordRepeat">
													</div>
												</div>
											</fieldset>
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>
										</form>
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
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="../img/semfoto.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="../img/semfoto.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="../img/semfoto.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="../img/semfoto.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
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