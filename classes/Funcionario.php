<?php
require_once ('acesso.php');
require_once ('Pessoa.php');
include_once 'Conexao.php';

class Funcionario extends Pessoa
{

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

    public function Construir($vale_transporte,$data_admissao,$pis,$ctps,$uf_ctps,$numero_titulo,$zona,$secao,$certificado_reservista_numero,$certificado_reservista_serie,$calcado,$calca,$jaleco,$camisa,$usa_vtp,$cesta_basica,$situacao,$quadro_horario)
    {
        $this->vale_transporte=$vale_transporte;
        $this->data_admissao=$data_admissao;
        $this->pis=$pis;
        $this->ctps=$ctps;
        $this->uf_ctps=$uf_ctps;
        $this->numero_titulo=$numero_titulo;
        $this->zona=$zona;
        $this->secao=$secao;
        $this->certificado_reservista_numero=$certificado_reservista_numero;
        $this->certificado_reservista_serie=$certificado_reservista_serie;
        $this->calcado=$calcado;
        $this->calca=$calca;
        $this->jaleco=$jaleco;
        $this->camisa=$camisa;
        $this->usa_vtp=$usa_vtp;
        $this->cesta_basica=$cesta_basica;
        $this->situacao=$situacao;
        $this->quadro_horario=$quadro_horario;
    }
    
    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    public function getId_pessoa()
    {
        return $this->id_pessoa;
    }

