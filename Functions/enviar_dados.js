function enviar_dados(){

	if( $("#nome").val() == "" ){
		alert("Preencha o campo: Nome");
		$("#nome").focus();

	}

	else if( $("#telefone").val() == ""){

		alert("Preenchao campo: telefone");
		$("#telefone").focus();
	}

	else if( $("#pai").val() == "" ){
		alert("Preencha o campo: Nome do Pai");
		$("#pai").focus();

	}

}