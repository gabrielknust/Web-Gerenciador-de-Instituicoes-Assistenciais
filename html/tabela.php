	<?php
		session_start();
	?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Informaçoes</title>
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


			<!-- Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="../assets/vendor/modernizr/modernizr.js"></script>
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
									<a role="menuitem" tabindex="-1" href="../html/profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
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
						<h2>Informaçoes</h2>
					
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
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
						
								<h2 class="panel-title">Funcionario</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>nome</th>
											<th>cpf</th>
										</tr>
									</thead>
									<tbody>
										<tr class="gradeX">
											<td>ana</td>
											<td>111.111.111-11</td>
										</tr>
										<tr class="gradeC">
											<td>Trident</td>
											<td>222.222.222-22</td>
										</tr>
									</tbody>
								</table>
							</div><br>
						</section>
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
								<h2 class="panel-title">Interno</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools">
									<thead>
										<tr>
											<th>Nome</th>
											<th>CPF</th>
											<th>Telefone(s)</th>
										</tr>
									</thead>
									<tbody>
										<tr class="gradeX">
											<td>Gigi</td>
											<td>333.333.333.33</td>
											<td>3333-3333</td>
										</tr>
										<tr class="gradeC">
											<td>Jorel</td>
											<td>444.444.444.44</td>
											<td>4444-4444</td>
										</tr>
									</tbody>
								</table>
							</div>
						</section>
						<!-- end: page -->

		<!-- Vendor -->
		<script src="../assets/vendor/jquery/jquery.js"></script>
		<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>										