    public function getId_quadro_horario()
    {
        return $this->id_quadro_horario;
    }

    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;
    }

    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }

    public function setId_quadro_horario($id_quadro_horario)
    {
        $this->id_quadro_horario = $id_quadro_horario;
    }

    // Insert
    public function incluir($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $tipo_sanguineo, $id_quadro_horario, $vale_transporte, $data_admissao, $pis, $ctps, $uf_ctps, $numero_titulo, $zona, $secao, $certificado_reservista_numero, $certificado_reservista_serie, $calcado, $calca, $jaleco, $camisa, $usa_vtp, $cesta_basica, $situacao)
    {
        $id_pessoa = $this->incluirPessoa($cpf, $senha, $nome, $sexo, $telefone, $data_nascimento, $imagem, $cep, $cidade, $bairro, $logradouro, $numero_endereco, $complemento, $registro_geral, $orgao_emissor, $data_expedicao, $nome_mae, $nome_pai, $tipo_sanguineo);
        
        try {
            $sql = 'insert into funcionario (id_pessoa, id_quadro_horario, vale_transporte, data_admissao, pis, ctps, uf_ctps, numero_titulo, zona, secao, certificado_reservista_numero, certificado_reservista_serie, calcado, calca, jaleco, camisa, usa_vtp, cesta_basica, situacao) VALUES (:id_pessoa, :id_quadro_horario, :vale_transporte, :data_admissao, :pis, :ctps, :uf_ctps, :numero_titulo, :zona, :secao, :certificado_reservista_numero, :certificado_reservista_serie, :calcado, :calca, :jaleco, :camisa, :usa_vtp, :cesta_basica, :situacao);';
            
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_pessoa', $id_pessoa);
            $stmt->bindParam(':id_quadro_horario', $id_quadro_horario);
            $stmt->bindParam(':vale_transporte', $vale_transporte);
            $stmt->bindParam(':data_admissao', $data_admissao);
            $stmt->bindParam(':pis', $pis);
            $stmt->bindParam(':ctps', $ctps);
            $stmt->bindParam(':uf_ctps', $uf_ctps);
            $stmt->bindParam(':numero_titulo', $numero_titulo);
            $stmt->bindParam(':zona', $zona);
            $stmt->bindParam(':secao', $secao);
            $stmt->bindParam(':certificado_reservista_numero', $certificado_reservista_numero);
            $stmt->bindParam(':certificado_reservista_serie', $certificado_reservista_serie);
            $stmt->bindParam(':calcado', $calcado);
            $stmt->bindParam(':calca', $calca);
            $stmt->bindParam(':jaleco', $jaleco);
            $stmt->bindParam(':camisa', $camisa);
            $stmt->bindParam(':usa_vtp', $usa_vtp);
            $stmt->bindParam(':cesta_basica', $cesta_basica);
            $stmt->bindParam(':situacao', $situacao);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // excluir
    public function excluir($idfuncionario)
    {
        try {
            $sql = 'DELETE from funcionario WHERE idfuncionario = :idfuncionario';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela funcionario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Editar
    public function alterar($id_funcionario, $id_pessoa, $id_quadro_horario, $vale_transporte, $data_admissao, $pis, $ctps, $uf_ctps, $numero_titulo, $zona, $secao, $certificado_reservista_numero, $certificado_reservista_serie, $calcado, $calca, $jaleco, $camisa, $usa_vtp, $cesta_basica, $situacao)
    {
        try {
            $sql = 'update funcionario set id_funcionario=:id_funcionario, id_pessoa=:id_pessoa, id_quadro_horario=:id_quadro_horario, vale_transporte=:vale_transporte, data_admissao=:data_admissao, pis=:pis, ctps=:ctps, uf_ctps=:uf_ctps, numero_titulo=:numero_titulo, zona=:zona, secao=:secao, certificado_reservista_numero=:certificado_reservista_numero, certificado_reservista_serie=:certificado_reservista_serie, calcado=:calcado, calca=:calca, jaleco=:jaleco, camisa=:camisa, usa_vtp=:usa_vtp, cesta_basica=:cesta_basica, situacao=:situacao WHERE id_funcionario=:id_funcionario';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_funcionario', $id_funcionario);
            $stmt->bindParam(':id_pessoa', $id_pessoa);
            $stmt->bindParam(':id_quadro_horario', $id_quadro_horario);
            $stmt->bindParam(':vale_transporte', $vale_transporte);
            $stmt->bindParam(':data_admissao', $data_admissao);
            $stmt->bindParam(':pis', $pis);
            $stmt->bindParam(':ctps', $ctps);
            $stmt->bindParam(':uf_ctps', $uf_ctps);
            $stmt->bindParam(':numero_titulo', $numero_titulo);
            $stmt->bindParam(':zona', $zona);
            $stmt->bindParam(':secao', $secao);
            $stmt->bindParam(':certificado_reservista_numero', $certificado_reservista_numero);
            $stmt->bindParam(':certificado_reservista_serie', $certificado_reservista_serie);
            $stmt->bindParam(':calcado', $calcado);
            $stmt->bindParam(':calca', $calca);
            $stmt->bindParam(':jaleco', $jaleco);
            $stmt->bindParam(':camisa', $camisa);
            $stmt->bindParam(':usa_vtp', $usa_vtp);
            $stmt->bindParam(':cesta_basica', $cesta_basica);
            $stmt->bindParam(':situacao', $situacao);
            $stmt->bindParam(':calca', $calca);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Consultar
    public function listar($nome)
    {
        $nome = "%" . $nome . "%";
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT * FROM funcionario where id_funcionario like :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            $funcionarios = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $funcionario = new Funcionario;
                $funcionario->Construir($linha['id_funcionario'],$linha['id_pessoa'],$linha['id_quadro_horario'],$linha['vale_transporte'],$linha['data_admissao'],$linha['pis'],$linha['ctps'],$linha['uf_ctps'],$linha['numero_titulo'],$linha['zona'],$linha['secao'],$linha['certificado_reservista_numero'],$linha['certificado_reservista_serie'],$linha['calcado'],$linha['calca'],$linha['jaleco'],$linha['camisa'],$linha['usa_vtp'],$linha['cesta_basica'],$linha['situacao']);
                $funcionario->setId_funcionario($linha['id_funcionario']);
                $funcionario->setId_pessoa($linha['id_pessoa']);
                $funcionario->setId_quadro_horario($linha['id_quadro_horario']);
                $funcionarios[] = $funcionario;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $funcionarios;
    }
    //Consultar um utilizando o cpf
    public function listarUm($cpf)
    {
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id,nome, cpf, login, endereco, senha FROM cliente where id = :id";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':id' => $id
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente($linha['nome'], $linha['cpf'], $linha['login'], $linha['endereco'], $linha['senha']);
                $cliente->setId($linha['id']);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $cliente;
    }
}

