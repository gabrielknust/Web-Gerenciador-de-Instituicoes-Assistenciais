function enviar_dados(){

	if($("#sangue").val() == null){

		alert("Selecione o tipo sanguíneo");
	}
	else if($("#senha").val() !=  $("#c_senha").val()){
    	alert("Senhas estão diferentes");
    	$("#senha").focus();
    }
}