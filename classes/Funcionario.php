<?php
require_once ('acesso.php');
require_once ('Pessoa.php');
class Funcionario extends Pessoa {
	private $id_funcionario;
	private $id_pessoa;
	private $id_quadro_horario;
	private $vale_transporte;
	private $data_admissao;
	private $pis;
	private $ctps;
	private $uf_ctps;
	private $numero_titulo;
	private $zona;
	private $secao;
	private $certificado_reservista_numero;
	private $certificado_reservista_serie;
	private $calcado;
	private $calca;
	private $jaleco;
	private $camisa;
	private $usa_vtp;
	private $cesta_basica;
	private $situacao;
	private $quadro_horario;
	public function __construct() {
	}
	
	// Insert
	public function incluir($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $id_quadro_horario, $vale_transporte, $data_admissao, $pis, $ctps, $uf_ctps, $numero_titulo, $zona, $secao, $certificado_reservista_numero, $certificado_reservista_serie, $calcado, $calca, $jaleco, $camisa, $usa_vtp, $cesta_basica, $situacao) {
		$id_pessoa = $this->incluirPessoa ( $cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai );
		
		try {
			$sql = 'insert into funcionario (id_pessoa, id_quadro_horario, vale_transporte, data_admissao, pis, ctps, uf_ctps, numero_titulo, zona, secao, certificado_reservista_numero, certificado_reservista_serie, calcado, calca, jaleco, camisa, usa_vtp, cesta_basica, situacao) VALUES (:id_pessoa, :id_quadro_horario, :vale_transporte, :data_admissao, :pis, :ctps, :uf_ctps, :numero_titulo, :zona, :secao, :certificado_reservista_numero, :certificado_reservista_serie, :calcado, :calca, :jaleco, :camisa, :usa_vtp, :cesta_basica, :situacao);';
			
			$sql = str_replace ( "'", "\'", $sql );
			$acesso = new Acesso ();
			
			$pdo = $acesso->conexao ();
			$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$stmt = $pdo->prepare ( $sql );
			
			$stmt->bindParam ( ':id_pessoa', $id_pessoa );
			$stmt->bindParam ( ':id_quadro_horario', $id_quadro_horario );
			$stmt->bindParam ( ':vale_transporte', $vale_transporte );
			$stmt->bindParam ( ':data_admissao', $data_admissao );
			$stmt->bindParam ( ':pis', $pis );
			$stmt->bindParam ( ':ctps', $ctps );
			$stmt->bindParam ( ':uf_ctps', $uf_ctps );
			$stmt->bindParam ( ':numero_titulo', $numero_titulo );
			$stmt->bindParam ( ':zona', $zona );
			$stmt->bindParam ( ':secao', $secao );
			$stmt->bindParam ( ':certificado_reservista_numero', $certificado_reservista_numero );
			$stmt->bindParam ( ':certificado_reservista_serie', $certificado_reservista_serie );
			$stmt->bindParam ( ':calcado', $calcado );
			$stmt->bindParam ( ':calca', $calca );
			$stmt->bindParam ( ':jaleco', $jaleco );
			$stmt->bindParam ( ':camisa', $camisa );
			$stmt->bindParam ( ':usa_vtp', $usa_vtp );
			$stmt->bindParam ( ':cesta_basica', $cesta_basica );
			$stmt->bindParam ( ':situacao', $situacao );
			
			$stmt->execute ();
		} catch ( PDOException $e ) {
			echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage ();
		}
	}
	
	// excluir
	public function excluir($idfuncionario) {
		try {
			$sql = 'DELETE from funcionario WHERE idfuncionario = :idfuncionario';
			$sql = str_replace ( "'", "\'", $sql );
			$acesso = new Acesso ();
			
			$pdo = $acesso->conexao ();
			$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$stmt = $pdo->prepare ( $sql );
			
			$stmt->bindParam ( ':idfuncionario', $idfuncionario );
			
			$stmt->execute ();
		} catch ( PDOException $e ) {
			echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage ();
		}
	}
	
	// Editar
	public function alterar($id_funcionario, $id_pessoa, $id_quadro_horario, $vale_transporte, $data_admissao, $pis, $ctps, $uf_ctps, $numero_titulo, $zona, $secao, $certificado_reservista_numero, $certificado_reservista_serie, $calcado, $calca, $jaleco, $camisa, $usa_vtp, $cesta_basica, $situacao) {
		try {
			$sql = 'update funcionario set id_funcionario=:id_funcionario, id_pessoa=:id_pessoa, id_quadro_horario=:id_quadro_horario, vale_transporte=:vale_transporte, data_admissao=:data_admissao, pis=:pis, ctps=:ctps, uf_ctps=:uf_ctps, numero_titulo=:numero_titulo, zona=:zona, secao=:secao, certificado_reservista_numero=:certificado_reservista_numero, certificado_reservista_serie=:certificado_reservista_serie, calcado=:calcado, calca=:calca, jaleco=:jaleco, camisa=:camisa, usa_vtp=:usa_vtp, cesta_basica=:cesta_basica, situacao=:situacao WHERE id_funcionario=:id_funcionario';
			$sql = str_replace ( "'", "\'", $sql );
			$acesso = new Acesso ();
			
			$pdo = $acesso->conexao ();
			$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$stmt = $pdo->prepare ( $sql );
			
			$stmt->bindParam ( ':id_funcionario', $id_funcionario );
			$stmt->bindParam ( ':id_pessoa', $id_pessoa );
			$stmt->bindParam ( ':id_quadro_horario', $id_quadro_horario );
			$stmt->bindParam ( ':vale_transporte', $vale_transporte );
			$stmt->bindParam ( ':data_admissao', $data_admissao );
			$stmt->bindParam ( ':pis', $pis );
			$stmt->bindParam ( ':ctps', $ctps );
			$stmt->bindParam ( ':uf_ctps', $uf_ctps );
			$stmt->bindParam ( ':numero_titulo', $numero_titulo );
			$stmt->bindParam ( ':zona', $zona );
			$stmt->bindParam ( ':secao', $secao );
			$stmt->bindParam ( ':certificado_reservista_numero', $certificado_reservista_numero );
			$stmt->bindParam ( ':certificado_reservista_serie', $certificado_reservista_serie );
			$stmt->bindParam ( ':calcado', $calcado );
			$stmt->bindParam ( ':calca', $calca );
			$stmt->bindParam ( ':jaleco', $jaleco );
			$stmt->bindParam ( ':camisa', $camisa );
			$stmt->bindParam ( ':usa_vtp', $usa_vtp );
			$stmt->bindParam ( ':cesta_basica', $cesta_basica );
			$stmt->bindParam ( ':situacao', $situacao );
			$stmt->bindParam ( ':calca', $calca );
			$stmt->execute ();
		} catch ( PDOException $e ) {
			echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage ();
		}
	}
	
	// Consultar
	public function consultar($sql) {
		$acesso = new Acesso ();
		$acesso->conexao ();
		$acesso->query ( $sql );
		$this->Linha = $acesso->linha;
		$this->Result = $acesso->result;
	}
}

