<?php

require_once('acesso.php');

class Funcionario extends Pessoa
{
    private $idfuncionario;
    private $idpessoa;
    private $idcargo;
    private $imagem;
    private $vale_transporte;
    private $data_admissao;
    private $registro_geral;
    private $orgao_emissor;
    private $data_expedicao;
    private $pis;
    private $ctps;
    private $uf_ctps;
    private $zona;
    private $certificado_reservista_numero;
    private $nome_mae;
    private $nome_pai;
    public function __construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo,$idfuncionario,$idpessoa,$idcargo,$imagem,$vale_transporte,$data_admissao,$registro_geral,$orgao_emissor,$data_expedicao,$pis,$ctps,$uf_ctps,$zona,$certificado_reservista_numero,$nome_mae,$nome_pai)
    {
        parent::__construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->idfuncionario=$idfuncionario;
        $this->idpessoa=$idpessoa;
        $this->idcargo=$idcargo;
        $this->vale_transporte=$vale_transporte;
        $this->registro_geral=$registro_geral;
        $this->orgao_emissor=$orgao_emissor;
        $this->data_expedicao=$data_expedicao;
        $this->pis=$pis;
        $this->ctps=$ctps;
        $this->uf_ctps=$uf_ctps;
        $this->zona=$zona;
        $this->certificado_reservista_numero=$certificado_reservista_numero;
        $this->nome_mae=$nome_mae;
        $this->nome_pai=$nome_pai;
    }
    public function getIdfuncionario()
    {
        return $this->idfuncionario;
    }
    
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }
    
    public function getIdcargo()
    {
        return $this->idcargo;
    }
    
    public function getImagem()
    {
        return $this->imagem;
    }
    
    public function getVale_transporte()
    {
        return $this->vale_transporte;
    }
    
    public function getData_admissao()
    {
        return $this->data_admissao;
    }
    
    public function getRegistro_geral()
    {
        return $this->registro_geral;
    }
    
    public function getOrgao_emissor()
    {
        return $this->orgao_emissor;
    }
    
    public function getData_expedicao()
    {
        return $this->data_expedicao;
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
    
    public function getZona()
    {
        return $this->zona;
    }
    
    public function getCertificado_reservista_numero()
    {
        return $this->certificado_reservista_numero;
    }
    
    public function getNome_mae()
    {
        return $this->nome_mae;
    }
    
    public function getNome_pai()
    {
        return $this->nome_pai;
    }
    
    public function setIdfuncionario($idfuncionario)
    {
        $this->idfuncionario = $idfuncionario;
    }
    
    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }
    
    public function setIdcargo($idcargo)
    {
        $this->idcargo = $idcargo;
    }
    
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    
    public function setVale_transporte($vale_transporte)
    {
        $this->vale_transporte = $vale_transporte;
    }
    
    public function setData_admissao($data_admissao)
    {
        $this->data_admissao = $data_admissao;
    }
    
    public function setRegistro_geral($registro_geral)
    {
        $this->registro_geral = $registro_geral;
    }
    
    public function setOrgao_emissor($orgao_emissor)
    {
        $this->orgao_emissor = $orgao_emissor;
    }
    
    public function setData_expedicao($data_expedicao)
    {
        $this->data_expedicao = $data_expedicao;
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
    
    public function setZona($zona)
    {
        $this->zona = $zona;
    }
    
    public function setCertificado_reservista_numero($certificado_reservista_numero)
    {
        $this->certificado_reservista_numero = $certificado_reservista_numero;
    }
    
    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;
    }
    
    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;
    }
    //Insert
    public function incluir($imagem, $vale_transporte, $data_admissao, $registro_geral, $orgao_emissor, $data_expedicao, $pis, $ctps, $uf_ctps, $zona, $certificado_reservista_numero, $nome_mae, $nome_pai) {
        try {
            $sql = 'INSERT cargo (imagem, vale_transporte, data_admissao, registro_geral, orgao_emissor, data_expedicao, pis, ctps, uf_ctps, zona, certificado_reservista_numero, nome_mae, nome_pai) VALUES (:imagem, :vale_transporte, :data_admissao, :registro_geral, :orgao_emissor, :data_expedicao, :pis, :ctps, :uf_ctps, :zona, :certificado_reservista_numero, :nome_mae, :nome_pai)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':vale_transporte', $vale_transporte);
            $stmt->bindParam(':data_admissao', $data_admissao);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':pis', $pis);
            $stmt->bindParam(':ctps', $ctps);
            $stmt->bindParam(':uf_ctps', $uf_ctps);
            $stmt->bindParam(':zona', $zona);
            $stmt->bindParam(':certificado_reservista_numero', $certificado_reservista_numero);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    
    //excluir
    public function excluir($idfuncionario) {
        try {
            $sql = 'DELETE from cargo WHERE idcargo = :idcargo';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idcargo', $idcargo);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    
    //Editar
    public function alterar($idfuncionario,$tipo,$carga_mensal,$primeira_entrada,$primeira_saida,$segunda_entrada,$segunda_saida,$carga_diaria,$dias_trabalhados,$folgas) {
        try {
            $sql = 'update pessoas set idfuncionario=:idfuncionario, idpessoa=:idpessoa, idcargo=:idcargo, imagem=:imagem, vale_transporte=:vale_transporte, data_admissao=:data_admissao, registro_geral=:registro_geral, orgao_emissor=:orgao_emissor, data_expedicao=:data_expedicao, pis=:pis, ctps=:ctps, uf_ctps=:uf_ctps, zona=:zona, certificado_reservista_numero=:certificado_reservista_numero, nome_mae=:nome_mae, nome_pai=:nome_pai';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            $stmt->bindParam(':idpessoa', $idpessoa);
            $stmt->bindParam(':idcargo', $idcargo);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':vale_transporte', $vale_transporte);
            $stmt->bindParam(':data_admissao', $data_admissao);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':pis', $pis);
            $stmt->bindParam(':ctps', $ctps);
            $stmt->bindParam(':uf_ctps', $uf_ctps);
            $stmt->bindParam(':zona', $zona);
            $stmt->bindParam(':certificado_reservista_numero', $certificado_reservista_numero);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    //Consultar
    public function consultar($sql) {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
    
}

