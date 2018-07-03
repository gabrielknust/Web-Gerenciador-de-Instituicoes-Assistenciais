<?php
require_once ('acesso.php');
require_once ('Pessoa.php');

class Funcionario extends Pessoa
{
    
    protected $id_funcionario;
    
    protected $id_pessoa;
    
    protected $id_quadro_horario;
    
    protected $vale_transporte;
    
    protected $data_admissao;
    
    protected $pis;
    
    protected $ctps;
    
    protected $uf_ctps;
    
    protected $numero_titulo;
    
    protected $zona;
    
    protected $secao;
    
    protected $certificado_reservista_numero;
    
    protected $certificado_reservista_serie;
    
    protected $calcado;
    
    protected $calca;
    
    protected $jaleco;
    
    protected $camisa;
    
    protected $usa_vtp;
    
    protected $cesta_basica;
    
    protected $situacao;
    
    public function __construct()
    {}
    
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
    
    // Insert
    public function incluir($id_quadro_horario, $vale_transporte, $data_admissao, $pis, $ctps, $uf_ctps, $numero_titulo, $zona, $secao, $certificado_reservista_numero, $certificado_reservista_serie, $calcado, $calca, $jaleco, $camisa, $usa_vtp, $cesta_basica, $situacao)
    {
        try {
            $sql = 'call funcionario (:id_quadro_horario, :cpf, :senha, :nome, :sexo, :telefone, :data_nascimento, :imagem, :cep, :cidade, :bairro, :rua, :numero_endereco, :complemento, :registro_geral, :orgao_emissor, :data_expedicao, :nome_mae, :nome_pai, :vale_transporte, :data_admissao, :pis, :ctps, :uf_ctps, :numero_titulo, :zona, :secao, :certificado_reservista_numero, :certificado_reservista_serie, :calcado, :calca, :jaleco, :camisa, :usa_vtp, :cesta_basica, :situacao);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_quadro_horario', $id_quadro_horario);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero_endereco', $numero_endereco);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
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
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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
    public function consultar($sql)
    {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
}

