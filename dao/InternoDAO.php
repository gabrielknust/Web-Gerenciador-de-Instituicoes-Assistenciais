<?php
require_once'../classes/Interno.php';

class InternoDAO
{
	public function incluir($interno)
    {        
        try {
            $sql = 'call cadinterno(:nome,:cpf,:senha,:sexo,:telefone,:data_nascimento,:imagem,:cep,:cidade,:bairro,:logradouro,:numero_endereco,:complemento,:registro_geral,:orgao_emissor,:nome_pai,:nome_mae,:tipo_sanguineo,:nome_contato_urgente,:telefone_contato_urgente_1,:telefone_contato_urgente_2,:telefone_contato_urgente_3)';
            
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            $senha=$interno->getSenha();
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':nome',$interno->getNome());
            $stmt->bindParam(':cpf',$interno->getCpf());
            $stmt->bindParam(':sexo',$interno->getSexo());
            $stmt->bindParam(':telefone',$interno->getTelefone());
            $stmt->bindParam(':data_nascimento',$interno->getDataNascimento());
            $stmt->bindParam(':imagem',$interno->getImagem());        
            $stmt->bindParam(':cep',$interno->getCep());
            $stmt->bindParam(':cidade',$interno->getCidade());
            $stmt->bindParam(':bairro',$interno->getBairro());
            $stmt->bindParam(':logradouro',$interno->getLogradouro());
            $stmt->bindParam(':numero_endereco',$interno->getNumeroEndereco());
            $stmt->bindParam(':complemento',$interno->getComplemento());
            $stmt->bindParam(':registro_geral',$interno->getRegistroGeral());
            $stmt->bindParam(':orgao_emissor',$interno->getOrgaoEmissor());
            $stmt->bindParam(':nome_pai',$interno->getNomePai());        
            $stmt->bindParam(':nome_mae',$interno->getNomeMae());
            $stmt->bindParam(':tipo_sanguineo',$interno->getTipoSanguineo());
            $stmt->bindParam(':nome_contato_urgente',$interno->getNomeContatoUrgente());
            $stmt->bindParam(':telefone_contato_urgente_1',$interno->getTelefoneContatoUrgente1());
            $stmt->bindParam(':telefone_contato_urgente_2',$interno->getTelefoneContatoUrgente2());
            $stmt->bindParam(':telefone_contato_urgente_3',$interno->getTelefoneContatoUrgente3());
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela interno = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // excluir
    public function excluir($idfuncionario)
    {
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

    // Editar
    public function alterar($idfuncionario, $tipo, $carga_mensal, $primeira_entrada, $primeira_saida, $segunda_entrada, $segunda_saida, $carga_diaria, $dias_trabalhados, $folgas)
    {
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
    public function listarTodos(){

        try{
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT p.nome,p.cpf, p.senha, p.sexo, p.telefone,p.data_nascimento,p.imagem, p.cep,p.cidade,p.bairro,p.logradouro,p.numero_endereco,p.complemento,p.ibge,p.registro_geral,p.orgao_emissor,p.data_expedicao,p.nome_pai,p.nome_mae,p.tipo_sanguineo,i.nome_contato_urgente,i.telefone_contato_urgente_1,i.telefone_contato_urgente_2,i.telefone_contato_urgente_3 FROM pessoa p INNER JOIN interno i ON p.id_pessoa = i.id_pessoa");
            $produtos = Array();
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $interno = new Interno($cpf,$nome,$sexo,$dataNascimento,$registroGeral,$orgaoEmissor,$dataExpedicao,$nomeMae,$nomePai,$tipoSanguineo);
                
                $internos[] = $produto;
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
        }
    }

    public function listar($nome){
        $nome = "%" . $nome . "%";
        try{
            $pdo = Conexao::connect();
            $sqc = "SELECT p.nome,p.cpf, p.senha, p.sexo, p.telefone,p.data_nascimento,p.imagem, p.cep,p.cidade,p.bairro,p.logradouro,p.numero_endereco,p.complemento,p.ibge,p.registro_geral,p.orgao_emissor,p.data_expedicao,p.nome_pai,p.nome_mae,p.tipo_sanguineo,i.nome_contato_urgente,i.telefone_contato_urgente_1,i.telefone_contato_urgente_2,i.telefone_contato_urgente_3 FROM pessoa p INNER JOIN interno i ON p.id_pessoa = i.id_pessoa WHERE p.nome LIKE :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            $internos = Array();
            while ($linha = $consulat-fetch(PDO::FETCH_ASSOC)) {
                $interneo = new Interno();
                $internos[] = $interno;
            }
        }catch (PDOExeption $e){
            echo 'Error: ' .  $e->getMessage();
        }
        return $internos;
    }
}
?>