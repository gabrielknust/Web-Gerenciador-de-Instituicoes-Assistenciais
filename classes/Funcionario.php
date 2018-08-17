<?php
require_once 'acesso.php';
require_once 'Pessoa.php';
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

    public function __construct($vale_transporte,$data_admissao,$pis,$ctps,$uf_ctps,$numero_titulo,$zona,$secao,$certificado_reservista_numero,$certificado_reservista_serie,$calcado,$calca,$jaleco,$camisa,$usa_vtp,$cesta_basica,$situacao)
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

    public function getVale_transporte()
    {
        return $this->vale_transporte;
    }

    public function getData_admissao()
    {
        return $this->data_admissao;
    }

    public function getPis()
    {
        return $this->pis;
    }

    public function getCtps()
    {
        return $this->ctps;
    }

    public function getUf_ctps()
    {
        return $this->uf_ctps;
    }

    public function getNumero_titulo()
    {
        return $this->numero_titulo;
    }

    public function getZona()
    {
        return $this->zona;
    }

    public function getSecao()
    {
        return $this->secao;
    }

    public function getCertificado_reservista_numero()
    {
        return $this->certificado_reservista_numero;
    }

    public function getCertificado_reservista_serie()
    {
        return $this->certificado_reservista_serie;
    }

    public function getCalcado()
    {
        return $this->calcado;
    }

    public function getCalca()
    {
        return $this->calca;
    }

    public function getJaleco()
    {
        return $this->jaleco;
    }

    public function getCamisa()
    {
        return $this->camisa;
    }

    public function getUsa_vtp()
    {
        return $this->usa_vtp;
    }

    public function getCesta_basica()
    {
        return $this->cesta_basica;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function getQuadro_horario()
    {
        return $this->quadro_horario;
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

    public function setVale_transporte($vale_transporte)
    {
        $this->vale_transporte = $vale_transporte;
    }

    public function setData_admissao($data_admissao)
    {
        $this->data_admissao = $data_admissao;
    }

    public function setPis($pis)
    {
        $this->pis = $pis;
    }

    public function setCtps($ctps)
    {
        $this->ctps = $ctps;
    }

    public function setUf_ctps($uf_ctps)
    {
        $this->uf_ctps = $uf_ctps;
    }

    public function setNumero_titulo($numero_titulo)
    {
        $this->numero_titulo = $numero_titulo;
    }

    public function setZona($zona)
    {
        $this->zona = $zona;
    }

    public function setSecao($secao)
    {
        $this->secao = $secao;
    }

    public function setCertificado_reservista_numero($certificado_reservista_numero)
    {
        $this->certificado_reservista_numero = $certificado_reservista_numero;
    }

    public function setCertificado_reservista_serie($certificado_reservista_serie)
    {
        $this->certificado_reservista_serie = $certificado_reservista_serie;
    }

    public function setCalcado($calcado)
    {
        $this->calcado = $calcado;
    }

    public function setCalca($calca)
    {
        $this->calca = $calca;
    }

    public function setJaleco($jaleco)
    {
        $this->jaleco = $jaleco;
    }

    public function setCamisa($camisa)
    {
        $this->camisa = $camisa;
    }

    public function setUsa_vtp($usa_vtp)
    {
        $this->usa_vtp = $usa_vtp;
    }

    public function setCesta_basica($cesta_basica)
    {
        $this->cesta_basica = $cesta_basica;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function setQuadro_horario($quadro_horario)
    {
        $this->quadro_horario = $quadro_horario;
    }

    // Insert
    public function incluir($pessoa,$funcionario)
    {
        $id_pessoa = $this->incluirPessoa($pessoa);
        
        try {
            $sql = 'insert into funcionario (id_pessoa, id_quadro_horario, vale_transporte, data_admissao, pis, ctps, uf_ctps, numero_titulo, zona, secao, certificado_reservista_numero, certificado_reservista_serie, calcado, calca, jaleco, camisa, usa_vtp, cesta_basica, situacao) VALUES (:id_pessoa, :id_quadro_horario, :vale_transporte, :data_admissao, :pis, :ctps, :uf_ctps, :numero_titulo, :zona, :secao, :certificado_reservista_numero, :certificado_reservista_serie, :calcado, :calca, :jaleco, :camisa, :usa_vtp, :cesta_basica, :situacao);';
            
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_pessoa', $funcionario->getIdPessoa());
            $stmt->bindParam(':id_quadro_horario', $funcionario->getId_quadro_horario());
            $stmt->bindParam(':vale_transporte', $funcionario->getVale_transporte());
            $stmt->bindParam(':data_admissao', $funcionario->getData_admissao());
            $stmt->bindParam(':pis', $funcionario->getPis());
            $stmt->bindParam(':ctps', $funcionario->getCtps());
            $stmt->bindParam(':uf_ctps', $funcionario->getUf_ctps());
            $stmt->bindParam(':numero_titulo', $funcionario->getNumero_titulo());
            $stmt->bindParam(':zona', $funcionario->getZona());
            $stmt->bindParam(':secao', $funcionario->getSecao());
            $stmt->bindParam(':certificado_reservista_numero', $funcionario->getCertificado_reservista_numero());
            $stmt->bindParam(':certificado_reservista_serie', $funcionario->getCertificado_reservista_serie());
            $stmt->bindParam(':calcado', $funcionario->getCalcado());
            $stmt->bindParam(':calca', $funcionario->getCalca());
            $stmt->bindParam(':jaleco', $funcionario->getJaleco());
            $stmt->bindParam(':camisa', $funcionario->getCamisa());
            $stmt->bindParam(':usa_vtp', $funcionario->getUsa_vtp());
            $stmt->bindParam(':cesta_basica', $funcionario->getCesta_basica());
            $stmt->bindParam(':situacao', $funcionario->getSituacao());
            
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
                $cliente = new Funcionario($linha['nome'], $linha['cpf'], $linha['login'], $linha['endereco'], $linha['senha']);
                $cliente->setId($linha['id']);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $cliente;
    }
}

