	<?php
		session_start();
	?>
<!doctype html>
<html class="fixed">
<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Estoque</title>
		
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
   		/* filtro almoxarifado*/
		(function(document) {
			'use strict';
			var LightTableFilter = (function(Arr) {
				var _select;

				function _onSelectEvent(e) {
					_select = e.target;
					var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
					Arr.forEach.call(tables, function(table) {
						Arr.forEach.call(table.tBodies, function(tbody) {
							Arr.forEach.call(tbody.rows, _filterSelect);
						});
					});
				}
	    
				function _filterSelect(row) {
					var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
					row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';
				}

				return {
					init: function() {
						var selects = document.getElementsByClassName('select-table-filter');
						Arr.forEach.call(selects, function(select) {
		        			select.onchange  = _onSelectEvent;
						});
					}
				};
			})(Array.prototype);

			document.addEventListener('readystatechange', function() {
				if (document.readyState === 'complete') {
					LightTableFilter.init();
				}
			});
		})(document);
	</script>
	<style type="text/css">
		.table{
			z-index: 0;
		}
		.text-right{
			z-index: 1;
		}
		.select{
			z-index: 2;
			float: left;
			position: absolute;
			width: 235px;
		}
		.select-table-filter{
			width: 140px;
			float: left;
		}

	</style>
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
												 Informações Funcionarios
											</a>
										</li>
									</ul>
									<ul class="nav nav-children">
										<li>
											<a href="informacao_interno.php">
												 Informações Interno
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</aside>
			<!-- end: sidebar -->
			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Estoque</h2>
					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="home.html">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Estoque</span></li>
						</ol>
						<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>
				<!-- start: page -->
				<section class="panel" >
					<header class="panel-heading">
						<h2 class="panel-title">Estoque</h2>
					</header>
					<div class="panel-body" >
						<div class="select" >
							<select class="select-table-filter form-control mb-md" data-table="order-table">
								<option value="">mostrar tudo</option>  
								<option value="cozinha">cozinha</option>  
								<option value="farmacia">farmacia</option>  
		  					</select>
		  					<h5 style="float: right;">Almoxarifado</h5>
	  					</div>
		  				
  						<table class="table order-table" id="datatable-tabletools"  >
							<thead>
								<tr>
									<th>codigo</th>
									<th>produto</th>
									<th>quantidade</th>
									<th>almoxarifado</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>01</th>
									<th>arroz</th>
									<th>2</th>
									<th>cozinha</th>
								</tr>
								<tr>
									<th>02</th>
									<th>peixe</th>
									<th>2</th>
									<th>cozinha</th>
								</tr>
								<tr>
									<th>03</th>
									<th>remedio</th>
									<th>5</th>
									<th>farmacia</th>
								</tr>
							</tbody>
						</table>
					</div>
				</section>
			</section>
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

	<!-- Examples no remove-->
	<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
	<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
	<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
</body>
</html>
