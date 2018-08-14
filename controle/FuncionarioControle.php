<?php

require_once'../classes/Funcionario.php';
require_once'../classes/util.php';

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

		$vale_transporte=$_POST['vale_transporte'];

	    $data_admissao=$_POST['data_admissao'];

		$pis=$_POST['pis'];

	    $ctps=$_POST['ctps'];

	    $uf_ctps=$_POST['uf_ctps'];

	    $numero_titulo=$_POST['numero_titulo'];

	    $zona=$_POST['zona'];

	    $secao=$_POST['secao'];

	    $certificado_reservista_numero=$_POST['certificado_reservista_numero'];

		$certificado_reservista_serie=$_POST['certificado_reservista_serie'];

	    $calcado=$_POST['calcado'];

	    $calca=$_POST['calca'];

	    $jaleco=$_POST['jaleco'];

	    $camisa=$_POST['camisa'];

	    $usa_vtp=$_POST['usa_vtp'];

	    $cesta_basica=$_POST['cesta_basica'];

	    $situacao=$_POST['situacao'];

	    $util=new Util();

	    $funcionario=new Funcionario();

	    $funcionario->incluir($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $id_quadro_horario, $vale_transporte, $data_admissao, $pis, $ctps, $uf_ctps, $numero_titulo, $zona, $secao, $certificado_reservista_numero, $certificado_reservista_serie, $calcado, $calca, $jaleco, $camisa, $usa_vtp, $cesta_basica, $situacao);

	    header("Location:../index.html");
}

