<?php
require_once '../classes/Funcionario.php';
class FuncionarioDAO
{
    public function incluir($funcionario)
    {
        try {
            /*depois do sangue  :escala,:tipo,:carga_horaria,:entrada1,:saida1,:entrada2,:saida2,:total,:dias_trabalhados,:folga,:observacoes,   �ltimo   ,:situacao*/
            $sql = 'call cadfuncionario(:nome,:cpf,:senha,:sexo,:telefone,:data_nascimento,:imagem,:cep,:estado,:cidade,:bairro,:logradouro,:numero_endereco,:complemento,:ibge,:registro_geral,:orgao_emissor,:data_expedicao,:nome_pai,:nome_mae,:tipo_sangue,:vale_transporte,:data_admissao,:pis,:ctps,:uf_ctps,:numero_titulo,:zona,:secao,:certificado_reservista_numero,:certificado_reservista_serie,:calcado,:calca,:jaleco,:camisa,:usa_vtp,:cesta_basica,:situacao)';
            
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            $nome=$funcionario->getNome();
            $cpf=$funcionario->getCpf();
            $senha=$funcionario->getSenha();
            $sexo=$funcionario->getSexo();
            $telefone=$funcionario->getTelefone();
            $nascimento=$funcionario->getDataNascimento();
            $imagem=$funcionario->getImagem();
            $cep=$funcionario->getCep();
            $estado=$funcionario->getEstado();
            $cidade=$funcionario->getCidade();
            $bairro=$funcionario->getBairro();
            $logradouro=$funcionario->getLogradouro();
            $numeroEndereco=$funcionario->getNumeroEndereco();
            $complemento=$funcionario->getComplemento();
            $ibge=$funcionario->getIbge();
            $rg=$funcionario->getRegistroGeral();
            $orgaoEmissor=$funcionario->getOrgaoEmissor();
            $dataExpedicao=$funcionario->getDataExpedicao();
            $nomePai=$funcionario->getNomePai();
            $nomeMae=$funcionario->getNomeMae();
            $sangue=$funcionario->getTipoSanguineo();
            $valeTransporte=$funcionario->getVale_transporte();
            $dataAdmissao=$funcionario->getData_admissao();
            $pis=$funcionario->getPis();
            $ctps=$funcionario->getCtps();
            $ufCtps=$funcionario->getUf_ctps();
            $numeroTitulo=$funcionario->getNumero_titulo();
            $zona=$funcionario->getZona();
            $secao=$funcionario->getSecao();
            $certificadoReservistaNumero=$funcionario->getCertificado_reservista_numero();
            $certificadoReservistaSerie=$funcionario->getCertificado_reservista_serie();
            $calcado=$funcionario->getCalcado();
            $calca=$funcionario->getCalca();
            $jaleco=$funcionario->getJaleco();
            $camisa=$funcionario->getCamisa();
            $usaVtp=$funcionario->getUsa_vtp();
            $cestaBasica=$funcionario->getCesta_basica();
            $situacao=$funcionario->getSituacao();

            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':sexo',$sexo);
            $stmt->bindParam(':telefone',$telefone);
            $stmt->bindParam(':data_nascimento',$nascimento);
            $stmt->bindParam(':imagem',$imagem);
            $stmt->bindParam(':cep',$cep);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':cidade',$cidade);
            $stmt->bindParam(':bairro',$bairro);
            $stmt->bindParam(':logradouro',$logradouro);
            $stmt->bindParam(':numero_endereco',$numeroEndereco);
            $stmt->bindParam(':complemento',$complemento);
            $stmt->bindParam(':ibge',$ibge);
            $stmt->bindParam(':registro_geral',$rg);
            $stmt->bindParam(':orgao_emissor',$orgaoEmissor);
            $stmt->bindParam(':nome_pai',$nomePai);
            $stmt->bindParam(':nome_mae',$nomeMae);
            $stmt->bindParam(':tipo_sangue',$sangue);
            $stmt->bindParam(':vale_transporte', $valeTransporte);
            $stmt->bindParam(':data_admissao', $dataAdmissao);
            $stmt->bindParam(':pis', $pis);
            $stmt->bindParam(':ctps', $ctps);
            $stmt->bindParam(':uf_ctps', $ufCtps);
            $stmt->bindParam(':numero_titulo', $numeroTitulo);
            $stmt->bindParam(':zona', $zona);
            $stmt->bindParam(':secao', $secao);
            $stmt->bindParam(':certificado_reservista_numero', $certificadoReservistaNumero);
            $stmt->bindParam(':certificado_reservista_serie', $certificadoReservistaSerie);
            $stmt->bindParam(':calcado', $calcado);
            $stmt->bindParam(':calca', $calca);
            $stmt->bindParam(':jaleco', $jaleco);
            $stmt->bindParam(':camisa', $camisa);
            $stmt->bindParam(':usa_vtp', $usaVtp);
            $stmt->bindParam(':cesta_basica', $cestaBasica);
            $stmt->bindParam(':situacao', $situacao);
            $stmt->bindParam(':data_expedicao',$dataExpedicao);
            
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
    public function listarTodos(){

        try{
            $internos=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT p.nome,p.cpf, p.senha, p.sexo, p.telefone,p.data_nascimento,p.imagem, p.cep,p.cidade,p.bairro,p.logradouro,p.numero_endereco,p.complemento,p.ibge,p.registro_geral,p.orgao_emissor,p.data_expedicao,p.nome_pai,p.nome_mae,p.tipo_sanguineo,f.vale_transporte,f.data_admissao,f.pis,f.ctps,f.uf_ctps,f.numero_titulo,f.zona,f.secao,f.certificado_reservista_numero,f.certificado_reservista_serie,f.calcado,f.calca,f.jaleco,f.camisa,f.usa_vtp,f.cesta_basica,f.situacao FROM pessoa p INNER JOIN funcionario f ON p.id_pessoa = f.id_pessoa");
            $produtos = Array();
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $internos[$x]=array('cpf'=>$linha['cpf'],'nome'=>$linha['nome'],'sexo'=>$linha['sexo'],'data_nascimento'=>$linha['data_nascimento'],'registro_geral'=>$linha['registro_geral'],'orgao_emissor'=>$linha['orgao_emissor'],'data_expedicao'=>$linha['data_expedicao'],'nome_mae'=>$linha['nome_mae'],'nome_pai'=>$linha['nome_pai'],'tipo_sanguineo'=>$linha['tipo_sanguineo'],'senha'=>$linha['senha'],'telefone'=>$linha['telefone'],'imagem'=>$linha['imagem'],'cep'=>$linha['cep'],'cidade'=>$linha['cidade'],'bairro'=>$linha['bairro'],'logradouro'=>$linha['logradouro'],'numero_endereco'=>$linha['numero_endereco'],'complemento'=>$linha['complemento'],'vale_transporte'=>$linha['vale_transporte'],'data_admissao'=>$linha['data_admissao'],'pis'=>$linha['pis'],'ctps'=>$linha['ctps'],'uf_ctps'=>$linha['uf_ctps'],'numero_titulo'=>$linha['numero_titulo'],'zona'=>$linha['zona'],'secao'=>$linha['secao'],'certificado_reservista_numero'=>$linha['certificado_reservista_numero'],'certificado_reservista_serie'=>$linha['certificado_reservista_serie'],'calcado'=>$linha['calcado'],'calca'=>$linha['calca'],'jaleco'=>$linha['jaleco'],'camisa'=>$linha['camisa'],'usa_vtp'=>$linha['usa_vtp'],'cesta_basica'=>$linha['cesta_basica'],'situacao'=>$linha['situacao']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($internos);
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