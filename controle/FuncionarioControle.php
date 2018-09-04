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
        if((!isset($sexo)) || (empty($sexo))){
            $msg .= "Sexo do funcionario n√£o informado. Por favor, informe um sexo!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($nascimento)) || (empty($nascimento))){
            $msg .= "Data de nascimento do funcionario n√£o informado. Por favor, informe uma data de nascimento!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($pai)) || (empty($pai))){
            $msg .= "Nome do pai do funcionario n√£o informado. Por favor, informe um nome!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($nomeMae)) || (empty($nomeMae))){
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
        if((!isset($estado)) || empty(($estado))){
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
        if((!isset($logradouro)) || empty(($logradouro))){
            $msg .= "Logradouro do funcionario n√£o informado. Por favor, informe um logradouro!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($numero)) || empty(($numero))){
            $msg .= "N˙mero do funcionario n√£o informado. Por favor, informe um n˙mero!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($rg)) || empty(($rg))){
            $msg .= "RG do funcionario n√£o informado. Por favor, informe um rg!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($orgaoEmissor)) || empty(($orgaoEmissor))){
            $msg .= "”rg„o emissor do funcionario n√£o informado. Por favor, informe o Ûrg„o emissor!";
            header('Location: ../html/funcionario.html?msg='.$msg);
        }
        if((!isset($dataExpedicao)) || (empty($dataExpedicao))){
            $msg .= "Data de expedi√ß√£o do rg do funcionario n√£o informado. Por favor, informe um data de expedi√ß√£o!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($numeroCPF)) || (empty($numeroCPF))){
            $msg .= "CPF do funcionario n√£o informado. Por favor, informe um CPF!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($tituloEleitorNumero)) || (empty($tituloEleitorNumero))){
            $msg .= "N˙mero do tÌtulo de Eleitor do funcionario n√£o informado. Por favor, informe o n˙mero tÌtulo de eleitor!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($tituloEleitorZona)) || (empty($tituloEleitorZona))){
            $msg .= "Zona do Eleitor do funcionario n√£o informado. Por favor, informe a zona do eleitor!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($tituloEleitorSecao)) || (empty($tituloEleitorSecao))){
            $msg .= "SeÁ„o de Eleitor do funcionario n√£o informado. Por favor, informe a seÁ„o do eleitor!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($certidaoNascimento)) || (empty($certidaoNascimento))){
            $msg .= "Cerdidao de nascimento do funcionario n√£o informada. Por favor, informe a persenÁa de certid„o de nascimento!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($usaVtp)) || (empty($usaVtp))){
            $msg .= "Usa Vale Transporte do funcionario n√£o informada. Por favor, informe se usa ou n„o vale transporte!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($dataAdmissao)) || (empty($dataAdmissao))){
            $msg .= "Data de Admissao do funcionario n√£o informada. Por favor, informe a data de admissao!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($pis)) || (empty($pis))){
            $msg .= "Pis do funcionario n√£o informada. Por favor, informe um pis!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($ctps)) || (empty($ctps))){
            $msg .= "Ctps do funcionario n√£o informada. Por favor, informe um ctps!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($ufCtps)) || (empty($ufCtps))){
            $msg .= "Estado da Ctps do funcionario n√£o informada. Por favor, informe a Uf da ctps!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($senha)) || (empty($senha))){
            $msg .= "Senha do funcionario n√£o informada. Por favor, informe a senha!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($confirmacaoSenha)) || (empty($confirmacaoSenha))){
            $msg .= "Cerdidao de nascimento do funcionario n√£o informada. Por favor, informe a persenÁa de certid„o de nascimento!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        if((!isset($situacao)) || (empty($situacao))){
            $msg .= "SituaÁ„o do funcionario n√£o informada. Por favor, informe a situaÁ„o!";
            header('Location: ../html/funcionario.php?msg='.$msg);
        }
        
        if((!isset($vtp)) || (empty($tp))){
            $vtp='null';
        }
        if((!isset($telefone)) || (empty($telefone))){
            $telefone='null';
        }
        if((!isset($complemento)) || (empty($complemento))){
            $complemento='NULL';
        }
        if((!isset($ibge)) || (empty($ibge))){
            $ibge='NULL';
        }
        if((!isset($certificadoReservistaNumero)) || (empty($certificadoReservistaNumero))){
            $certificadoReservistaNumero='null';
        }
        if((!isset($certificadoReservistaSerie)) || (empty($certificadoReservistaSerie))){
            $certificadoReservistaSerie='null';
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
        if((!isset($cestaBasica)) || (empty($cestaBasica))){
            $cestaBasica='null';
        }
        
        $funcionario = new Funcionario($numeroCPF,$nome,$sexo,$nascimento,$rg,$orgaoEmissor,$dataExpedicao,$nomeMae,$pai,$sangue,$senha,$telefone,$imagem,$cep,$cidade,$bairro,$logradouro,$numeroEndereco,$complemento,$ibge);
        $funcionario->setVale_transporte($vtp);
        $funcionario->setData_admissao($dataAdmissao);
        $funcionario->setPis($pis);
        $funcionario->setCtps($ctps);
        $funcionario->setUf_ctps($uf_Ctps);
        $funcionario->setNumerotitulo($tituloEleitorNumero);
        $funcionario->setZona($tituloEleitorZona);
        $funcionario->setSecao($tituloEleitorSecao);
        $funcionario->setCertificado_reservista_numero($certificadoReservistaNumero);
        $funcionario->setCertificado_reservista_serie($certificadoReservistaSerie);
        $funcionario->setCalcado($calcado);
        $funcionario->setCalca($calca);
        $funcionario->setJaleco($jaleco);
        $funcionario->setCamisa($camisa);
        $funcionario->setUsa_vtp($UsaVtp);
        $funcionario->setCesta_basica($cestaBasica);
        $funcionario->setSituacao($situacao);
        
        return $funcionario;
    }
    public function listarTodos(){
        extract($_REQUEST);
        $funcionarioDAO= new FuncionarioDAO();
        $funcionarios = $funcionarioDAO->listarTodos();
        session_start();
        $_SESSION['funcionarios']=$funcionarios;
        header('Location: ../html/tabela.php');
    }
    
    public function listarUm($cpf)
    {
        $funcionarioDAO = new FunionarioDAO();
        
    }
    
    public function incluir(){
        $funcionario = $this->verificar();
        $funcionarioDAO = new FuncionarioDAO();
        try{
            $funcionarioDAO->incluir($interno);
            $msg= "O funcion·rio ".$funcionario->getNome()." foi adicionado!";
        } catch (PDOException $e){
            $msg= "N√£o foi poss√≠vel registrar o funcion·rio"."<br>".$e->getMessage();
            echo $msg;
        }
    }
}