function enviar_dados(){

	if($("#sangue").val() == null){

		alert("Selecione o tipo sanguíneo");
		$("#sangue").focus();
	}
}