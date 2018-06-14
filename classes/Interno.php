<?php

require_once('acesso.php');

class Interno extends Pessoa
{
    private $id_interno;
    private $contato_urgente;
    private $nome_mae;
    private $nome_pai;
    private $data_internacao;
    private $data_saida;
    private $readmicao;
    private $data_obito;
    private $estado_civil;
    public function __construct($nome, $telefone, $data_nascimento, $cpf, $sexo,$contato_urgente,$nome_mae,$nome_pai,$data_internacao,$data_saida,$readmicao,$data_obito,$estado_civil)
    {
        parent::__construct($nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->contato_urgente=$contato_urgente;
        $this->nome_mae=$nome_mae;
        $this->nome_pai=$nome_pai;
        $this->data_internacao=$data_internacao;
        $this->data_saida=$data_saida;
        $this->readmicao=$readmicao;
        $this->data_obito=$data_obito;
        $this->estado_civil=$estado_civil;
    }
    public function getContato_urgente()
    {
        return $this->contato_urgente;
    }
    
    public function getNome_mae()
    {
        return $this->nome_mae;
    }
    
    public function getNome_pai()
    {
        return $this->nome_pai;
    }
    
    public function getData_internacao()
    {
        return $this->data_internacao;
    }
    
    public function getData_saida()
    {
        return $this->data_saida;
    }
    
    public function getReadmicao()
    {
        return $this->readmicao;
    }
    
    public function getData_obito()
    {
        return $this->data_obito;
    }
    
    public function getEstado_civil()
    {
        return $this->estado_civil;
    }
    
    public function setContato_urgente($contato_urgente)
    {
        $this->contato_urgente = $contato_urgente;
    }
    
    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;
    }
    
    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;
    }
    
    public function setData_internacao($data_internacao)
    {
        $this->data_internacao = $data_internacao;
    }
    
    public function setData_saida($data_saida)
    {
        $this->data_saida = $data_saida;
    }
    
    public function setReadmicao($readmicao)
    {
        $this->readmicao = $readmicao;
    }
    
    public function setData_obito($data_obito)
    {
        $this->data_obito = $data_obito;
    }
    
    public function setEstado_civil($estado_civil)
    {
        $this->estado_civil = $estado_civil;
    }
    //Insert
    public function incluir($contato_urgente, $nome_mae, $nome_pai, $data_internacao, $data_saida, $readmicao, $data_obito, $estado_civil) {
        try {
            $sql = 'INSERT cargo (contato_urgente, nome_mae, nome_pai, data_internacao, data_saida, readmicao, data_obito, estado_civil) VALUES (:contato_urgente,:nome_mae,:nome_pai,:data_internacao,:data_saida,:readmicao,:data_obito,:estado_civil)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':contato_urgente', $contato_urgente);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            $stmt->bindParam(':data_internacao', $data_internacao);
            $stmt->bindParam(':data_saida', $data_saida);
            $stmt->bindParam(':readmicao', $readmicao);
            $stmt->bindParam(':data_obito', $data_obito);
            $stmt->bindParam(':estado_civil', $estado_civil);
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

