		$(function(){
				var rg = 0;
				var cpf = 0;
				var certidao = 0;
				var inss = 0;
				var loas = 0;
				var funrural = 0;
				var titulo = 0;
				var ctps = 0;
				var saf = 0;
				var sus = 0;
				var bpc = 0;
				var curatela = 0;

				var verifica_sexo = 0;

				

				$("#label-rg").hide();
				$("#imgRg").hide();

				$("#label-cpf").hide();
				$("#imgCpf").hide();
				
				$("#label-certidao").hide();
				$("#imgCertidaoNascimento").hide();

				$("#label-inss").hide();
				$("#imgInss").hide();

				$("#label-loas").hide();
				$("#imgLoas").hide();

				$("#label-funrural").hide();
				$("#imgFunrural").hide();

				$("#label-titulo").hide();
				$("#imgTituloEleitor").hide();

				$("#label-ctps").hide();
				$("#imgCtps").hide();

				$("#label-saf").hide();
				$("#imgSaf").hide();

				$("#label-sus").hide();
				$("#imgSus").hide();

				$("#label-bpc").hide();
				$("#imgBpc").hide();

				$("#label-curatela").hide();
				$("#imgCuratela").hide();
				/*if(rg == 1 || cpf == 1 || certidao == 1 || inss == 1 || loas == 1 || funrural == 1 || titulo == 1 || ctps == 1 || saf == 1 || sus == 1 || bpc == 1 || curatela == 1){
					$("#label-imagens").show();
				}
				else if(rg == 0 && cpf == 0 && certidao == 0 && inss == 0 && loas == 0 && funrural == 0 && titulo == 0 && ctps == 0 && saf == 0 && sus == 0 && bpc == 0 && curatela == 0){
					$("#label-imagens").show();
				}	*/					
				$("#radio1").click(function(){
					verifica_sexo = 1;
				});
				$("#radio2").click(function(){
					verifica_sexo = 1;
				});

				$("#rg-checkbox").click(function(){

					if($("#rg-checkbox").is(':checked') == true){
						$("#label-rg").show();
						$("#imgRg").show();

						rg = 1;


					}
					else{
						$("#label-rg").hide();
						$("#imgRg").hide();

						rg = 0;	
					}	
				});

				$("#cpf-checkbox").click(function(){
					if($("#cpf-checkbox").is(':checked') == true){
						$("#label-cpf").show();
						$("#imgCpf").show();

						cpf = 1;	
					}
					else{
						$("#label-cpf").hide();
						$("#imgCpf").hide();

						cpf = 0;	
					}
				});
				
				$("#inss-checkbox").click(function(){
					if($("#inss-checkbox").is(':checked') == true){
						$("#imgInss").show();
						$("#label-inss").show();

						inss = 1;	
					}
					else{
						$("#imgInss").hide();
						$("#label-inss").hide();

						inss = 0;
					}
				});

				$("#loas-checkbox").click(function(){
					if($("#loas-checkbox").is(':checked') == true){
						$("#imgLoas").show();
						$("#label-loas").show();

						loas = 1;	
					}
					else{
						$("#imgLoas").hide();
						$("#label-loas").hide();

						loas = 0;
					}
				});

				$("#funrural-checkbox").click(function(){
					if($("#funrural-checkbox").is(':checked') == true){
						$("#imgFunrural").show();
						$("#label-funrural").show();

						funrural = 1;	
					}
					else{
						$("#imgFunrural").hide();
						$("#label-funrural").hide();

						funrural = 0;	
					}
				});

				$("#tituloEleitor-checkbox").click(function(){
					if($("#tituloEleitor-checkbox").is(':checked') == true){
						$("#imgTituloEleitor").show();
						$("#label-titulo").show();

						titulo = 1;	
					}
					else{
						$("#imgTituloEleitor").hide();
						$("#label-titulo").hide();

						titulo = 0;
					}
				});

				$("#ctps-checkbox").click(function(){
					if($("#ctps-checkbox").is(':checked') == true){
						$("#imgCtps").show();
						$("#label-ctps").show();

						ctps = 1;	
					}
					else{
						$("#imgCtps").hide();
						$("#label-ctps").hide();

						ctps = 0;	
					}
				});

				$("#saf-checkbox").click(function(){
					if($("#saf-checkbox").is(':checked') == true){
						$("#imgSaf").show();
						$("#label-saf").show();	

						saf = 1;
					}
					else{
						$("#imgSaf").hide();
						$("#label-saf").hide();	

						saf = 0;
					}
				});

				$("#sus-checkbox").click(function(){
					if($("#sus-checkbox").is(':checked') == true){
						$("#imgSus").show();
						$("#label-sus").show();	

						sus = 1;
					}
					else{
						$("#imgSus").hide();
						$("#label-sus").hide();

						sus = 0;
					}
				});

				$("#bpc-checkbox").click(function(){
					if($("#bpc-checkbox").is(':checked') == true){
						$("#imgBpc").show();
						$("#label-bpc").show();	

						bpc = 1;
					}
					else{
						$("#imgBpc").hide();
						$("#label-bpc").hide();	

						bpc = 0;
					}
				});

				$("#certidao-checkbox").click(function(){
					if($("#certidao-checkbox").is(':checked') == true){
						$("#label-certidao").show();
						$("#imgCertidaoNascimento").show();

						certidao = 1;
					}
					else{
						$("#label-certidao").hide();
						$("#imgCertidaoNascimento").hide();	
						
						certidao = 0;
					}
				});


				$("#curatela-checkbox").click(function(){
					if($("#curatela-checkbox").is(':checked') == true){
						$("#label-curatela").show();
						$("#imgCuratela").show();

						curatela = 1;
					}
					else{
						$("#label-curatela").hide();
						$("#imgCuratela").hide();

						curatela = 0;
					}
				});


				$("#enviar").click(function(){
					if($("#nome").val() == ""){
						alert("Por favor, insira o nome");
						$("#nome").focus();
					}

					else if($("#pai").val() == ""){
						alert("Por favor, insira o nome do pai");
						$("#pai").focus();
					}

					else if($("#mae").val() == ""){
						alert("Por favor, insira o nome da mãe");
						$("#mae").focus();
					}

					else if($("#sangue").val() == null){
						alert("Selecione o tipo sanguíneo");
						$("#sangue").focus();
					}

					else if($("#nascimento").val() == ""){
						alert("Por favor, insira uma data de nascimento");
						$("#nascimento").focus();
					}

					else if($("#rg").val() == ""){
						alert("Por favor, insira um RG");
						$("#rg").focus();
					}

					else if($("#orgao").val() == ""){
						alert("Por favor, insira o Orgão Emissor");
						$("#orgao").focus();
					}

					else if($("#dataExpedicao").val() == ""){
						alert("Por favor, insira uma data de expedição");
						$("#dataExpedicao").focus();
					}

					else if($("#cpf").val() == ""){
						alert("Por favor, insira um CPF");
						$("#cpf").focus();
					}
					else if(verifica_sexo == 0){
						alert("Por favor, defina um sexo");
						$("#radio1").focus();
					}

					/*else if(rg == 1 && $("#imgRg").value == null){
						alert("Nenhum arquivo selecionado para uma Imagem de RG, favor selecionar um arquivo ou desmarcar a opção 'RG' de benefícios");
					}

					else if(cpf == 1 && $("#imgCpf").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de CPF, favor selecionar um arquivo ou desmarcar a opção 'CPF' de benefícios");
					}

					else if(inss == 1 && $("#imgInss").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de INSS, favor selecionar um arquivo ou desmarcar a opção 'INSS' de benefícios");
					}

					else if(loas == 1 && $("#imgLoas").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de LOAS, favor selecionar um arquivo ou desmarcar a opção 'LOAS' de benefícios");
					}

					else if(funrural == 1 && $("#imgFunrural").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de Funrural, favor selecionar um arquivo ou desmarcar a opção 'Funrural' de benefícios");
					}

					else if(titulo == 1 && $("#imgTituloEleitor").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de Título de Eleitor, favor selecionar um arquivo ou desmarcar a opção 'Título de Eleitor' de benefícios");
					}

					else if(ctps == 1 && $("#imgCtps").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de CTPS, favor selecionar um arquivo ou desmarcar a opção 'CTPS' de benefícios");
					}

					else if(saf == 1 && $("#imgSaf").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de SAF, favor selecionar um arquivo ou desmarcar a opção 'SAF' de benefícios");
					}

					else if(sus == 1 && $("#imgSus").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de SUS, favor selecionar um arquivo ou desmarcar a opção 'SUS' de benefícios");
					}

					else if(bpc == 1 && $("#imgBpc").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de BPC, favor selecionar um arquivo ou desmarcar a opção 'BPC' de benefícios");
					}

					else if(certidao == 1 && $("#imgCertidaoNascimento").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de Certidão de Nascimento, favor selecionar um arquivo ou desmarcar a opção 'Certidão de Nascimento' de benefícios");
					}

					else if(curatela == 1 && $("#imgCuratela").value == null){
						alert("Nenhum arquivo selecionado para uma imagem de Curatela, favor selecionar um arquivo ou desmarcar a opção 'Curatela' de benefícios");
					}*/
					else{
						$("#formulario").submit();
					}

				});
});
