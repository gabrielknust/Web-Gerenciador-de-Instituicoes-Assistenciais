<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header ("Location: ../index.html");
	}

include_once '../dao/Conexao.php';
include_once '../dao/CategoriaDAO.php';
include_once '../dao/UnidadeDAO.php';
include_once '../dao/ProdutoDAO.php';
	
	if(!isset($_SESSION['unidade'])) {
		extract($_REQUEST);
		header('Location: ../controle/control.php?metodo=listarTodos&nomeClasse=UnidadeControle&nextPage=../html/alterar_produto.php?id_produto='.$id_produto);
	}
	if(!isset($_SESSION['categoria'])){
		extract($_REQUEST);
		header('Location: ../controle/control.php?metodo=listarTodos&nomeClasse=CategoriaControle&nextPage=../html/alterar_produto.php?id_produto='.$id_produto);	
	}
	if(!isset($_SESSION['produto'])) {
		extract($_REQUEST);
		header('Location: ../controle/control.php?metodo=listarId&nomeClasse=ProdutoControle&nextPage=../html/alterar_produto.php?id_produto='.$id_produto.'&id_produto='.$id_produto);
	}

	if(isset($_SESSION['categoria']) && isset($_SESSION['unidade']) && isset($_SESSION['produto'])){
		$produto = $_SESSION['produto'];
		$unidade = $_SESSION['unidade'];
		$categoria = $_SESSION['categoria'];

		unset($_SESSION['produto']);
		unset($_SESSION['categoria']);
		unset($_SESSION['unidade']);
	}
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Produtos</title>
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

				$("#produto").prop('disabled', true);
	            $("#id_categoria").prop('disabled', true);
	            $("#id_unidade").prop('disabled', true);
	            $("#codigo").prop('disabled', true);     
	            $("#valor").prop('disabled', true);

	            $("#botaoEditarIP").html('Editar');
	            $("#botaoSalvarIP").prop('disabled', true);

           		var produtos = <?php echo $produto; ?>;
           		var categoria = <?php echo $categoria; ?>;
           		var unidade = <?php echo $unidade; ?>;

           		$.each(produtos, function(i,item){

					$('#nome')
						.text('Nome do Produto: ' + item.descricao)
					$('#Categoria')
						.text('Categoria: ' + item.descricao_categoria)
					$('#Unidade')
						.text('Unidade: ' + item.descricao_unidade)
					$('#Codigo')
						.text('Codigo: ' + item.codigo)
					$('#Valor')
						.text('Valor: ' + item.preco)
					$('#produto')
						.val(item.descricao)
					$('#codigo')
						.val(item.codigo)
					$('#valor')
						.val(item.preco)
				})
				

			$.each(categoria, function(i,item){
				if(produto.id_categoria == item.id_categoria_produto){
					$('#id_categoria').append('<option value="' + item.id_categoria_produto + '" selected>' + item.descricao_categoria + '</option>');	
				}
				else{
				$('#id_categoria').append('<option value="' + item.id_categoria_produto + '">' + item.descricao_categoria + '</option>');
				}

			})

			$.each(unidade, function(i,item){
				if(produto.id_categoria == item.id_unidade){
					$('#id_unidade').append('<option value="' + item.id_unidade + '" selected>' + item.descricao_unidade + '</option>');	
				}
				else{
				$('#id_unidade').append('<option value="' + item.id_unidade + '">' + item.descricao_unidade + '</option>');
				}

			})
		});
			
			function editar_produto()
           {

            $("#produto").prop('disabled', false);
            $("#id_categoria").prop('disabled', false);
            $("#id_unidade").prop('disabled', false);
            $("#codigo").prop('disabled', false); 
            $("#valor").prop('disabled', false);

            $("#botaoEditarIP").html('Cancelar');
            $("#botaoSalvarIP").prop('disabled', false);
            $("#botaoEditarIP").removeAttr('onclick');
            $("#botaoEditarIP").attr('onclick', "return cancelar_produto()");

           }

            function cancelar_produto()
           {

            $("#produto").prop('disabled', true);
            $("#id_categoria").prop('disabled', true);
            $("#id_unidade").prop('disabled', true);
            $("#codigo").prop('disabled', true);     
            $("#valor").prop('disabled', true);

            $("#botaoEditarIP").html('Editar');
            $("#botaoSalvarIP").prop('disabled', true);
            $("#botaoEditarIP").removeAttr('onclick');
            $("#botaoEditarIP").attr('onclick', "return editar_produto()");

           }
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
								<img src="../img/semfoto.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../assets/images/!logged-user.jpg" />
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
						<div class="col-md-4 col-lg-3" style="width: 230px;">
							<section class="panel">
								<div class="panel-body" style="display:none;">
									<div class="thumb-info mb-md">
									</div>
								</div>
							</section>
						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Visão Geral</a>
									</li>

									<li>
										<a href="#edit" data-toggle="tab">Editar Dados</a>
									</li>
								</ul>
								
								<div class="tab-content" style="width: 660px;">
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

														<li id="nome">Nome do Produto:</li>
														<li id="Categoria">Categoria:</li>
														<li id="Unidade">Unidade:</li>
														<li id="Codigo">Codigo:</li>
														<li id="Valor">Valor:</li>
													</ul>
												</div>
											</section>
										</div>
									</div>
									
									<div id="edit" class="tab-pane">
										<form id="formulario" action="../controle/control.php">
											<fieldset>
												<div class="form-group"><br>
													<label class="col-md-3 control-label">Nome do produto</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="descricao" id="produto">
													</div>
												</div>
										
												<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Categoria</label>
													<a href="adicionar_categoria.php">
														<i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i>
													</a>
													<div class="col-md-6">
														<select name="id_categoria" id="id_categoria" class="form-control input-lg mb-md">
														</select>
													</div>	
												</div>
												
											<div class="form-group">
												<label class="col-md-3 control-label" >Unidade</label>
												<a href="adicionar_unidade.php"><i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i></a>
												<div class="col-md-6">
													<select name="id_unidade" id="id_unidade" class="form-control input-lg mb-md">
													</select>
												</div>	
											</div>
												
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileCompany">Código</label>
												<div class="col-md-8">
													<input type="text" name="codigo" class="form-control" minlength="11" id="codigo" id="profileCompany">

												</div>
											</div>
												
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileCompany">Valor</label>
												<div class="col-md-8">
													<input type="text" name="preco" class="form-control" id="valor" id="profileCompany" maxlength="13" placeholder="Ex: 22.00" onkeypress="return Onlynumbers(event)" >

													<input type="hidden" name="nomeClasse" value="ProdutoControle">
														
													<input type="hidden" name="metodo" value="alterarProduto">

												</div>
											</div>
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="button" class="btn btn-primary" id="botaoEditarIP" onclick="return editar_produto()">Editar</button>
                                    					<input type="submit" class="btn btn-primary" disabled="true"  value="Salvar" id="botaoSalvarIP">
														<input type="reset" class="btn btn-default">  
													</div>
												</div>
											</div>
										</fieldset>
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