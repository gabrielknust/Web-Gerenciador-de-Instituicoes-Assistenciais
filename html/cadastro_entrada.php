<!doctype html>
<html class="fixed">
<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Cadastro de Doação</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="../assets/vendor/fontawesome/svg-with-js/css/fa-svg-with-js.css" />
	<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
	<link rel="icon" href="../img/logofinal.png" type="image/x-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="../assets/vendor/modernizr/modernizr.js"></script>

	<!-- Javascript functions -->
	<script >
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
								<a role="menuitem" tabindex="-1" href="../html/profile.html"><i class="fa fa-user"></i> My Profile</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="../index.html"><i class="fa fa-power-off"></i> Logout</a>
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
					<div class="sidebar-title">Navegação</div>
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
									</ul>
								</li>
							</ul>
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
								<a href="home.html">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Cadastro</span></li>
							<li><span>Doação</span></li>
						</ol>
						<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->
				<div class="row">
					<div class="col-md-4 col-lg-2" style=" visibility: hidden;"></div>
					<div class="col-md-8 col-lg-8" >
						<div class="tabs">
							<ul class="nav nav-tabs tabs-primary">
								<li class="active">
									<a href="#overview" data-toggle="tab">Cadastro de Doação</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="overview" class="tab-pane active">
									<form class="form-horizontal" method="post" >
										<input type="hidden" name="nomeClasse" value="FuncionarioControle">
										<input type="hidden" name="metodo" value="incluir">
										<fieldset>
											<div class="info-entrada" >
												<div class="form-group">
													<label class="col-md-3 control-label" >Origem</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="origem" id="origem">
													</div>
													<a href="cadastro_doador.php"><i class="fas fa-plus w3-xlarge"></i></a>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Almoxarifado</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="almox" id="almox">
													</div>
													<a href="adicionar_almozarifado.php"><i class="fas fa-plus w3-xlarge"></i></a>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >Tipo</label>
													<div class="col-md-6">
														<select class="form-control " name="tipo" id="tipo">
															<option selected disabled>Selecionar</option>
															<option value="doacao">doacao</option>
															<option value="compra">compra</option>
															<option value="troca">troca</option>
														</select>
													</div>
													<a href="adicionar_tipoEntrada.php"><i class="fas fa-plus w3-xlarge"></i></a>
												</div>
												
											</div>
											<div class="panel-body" >
												<form>
													<div class="table-responsive">
													<table class="table table-bordered mb-none">

														<thead>
															<tr>
																<th>Produto<a href="" class="fas fa-plus w3-xlarge" style="float:right;">
																</a></th>
																<th>Qtd<a href="" class="fas fa-plus w3-xlarge" style="float:right;"></a></th>
																<th>valor total</th>
																<th>incluir</th>
															</tr>
														</thead>
															<td>
																<input type="search" name="prod" size="20" class="form-control">
															</td>
															<td>
																<input type="number" name="qtd" size="20" class="form-control">
															</td>
															<td> 
															
															</td>
															<td >
																<button id="AddProduto" type="button">incluir</button>
															</td>
														</tbody>
													</table>
												</div>
												</form><br>

												<div class="table-responsive">
													<table class="table table-bordered mb-none">
														<thead>
															<tr>
																<th>Codigo</th>
																<th>Produto<a href="" class="fas fa-plus w3-xlarge" style="float: right; ">
																</a></th>
																<th>Quantidade<a href="" class="fas fa-plus w3-xlarge" style="float: right;">
																</a></th>
																<th>valor</th>
																<th>ação</th>
															</tr>
														</thead>
														<tbody>
															
															<tr>
																<th>1</th>
																<th>arroz 5kg 5,00</th>
																<th>2</th>
																<th>10</th>
																<td>
																	<button type="button">remover</button></td>
															</tr>
														</tbody>
														<tfoot>
															<tr >
																<td>valor total:</td>
																<td id="valor-total"></td>

															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</fieldset><br>
										<div class="row">
											<div class="col-md-9 col-md-offset-3">
												<input type="submit" class="btn btn-primary" >
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