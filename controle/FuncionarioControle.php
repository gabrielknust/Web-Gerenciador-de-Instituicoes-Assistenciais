<?php
include_once '../classes/Funcionario.php';
include_once '../dao/FuncionarioDAO.php';
class FuncionarioControle
{
    public function formatoDataYMD($data)
    {
        $data_arr = explode("/", $data);
        
        $datac = $data_arr[2] . '-' . $data_arr[1] . '-' . $data_arr[0];
        
        return $datac;
    }
    
    public function verificar(){
        extract($_REQUEST);
        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do funcionario n√£o informado. Por favor, informe um nome!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($gender)) || (empty($gender))){
            $msg .= "Sexo do funcionario n√£o informado. Por favor, informe um sexo!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($telefone)) || (empty($telefone))){
            $telefone='null';
        }
        if((!isset($nascimento)) || (empty($nascimento))){
            $msg .= "Data de nascimento do funcionario n√£o informado. Por favor, informe uma data de nascimento!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($nome_pai)) || (empty($nome_pai))){
            $msg .= "Nome do pai do funcionario n√£o informado. Por favor, informe um nome!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($nome_mae)) || (empty($nome_mae))){
            $msg .= "Nome da mae do funcionario n√£o informado. Por favor, informe um nome!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($sangue)) || (empty($sangue))){
            $msg .= "Tipo sanguineo do funcionario n√£o informado. Por favor, informe um tipo sanguineo!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($cep)) || empty(($cep))){
            $msg .= "Cep do funcionario n√£o informado. Por favor, informe um cep!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($uf)) || empty(($uf))){
            $msg .= "Estado do funcionario n√£o informado. Por favor, informe um estado!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($cidade)) || empty(($cidade))){
            $msg .= "Cidade do funcionario n√£o informado. Por favor, informe uma cidade!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($bairro)) || empty(($bairro))){
            $msg .= "Bairro do funcionario n√£o informado. Por favor, informe um bairro!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($rua)) || empty(($rua))){
            $msg .= "Logradouro do funcionario n√£o informado. Por favor, informe um logradouro!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($numero_residencia)) || empty(($numero_residencia))){
            $msg .= "N˙mero do funcionario n√£o informado. Por favor, informe um n˙mero!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($complemento)) || (empty($complemento))){
            $complemento='NULL';
        }
        if((!isset($ibge)) || (empty($ibge))){
            $ibge='NULL';
        }
        if((!isset($rg)) || empty(($rg))){
            $msg .= "RG do funcionario n√£o informado. Por favor, informe um rg!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($orgao_emissor)) || empty(($orgao_emissor))){
            $msg .= "”rg„o emissor do funcionario n√£o informado. Por favor, informe o Ûrg„o emissor!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($data_expedicao)) || (empty($data_expedicao))){
            $msg .= "Data de expedi√ß√£o do rg do funcionario n√£o informado. Por favor, informe um data de expedi√ß√£o!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($cpf)) || (empty($cpf))){
            $msg .= "CPF do funcionario n√£o informado. Por favor, informe um CPF!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($certidao)) || (empty($certidao))){
            $msg .= "Cerdidao de nascimento do funcionario n√£o informada. Por favor, informe a persenÁa de certid„o de nascimento!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($senha)) || (empty($senha))){
            $msg .= "Senha do funcionario n√£o informada. Por favor, informe a senha!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($c_senha)) || (empty($c_senha))){
            $msg .= "Cerdidao de nascimento do funcionario n√£o informada. Por favor, informe a persenÁa de certid„o de nascimento!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($vale_transporte)) || (empty($vale_transporte))){
            $msg .= "Usa Vale Transporte do funcionario n√£o informada. Por favor, informe se usa ou n„o vale transporte!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($num_vale_transporte)) || (empty($num_vale_transporte))){
            $num_vale_transporte='null';
        }
        if((!isset($pis)) || (empty($pis))){
            $msg .= "Pis do funcionario n√£o informada. Por favor, informe um pis!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($ctps)) || (empty($ctps))){
            $msg .= "Ctps do funcionario n√£o informada. Por favor, informe um ctps!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($uf_ctps)) || (empty($uf_ctps))){
            $msg .= "Estado da Ctps do funcionario n√£o informada. Por favor, informe a Uf da ctps!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($titulo_eleitor)) || (empty($titulo_eleitor))){
            $msg .= "N˙mero do tÌtulo de Eleitor do funcionario n√£o informado. Por favor, informe o n˙mero tÌtulo de eleitor!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($zona_eleitoral)) || (empty($zona_eleitoral))){
            $msg .= "Zona do Eleitor do funcionario n√£o informado. Por favor, informe a zona do eleitor!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($secao_titulo_eleitor)) || (empty($secao_titulo_eleitor))){
            $msg .= "SeÁ„o de Eleitor do funcionario n√£o informado. Por favor, informe a seÁ„o do eleitor!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        
        if((!isset($data_admissao)) || (empty($data_admissao))){
            $msg .= "Data de Admissao do funcionario n√£o informada. Por favor, informe a data de admissao!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($situacao)) || (empty($situacao))){
            $msg .= "SituaÁ„o do funcionario n√£o informada. Por favor, informe a situaÁ„o!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        
        if((!isset($certificado_reservista_numero)) || (empty($certificado_reservista_numero))){
            $certificado_reservista_numero='null';
        }
        if((!isset($certificado_reservista_serie)) || (empty($certificado_reservista_serie))){
            $certificado_reservista_serie='null';
        }

        if((!isset($calcado)) || (empty($calcado))){
            $calcado='null';
        }
        if((!isset($calca)) || (empty($calca))){
            $calca='null';
        }
        if((!isset($jaleco)) || (empty($jaleco))){
            $jaleco='null';
        }
        if((!isset($camisa)) || (empty($camisa))){
            $camisa='null';
        }
        if((!isset($cesta_basica)) || (empty($cesta_basica))){
            $cesta_basica='null';
        }
        $imgperfil="";
        $data_admissao=$this->formatoDataYMD($data_admissao);
        $data_expedicao=$this->formatoDataYMD($data_expedicao);
        $nascimento=$this->formatoDataYMD($nascimento);
        
        $funcionario = new Funcionario($cpf,$nome,$gender,$nascimento,$rg,$orgao_emissor,$data_expedicao,$nome_mae,$nome_pai,$sangue,$senha,$telefone,$imgperfil,$cep,$cidade,$bairro,$rua,$numero_residencia,$complemento,$ibge);
        $funcionario->setVale_transporte($num_vale_transporte);
        $funcionario->setData_admissao($data_admissao);
        $funcionario->setPis($pis);
        $funcionario->setCtps($ctps);
        $funcionario->setUf_ctps($uf_ctps);
        $funcionario->setNumero_titulo($titulo_eleitor);
        $funcionario->setZona($zona_eleitoral);
        $funcionario->setSecao($secao_titulo_eleitor);
        $funcionario->setCertificado_reservista_numero($certificado_reservista_numero);
        $funcionario->setCertificado_reservista_serie($certificado_reservista_serie);
        $funcionario->setCalcado($calcado);
        $funcionario->setCalca($calca);
        $funcionario->setJaleco($jaleco);
        $funcionario->setCamisa($camisa);
        $funcionario->setUsa_vtp($vale_transporte);
        $funcionario->setCesta_basica($cesta_basica);
        $funcionario->setSituacao($situacao);
        $funcionario->setEstado($uf);
        
        return $funcionario;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $funcionarioDAO= new FuncionarioDAO();
        $funcionarios = $funcionarioDAO->listarTodos();
        session_start();
        $_SESSION['funcionarios']=$funcionarios;
        header('Location: '.$nextPage);
    }
    
    public function listarUm($cpf)
    {
        $funcionarioDAO = new FunionarioDAO();
        
    }
    
    public function incluir(){
        $funcionario = $this->verificar();
        $funcionarioDAO = new FuncionarioDAO();
        try{
            $funcionarioDAO->incluir($funcionario);
            $msg= "O funcion·rio ".$funcionario->getNome()." foi adicionado!";
        } catch (PDOException $e){
            $msg= "N√£o foi poss√≠vel registrar o funcion·rio"."<br>".$e->getMessage();
            echo $msg;
        }
    }
}