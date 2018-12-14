<?php
   session_start();
   if(!isset($_SESSION['usuario'])){
      header ("Location: ../index.html");
   }
?>
<!doctype html>
<html class="fixed">
   <head>
      <?php
         	include_once '../dao/Conexao.php';
          	include_once '../dao/TipoSaidaDAO.php';
          
          	if(!isset($_SESSION['tipo_saida'])){
            	header('Location: ../controle/control.php?metodo=listarTodos&nomeClasse=TipoSaidaControle&nextPage=../html/listar_tipoSaida.php');
          	}
          	if(isset($_SESSION['tipo_saida'])){
            	$tipo = $_SESSION['tipo_saida'];
            	unset($_SESSION['tipo_saida']);
            }
      ?>
      <!-- Basic -->
      <meta charset="UTF-8">
      <title>Informaçoes</title>
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <!-- Vendor CSS -->
      <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
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
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
         function excluir(id){
         	window.location.replace('../controle/Control.php?metodo=excluir&nomeClasse=TipoSaidaControle&id_tipo='+id);
         }
      </script>
      <script>
         $(function(){
         	var tipo = <?php 
            echo $tipo; 
            ?>;
         
         	$.each(tipo, function(i,item){
         
         		$('#tabela')
         			.append($('<tr />')
         				.append($('<td />')
         					.text(item.descricao))
         				.append($('<td />')
         					.attr('onclick','excluir("'+item.id_tipo+'")')
         					.html('<i class="fas fa-trash-alt"></i>')));
         	});
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
                        <a role="menuitem" tabindex="-1" href="../html/profile.php"><i class="fa fa-user"></i> My Profile</a>
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
                  <a href="home.php">
                  <i class="fa fa-home"></i>
                  </a>
               </li>
               <li><span>Informações Funcionario</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
         </div>
      </header>
      <!-- start: page -->
      <section class="panel">
         <header class="panel-heading">
            <div class="panel-actions">
               <a href="#" class="fa fa-caret-down"></a>
            </div>
            <h2 class="panel-title">tipo</h2>
         </header>
         <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
               <thead>
                  <tr>
                     <th>Nome</th>
                     <th>acao</th>
                  </tr>
               </thead>
               <tbody id="tabela">	
               </tbody>
            </table>
         </div>
         <br>
      </section>
      <!-- end: page -->
      <!-- Vendor -->
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