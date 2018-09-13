<?php session_start(); 
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Perfil interno</title>
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

		<script>
			$(function(){
				var internos=<?php echo $_SESSION['internos'];?>;
				var id=<?php echo $_GET['id']; ?>;
				$.each(internos,function(i,item){
					if(i==id)
					{
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

						$("#telefone1").text("Telefone contato urgente 1: "+item.telefone_contato_urgente_1);


						$("#telefone2").text("Telefone contato urgente 2: "+item.telefone_contato_urgente_2);


						$("#telefone3").text("Telefone contato urgente 3: "+item.telefone_contato_urgente_3);

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

						$("#inss").text("INSS: "+item.inss);

						$("#loas").text("LOAS: "+item.loas);

						$("#funrural").text("FUNRURAL: "+item.funrural);

						$("#tituloEleitor").text("Título de eleitor: "+item.tituloEleitor);

						$("#ctps").text("CTPS: "+item.ctps);

						$("#saf").text("SAF: "+item.saf);

						$("#sus").text("SUS: "+item.sus);

						$("#bpc").text("BPC: "+item.bpc);
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
												<a href="cadastro_funcionario.php">
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
														<li id="nome"></li>
														<li id="sexo"></li>
														<li id="telefone1">Telefone1:</li>
														<li id="telefone2">Telefone2:</li>
														<li id="telefone3">Telefone3:</li>
														<li id="sangue">Tipo Sanguineo</li>
														<li id="nascimento">Data de Nascimento:</li>
														<li id="cep">CEP:</li>
														<li id="cidade">Cidade:</li>
														<li id="bairro">Bairro:</li>
														<li id="logradouro">Logradouro:</li>
														<li id="numero">Número:</li>
														<li id="complemento">Complemento:</li>
														<br/>

														<li>RG</li>
														<li id="rg">Número:</li>
														<li id="data_expedicao">Data de Expedição do RG:</li>
														<br/>

														<li id="cap">CPF</li>
														<li id="cpf">Número:</li> 
														<br/>

														<li id="cap">Beneficios</li>
														<li id="inss">INSS:</li>
														<li id="loas">LOAS:</li>
														<li id="funrural">FUNRURAL:</li>
														<li id="tituloEleitor">Título de Eleitor:</li>
														<li id="ctps">CTPS:</li>
														<li id="saf">SAF:</li>
														<li id="sus">SUS:</li>
														<li id="bpc">BPC:</li>
														<br/>
													</ul>
												</div>
											</section>
										</div>
									</div>
									
									<div id="edit" class="tab-pane">

										<form class="form-horizontal" method="get" action="#">
											<fieldset>
												<div class="tab-content">
													<div id="overview" class="tab-pane active">
														
															<h4 class="mb-xlg">Informações Pessoais</h4>
															<fieldset>
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileFirstName">Nome completo</label>
																	<div class="col-md-8">
																		<input type="text" class="form-control" name="nome" id="nome" id="				profileFirstName" onkeypress="return Onlychars(event)" required>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileLastName">Sexo</label>
																	<div class="col-md-8">
																		<input type="radio" name="sexo" id="radio" id="M" value="m" style="margin-top: 10px margin-left: 15px;" required><i class="fa fa-male" style="font-size: 20px;" ></i>
																		<input type="radio" name="sexo" id="radio" id="F" value="f" style="margin-top: 10px; margin-left: 15px;"><i class="fa fa-female" style="font-size: 20px;"></i> 
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Telefone contato 1</label>
																	<div class="col-md-8">
																		<input type="text" name="telefone1" class="form-control" minlength="11" id="profileCompany" id="telefone1" maxlength="13" placeholder="(##)#########" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#########',this,event)" >
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Telefone contato 2</label>
																	<div class="col-md-8">
																		<input type="text" name="telefone2" class="form-control" minlength="11" id="profileCompany" id="telefone2" maxlength="13" placeholder="(##)#########" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#########',this,event)" >
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Telefone contato 3</label>
																	<div class="col-md-8">
																		<input type="text" name="telefone3" class="form-control" minlength="11" id="profileCompany" id="telefone3" maxlength="13" placeholder="(##)#########" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)#########',this,event)" >
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Nascimento</label>
																	<div class="col-md-8">
																		<input type="text" name="nascimento" class="form-control" id="profileCompany" id="nascimento" placeholder="dd/mm/aaaa" maxlength="10" onkeypress="return Onlynumbers(event)" onkeyup="mascara('##/##/####',this,event)" required>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileName">Nome do Pai</label>
																	<div class="col-md-8">
																		<input type="text" name="pai" class="form-control"  onkeypress="return Onlychars(event)" id="pai" required>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileFirstName">Nome da Mãe</label>
																	<div class="col-md-8">
																		<input type="text" name="nomeMae" class="form-control" id="mae" id="profileFirstName" onkeypress="return Onlychars(event)" required>
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
																</div><br/>
															</fieldset>
															<hr class="dotted short">
															
															<fieldset>
																<h4 class="mb-xlg doch4">Documentação</h4>

																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Número do RG</label>
																	<div class="col-md-6">
																		<input type="text" name="rg" class="form-control" id="rg" id="profileCompany" maxlength="12" placeholder="##.###.###-#" onkeypress="return Onlynumbers(event)" onkeyup="mascara('##.###.###-#',this,event)" required>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Órgão Emissor</label>
																	<div class="col-md-6">
																		<input type="text" name="orgaoEmissor" class="form-control" id="profileCompany" id="orgao_emissor" onkeypress="return Onlychars(event)" required>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Data de Expedição</label>
																	<div class="col-md-6">
																		<input type="text" name="dataExpedicao" class="form-control" id="profileCompany" id="data_expedicao" placeholder="dd/mm/aaaa" maxlength="10" onkeypress="return Onlynumbers(event)" onkeyup="mascara('##/##/####',this,event)" required>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileCompany">Número do CPF</label>
																	<div class="col-md-6">
																		<input type="text" name="numeroCPF" class="form-control" id="profileCompany" id="cpf" maxlength="14" placeholder="###.###.###-##" onkeypress="return Onlynumbers(event)" onkeyup="mascara('###.###.###-##',this,event)" required>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileLastName">Certidão de Nascimento</label>
																	<div class="col-md-4">
																		<input type="radio" name="certidao" id="radio" id="s" value="certidaosim" style="margin-top: 15px; margin-left: 15px;" required><i class="fa fa-check" style="font-size: 20px;"></i>
																		<input type="radio" name="certidao" id="radio" id="n" value="certidaonao" style="margin-top: 15px; margin-left: 15px;" required><i class="fa fa-times" style="font-size: 20px;"></i>
																	</div>
																</div>
												
																<div class="form-group">
																	<label class="col-md-3 control-label" for="profileLastName">Curatela</label>
																	<div class="col-md-4">
																		<input type="radio" name="curatela" id="radio" value="curatelasim" style="margin-top: 10px; margin-left: 15px;"><i class="fa fa-check" style="font-size: 20px;"></i>
																		<input type="radio" name="curatela" id="radio" value="curatelanao" style="margin-top: 10px; margin-left: 15px;"><i class="fa fa-times" style="font-size: 20px;"></i>
																	</div>
																</div>
												
																<hr class="dotted short">
																<div class="form-group">
																	<label class="col-md-3 control-label"><h4>Benefícios</h4></label><br><br>
																		<div class="col-md-8">
																	<div class="checkbox">
																		<label for="beneficio">
																			<input type="checkbox" name="inss" value="inss" id="inss" >INSS
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="loas" value="loas" id="loas" >LOAS
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="funrural" value="funrural" id="funrural" >FUNRURAL
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="rg" value="rg" id="rg" >RG
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="cpf" value="cpf" id="cpf" >CPF
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="tituloEleitor" value="tituloEleitor" id="tituloEleitor" >Título de Eleitor
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="ctps" value="ctps" id="ctps" >CTPS
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="saf" value="saf" id="saf" >SAF
																		</label><br>
														
																		<label for="beneficio">
																			<input type="checkbox" name="sus" value="sus" id="sus" >SUS
																		</label><br>

																		<label for="beneficio">
																			<input type="checkbox" name="bpc" value="bpc" id="bpc" >BPC
																		</label><br>
																	</div>
																		</div>
																</div><br/>

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