<!doctype html>
<html class="fixed">
<head>
	<?php session_start(); 

	include_once '../dao/Conexao.php';
	include_once '../dao/AlmoxarifadoDAO.php';
	include_once '../dao/TipoEntradaDAO.php';
	include_once '../dao/ProdutoDAO.php';
	
	if (!isset($_SESSION['almoxarifado'])) {
		header('Location: ../controle/control.php?metodo=listarTodos&nomeClasse=AlmoxarifadoControle&nextPage=../html/cadastro_entrada.php');
	}
	if(!isset($_SESSION['tipo_entrada'])){
		header('Location: ../controle/control.php?metodo=listarTodos&nomeClasse=TipoEntradaControle&nextPage=../html/cadastro_entrada.php');	
	}
	if(!isset($_SESSION['autocomplete'])) {
		header('Location: ../controle/control.php?metodo=listarDescricao&nomeClasse=ProdutoControle&nextPage=../html/cadastro_entrada.php');
		//header('Location: search_cad_entrada.php');
	}
	if(isset($_SESSION['almoxarifado']) && isset($_SESSION['tipo_entrada']) &&  isset($_SESSION['autocomplete'])){
		$almoxarifado = $_SESSION['almoxarifado'];
		$tipo_entrada = $_SESSION['tipo_entrada'];
		$autocomplete = $_SESSION['autocomplete'];
		$at = array();
		session_destroy();
	}
?>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Cadastro de Doação</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
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

	<script src="../assets/vendor/jquery/jquery.min.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
  	    <script>

 // $(function() {
  //	<?php $autocomplete = $autocomplete; ?>				
  	//var gg = <?php echo $autocomplete; ?>;
  	//console.log(gg);
    //$( "#produto" ).autocomplete({
      //source: gg
    //});
  //});
  </script>
	<script type="text/javascript">
	$(function() {
	
			//adicionar tabela
			$(".add-row").click(function(){
				var produto = $("#produto").val();
				var qtd = $("#qtd").val();
				var markup = "<tr class='produtoRow'><td></td><td class='prod'>" + produto + "</td><td class='quant'>" + qtd + "</td><td></td><td><button type='button' class='delete-row'>remover</button></td></tr>";
				$("table tbody ").append(markup);
			});
			//remover tabela
			$("table tbody").on('click','.delete-row',function(){
				$(this).closest('tr').remove();
			});
			//array
			$("#array").click(function(){
				var produtoData=[];
				$(".produtoRow").each(function(i){
					var pData = {
						Prod: $(this).find("#prod").text(),
						Qtd: $(this).find("#quant").text()
					}
					produtoData.push(pData);
				});
				$("#resultado").html(JSON.stringify(produtoData));
			})
		});

	</script>
	<script>
		$(function(){

			var almoxarifado = <?php 
				echo $almoxarifado;
			?>;
			var tipo_entrada = <?php 
				echo $tipo_entrada; 
			?>;
			var autocomplete = <?php
				echo $autocomplete;
			?>;

			$.each(almoxarifado,function(i,item){

				$('#almoxarifado').append('<option value="' + item.id_almoxarifado + '">' + item.descricao_almoxarifado + '</option>');

			})

			$.each(tipo_entrada,function(i,item){

				$('#tipo_entrada').append('<option value="' + item.id_tipo + '">' + item.descricao + '</option>');

			})

			$.each(tipo_entrada,function(i,item){
				<?php $i =  document.write(i);  
				$at[$i] =  document.write(item.id_produto + "-" + item.descricao); 
				?>


			})

		});


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
								<a href="home.php">
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
						<ul class="nav nav-tabs tabs-primary">
							<li class="active">
								<a href="#overview" data-toggle="tab">Cadastro de Doação</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="overview" class="tab-pane active">
								<form class="form-horizontal" method="get" action="#">
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
													<div class="col-md-6">
														<select class="form-control " name="almoxarifado" id="almoxarifado">
															<option selected disabled>Selecionar</option>
														</select>
													</div>
													<a href="adicionar_almoxarifado.php"><i class="fas fa-plus w3-xlarge"></i></a>
												</div>

											<div class="form-group">
													<label class="col-md-3 control-label" >Tipo</label>
													<div class="col-md-6">
														<select class="form-control " name="tipo_entrada" id="tipo_entrada">
															<option selected disabled>Selecionar</option>
														</select>
													</div>
													<a href="adicionar_tipoEntrada.php"><i class="fas fa-plus w3-xlarge"></i></a>
												</div>
												
										</div>
										
										<div class="panel-body" >
											<table class="table table-bordered mb-none">
												<thead>
													<tr>
														<th>Produto
															<a href="cadastro_produto.php" class="fas fa-plus w3-xlarge" style="float:right;">
															</a>
														</th>
														<th>Qtd</th>
														<th>valor total</th>
														<th>incluir</th>
													</tr>
													<tr>
														<td>
															<input type="text" id="produto" size="20" class="form-control">
														</td>
														<td>
															<input type="number" id="qtd" size="20" class="form-control">
														</td>
														<td> 
														</td>
														<td >
															<button id="add-row" type="button" class="add-row">incluir</button>
														</td>
													</tr>
												</thead>
											</table><br>

											<div class="table-responsive">
												<table class="table table-bordered mb-none table">
													<thead>
														<tr>
															<th>Codigo</th>
															<th>Produto
																<a href="" class="fas fa-plus w3-xlarge" style="float: right;"></a>
															</th>
															<th>Quantidade
																<a href="" class="fas fa-plus w3-xlarge" style="float: right;"></a>
															</th>
															<th>valor</th>
															<th>ação</th>
														</tr>
													</thead>
													<tbody>
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
										<button id="array">Pegar valores da tabela</button>
										<div id="resultado"></div>
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
			</section>
		</div>

		<!-- end: page -->
	</section>


	<!-- Vendor -->
	
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