<?php

require_once '../classes/Interno.php';
require_once '../classes/util.php';

if (isset($_SESSION['usuario'])) {
	header("Location: home.php");
}
else{

	$cpf = $_POST['cpf'];

	$senha = '';

	$nome = $_POST['nome'];

	$sexo = $_POST['sexo'];

	$telefone = $_POST['telefone'];

	$data_nascimento = $_POST['dataNascimento'];

	$imagem = $_POST['imagem'];

	$cep = $_POST['cep'];

	$cidade = $_POST['cidade'];

	$bairro = $_POST['bairro'];

	$logradouro = $_POST['logradouro'];

	$numero_endereco = $_POST['numeroEndereco'];

	$complemento = $_POST['complemento'];

	$registro_geral = $_POST['registroGeral'];

	$orgao_emissor = $_POST['orgaoEmissor'];

	$data_expedicao = $_POST['dataExpedicao'];

	$nome_mae = $_POST['nomeMae'];

	$nome_pai = $_POST['nomePai'];

	$nome_contato_urgente = $_POST['nomeContatoUrgente'];

	$telefone_contato_urgente_1 = $_POST['telefoneContatoUrgente1'];

	$telefone_contato_urgente_2 = $_POST['telefoneContatoUrgente2'];

	$telefone_contato_urgente_3 = $_POST['telefoneContatoUrgente3'];

	$util = new util();
	$interno = new Interno();

	$interno->incluir($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $id_situacao_interno, $nome_contato_urgente, $telefone_contato_urgente_1, $telefone_contato_urgente_2, $telefone_contato_urgente_3);

	header("Location: ../index.html");

}

