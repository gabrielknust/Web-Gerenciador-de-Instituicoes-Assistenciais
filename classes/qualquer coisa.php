<?php

require_once('acesso.php');
require_once('logs.php');

class Pessoa {

//Atributos da classe
    protected $idpessoa;
    protected $idusuarios;
    protected $nome;
    protected $identidade;
    protected $cpf;
    protected $sexo;
    protected $nascimento;
    protected $local_nascimento;
    protected $endereco;
    protected $bairro;
    protected $observaoes;
    protected $foto;
    protected $cidade;
    protected $uf;
    protected $cep;
    protected $email;
    protected $idestadocivil;
    protected $instituicao_indicou;
    protected $instituicao_trabalho;
    protected $endereco_trab;
    protected $cidade_trab;
    protected $cep_trab;
    protected $uf_trab;
    protected $tel_trab;
    protected $cargo_trab;
    protected $funcao;

    //Insert
    public function incluirPessoa($idusuarios, $nome, $identidade, $cpf, $sexo, $nascimento, $local_nascimento, $endereco, $bairro, $observaoes, $foto, $cidade, $uf, $cep, $email, $idestadocivil, $instituicao_indicou, $instituicao_trabalho, $endereco_trab, $cidade_trab, $cep_trab, $uf_trab, $tel_trab, $cargo_trab, $funcao) {
        try {
            
            $sql = 'insert into pessoa(idusuarios,nome,identidade,cpf,sexo,nascimento,local_nascimento,endereco,bairro,observaoes,foto,cidade,uf,cep,email,idestadocivil,instituicao_indicou, instituicao_trabalho, endereco_trab, cidade_trab,cep_trab,uf_trab, tel_trab, cargo_trab, funcao) values( :idusuarios, :nome, :identidade, :cpf, :sexo, :nascimento, :local_nascimento, :endereco, :bairro, :observaoes, :foto, :cidade, :uf, :cep, :email, :idestadocivil, :instituicao_indicou, :instituicao_trabalho, :endereco_trab, :cidade_trab, :cep_trab, :uf_trab, :tel_trab, :cargo_trab, :funcao);';

            $sql = str_replace("'", "\'", $sql);

            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idusuarios', $idusuarios);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':identidade', $identidade);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':nascimento', $nascimento);
            $stmt->bindParam(':local_nascimento', $local_nascimento);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':observaoes', $observaoes);
            $stmt->bindParam(':foto', $foto);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':idestadocivil', $idestadocivil);
            $stmt->bindParam(':instituicao_indicou', $instituicao_indicou);
            $stmt->bindParam(':instituicao_trabalho', $instituicao_trabalho);
            $stmt->bindParam(':endereco_trab', $endereco_trab);
            $stmt->bindParam(':cidade_trab', $cidade_trab);
            $stmt->bindParam(':cep_trab', $cep_trab);
            $stmt->bindParam(':uf_trab', $uf_trab);
            $stmt->bindParam(':tel_trab', $tel_trab);
            $stmt->bindParam(':cargo_trab', $cargo_trab);
            $stmt->bindParam(':funcao', $funcao);
            $stmt->execute();


            $this->consultar("select max(id_pessoa) as idP from pessoa");
            $linha = $this->Linha;
            $rs = $this->Result;
            $id_pessoa = $rs[0]['idP'];

           // $logs = new Logs();
           // $logs->incluir($_SESSION['idusuarios'], $sql, 'pessoa', 'Inserir');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoa = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }

        return $id_pessoa;
    }

    //excluir
    public function excluir($idpessoa) {
        try {
            $sql = 'delete from pessoa where idpessoa= :idpessoa';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();


            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idpessoa', $idpessoa);

            $stmt->execute();

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'pessoa', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoa = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    //Editar
    public function alterar($idpessoa, $idusuarios, $nome, $identidade, $cpf, $sexo, $nascimento, $local_nascimento, $endereco, $bairro, $observaoes, $foto, $cidade, $uf, $cep, $email, $idestadocivil, $instituicao_indicou, $instituicao_trabalho, $endereco_trab, $cidade_trab, $cep_trab, $uf_trab, $tel_trab, $cargo_trab, $funcao) {
        try {
            $sql = 'update pessoa set idusuarios=:idusuarios,nome=:nome,identidade=:identidade,cpf=:cpf,sexo=:sexo,nascimento=:nascimento,local_nascimento=:local_nascimento,endereco=:endereco,bairro=:bairro,observaoes=:observaoes,foto=:foto,cidade=:cidade,uf=:uf,cep=:cep,email=:email, idestadocivil=:idestadocivil, instituicao_indicou=:instituicao_indicou, instituicao_trabalho=:instituicao_trabalho, endereco_trab=:endereco_trab, cidade_trab=:cidade_trab,cep_trab=:cep_trab,uf_trab=:uf_trab, tel_trab=:tel_trab, cargo_trab=:cargo_trab, funcao=:funcao where idpessoa= :idpessoa';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();


            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idpessoa', $idpessoa);
            $stmt->bindParam(':idusuarios', $idusuarios);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':identidade', $identidade);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':nascimento', $nascimento);
            $stmt->bindParam(':local_nascimento', $local_nascimento);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':observaoes', $observaoes);
            $stmt->bindParam(':foto', $foto);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':idestadocivil', $idestadocivil);
            $stmt->bindParam(':instituicao_indicou', $instituicao_indicou);
            $stmt->bindParam(':instituicao_trabalho', $instituicao_trabalho);
            $stmt->bindParam(':endereco_trab', $endereco_trab);
            $stmt->bindParam(':cidade_trab', $cidade_trab);
            $stmt->bindParam(':cep_trab', $cep_trab);
            $stmt->bindParam(':uf_trab', $uf_trab);
            $stmt->bindParam(':tel_trab', $tel_trab);
            $stmt->bindParam(':cargo_trab', $cargo_trab);
            $stmt->bindParam(':funcao', $funcao);
            $stmt->execute();

            $this->consultar("select max(idpessoa) as idP from pessoa");
            $linha = $this->Linha;
            $rs = $this->Result;
            $ispessoa = $rs[0]['idP'];

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'pessoa', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoa = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
        return $ispessoa;
    }

    public function consultar($sql) {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }

}

?>