<?php

require_once '../classes/Interno.php';

public function formatoDataYMD($data)
    {
        $data_arr = explode("/", $data);
        
        $datac = $data_arr[2] . '-' . $data_arr[1] . '-' . $data_arr[0];
        
        return $datac;
    }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$cpf = $_POST['cpf'];

	$senha = '';

	$nome = $_POST['nome'];

	$sexo = $_POST['sexo'];

	$telefone = $_POST['telefone'];

	$data_nascimento = $_POST['dataNascimento'];

	$data_nascimento = formatoDataYMD($data_nascimento);

	$imagem = 'imagem';

	$cep = '';

	$cidade = '';

	$bairro = '';

	$logradouro = '';

	$numero_endereco = '';

	$complemento = '';

	$registro_geral = $_POST['registroGeral'];

	$orgao_emissor = $_POST['orgaoEmissor'];

	$data_expedicao = $_POST['dataExpedicao'];

	$data_expedicao = formatoDataYMD($data_expedicao);

	$nome_mae = $_POST['nomeMae'];

	$nome_pai = $_POST['nomePai'];

	$nome_contato_urgente = $_POST['nomeContatoUrgente'];

	$telefone_contato_urgente_1 = $_POST['telefoneContatoUrgente1'];

	$telefone_contato_urgente_2 = $_POST['telefoneContatoUrgente2'];

	$telefone_contato_urgente_3 = $_POST['telefoneContatoUrgente3'];


	$interno = new Interno();

	$interno->incluir($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $nome_contato_urgente, $telefone_contato_urgente_1, $telefone_contato_urgente_2, $telefone_contato_urgente_3);

//	header("Location: ../index.html");

}

