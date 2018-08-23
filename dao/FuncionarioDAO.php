<?php
require_once '../classes/FuncionarioDAO.php';
class FuncionarioDAO
{
    public function incluir($funcionario,$quadrohorario)
    {
        try {
            $sql = 'call cadfuncionario(:nome,:cpf,:senha,:sexo,:telefone,:data_nascimento,:imagem,:cep,:cidade,:bairro,:logradouro,:numero_endereco,:complemento,: registro_geral,: orgao_emissor,: data_expedicao date,:nome_pai,:nome_mae,:tipo_sanguo,:escala,:tipo,:carga_horaria,:entrada1,:saida1,:entrada2,:saida2,:total,:dias_trabalhados,:folga,:observacoes,:vale_transporte,:data_admissao,:date,:pis,:ctps,:uf_ctps,:numero_titulo,:zona,:secao,:certificado_reservista_numero,:certificado_reservista_serie,:calcado,:calca,:jaleco,:camisa,:usa_vtp,:cesta_basica,:situacao);';
            
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