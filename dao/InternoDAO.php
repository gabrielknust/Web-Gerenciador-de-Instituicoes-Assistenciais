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
            
            $stmt->bindParam(':senha',$interno->getSenha());
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
}
?>