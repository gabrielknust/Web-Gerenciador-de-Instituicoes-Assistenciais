<!doctype html>
<html class="fixed">
<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Cadastro de Destino</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
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

	<script type="text/javascript">
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
		function FormataCnpj(campo, teclapres){
			var tecla = teclapres.keyCode;
			var vr = new String(campo.value);
			vr = vr.replace(".", "");
			vr = vr.replace("/", "");
			vr = vr.replace("-", "");
			tam = vr.length + 1;
			if (tecla != 14)
			{
				if (tam == 3)
					campo.value = vr.substr(0, 2) + '.';
				if (tam == 6)
					campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
				if (tam == 10)
					campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
				if (tam == 15)
					campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
			}
		}
		function validarCNPJ(cnpj) {

			cnpj = cnpj.replace(/[^\d]+/g,'');

			if(cnpj == '') return false;
			if (cnpj.length != 14)
				return false;
			// Elimina CNPJs invalidos conhecidos
			if (cnpj == "00000000000000" || 
			cnpj == "11111111111111" || 
			cnpj == "22222222222222" || 
			cnpj == "33333333333333" || 
			cnpj == "44444444444444" || 
			cnpj == "55555555555555" || 
			cnpj == "66666666666666" || 
			cnpj == "77777777777777" || 
			cnpj == "88888888888888" || 
			cnpj == "99999999999999")
			return false;
			// Valida DVs
			tamanho = cnpj.length - 2
			numeros = cnpj.substring(0,tamanho);
			digitos = cnpj.substring(tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
				soma += numeros.charAt(tamanho - i) * pos--;
				if (pos < 2)
					pos = 9;
			}
			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0))
			return false;    
			tamanho = tamanho + 1;
			numeros = cnpj.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--){
				soma += numeros.charAt(tamanho - i) * pos--;
				if (pos < 2)
					pos = 9;
			}
			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1))
			return false;
			return true;
		}
		function exibirCNPJ(cnpj){
			if (!validarCNPJ(cnpj)){
				$('#cnpjInvalido').show();
				document.getElementById("enviar").disabled = true;
			}else{
				$('#cnpjInvalido').hide();
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
							<li><span>Doador</span></li>
						</ol>
				
						<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->
				<div class="row" >
					<div class="col-md-4 col-lg-2" style=" visibility: hidden;"></div>
					<div class="col-md-8 col-lg-8" >
						<div class="tabs"  >
							<ul class="nav nav-tabs tabs-primary">
								<li class="active">
									<a href="#overview" data-toggle="tab">Cadastro do Destinatário</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="overview" class="tab-pane active">
									<form class="form-horizontal" method="post" action="../controle/control.php">
										<input type="hidden" name="nomeClasse" value="DestinoControle">
										<input type="hidden" name="metodo" value="incluir">
										<fieldset>
											<h4 class="mb-xlg">Doador</h4>
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileFirstName">Nome</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="nome" id="nome" onkeypress="return Onlychars(event)" required>
												</div>
											</div>
											<div class="form-group" >
												<label class="col-md-3 control-label" for="profileCompany">Número do CNPJ</label>
												<div class="col-md-6">
													<input type="text" name="cnpj" id="cnpj" onkeyup="FormataCnpj(this,event)" onblur="exibirCNPJ(this.value)" maxlength="18" class="form-control input-md" ng-model="cadastro.cnpj" placeholder="Ex: 77.777.777/7777-77" >
												</div>														
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileCompany"></label>
												<div class="col-md-6">
													<p id="cnpjInvalido" style="display: none; color: #b30000">CNPJ INVÁLIDO!</p>
												</div>														
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="profileCompany">Número do CPF</label>
												<div class="col-md-6">
													<input type="text" class="form-control" id="NCPF" name="num_cpf" placeholder="Ex: 222.222.222-22" maxlength="14" onblur="validarCPF(this.value)" onkeypress="return Onlynumbers(event)" onkeyup="mascara('###.###.###-##',this,event)">
												</div>														
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="profileCompany"></label>
												<div class="col-md-6">
													<p id="cpfInvalido" style="display: none; color: #b30000">CPF INVÁLIDO!</p>
												</div>														
											</div>
	
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileCompany">Telefone</label>
												<div class="col-md-6">
													<input type="text" class="form-control" minlength="12" name="telefone" id="telefone" id="profileCompany" placeholder="Ex: (22)999999999" onkeypress="return Onlynumbers(event)" onkeyup="mascara('(##)############',this,event)" required>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-9 col-md-offset-3">
													<button id="enviar" class="btn btn-primary" type="submit">Enviar</button>
													<input type="reset" class="btn btn-default">
													<a href="cadastro_saida.php" >
														<button type="button" class="btn btn-info">Voltar</button>
													</a>
													<a href="listar_destino.php" style="color: white; text-decoration:none;"><button class="btn btn-success" type="button">Listar destinos</button></a>
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
										<img src="../assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="../assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="../assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="../assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
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
			</idv>
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