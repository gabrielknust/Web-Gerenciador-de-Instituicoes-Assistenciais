<?php
include_once '../classes/Entrada.php';
include_once '../dao/EntradaDAO.php';
include_once '../classes/Origem.php';
include_once '../dao/OrigemDAO.php';
include_once '../classes/Almoxarifado.php';
include_once '../dao/AlmoxarifadoDAO.php';
include_once '../classes/TipoEntrada.php';
include_once '../dao/TipoEntradaDAO.php';
class EntradaControle
{
    public function verificar(){
        extract($_REQUEST);
        date_default_timezone_set('America/Sao_Paulo');
        $horadata = date('Y-m-d H:i');
        $horadata = explode(" ", $horadata);
        $data = $horadata[0];
        $hora = $horadata[1];
        $valor_total = $total_total;
        $entrada = new Entrada($data,$hora,$valor_total);
        
        return $entrada;
    }
    
    public function listarTodos(){
        extract($_REQUEST);
        $entradaDAO= new EntradaDAO();
        $origens = $entradaDAO->listarTodos();
        session_start();
        $_SESSION['entrada']=$origens;
        header('Location: ../html/cadastro_entrada.php');
    }
    
    public function incluir(){
        extract($_REQUEST);
        $entrada = $this->verificar();
        $entradaDAO = new EntradaDAO();
        $origemDAO = new OrigemDAO();
        $almoxarifadoDAO = new AlmoxarifadoDAO();
        $TipoEntradaDAO = new TipoEntradaDAO();

        $origem = $origemDAO->listarUm($origem);
        $almoxarifado = $almoxarifadoDAO->listarUm($almoxarifado);
        $TipoEntrada =$TipoEntradaDAO->listarUm($tipo_entrada);

        try{
            $entrada->setId_origem($origem);
            $entrada->setId_almoxarifado($almoxarifado);
            $entrada->setId_tipo($TipoEntradaDAO);

            $entradaDAO->incluir($entrada);
            session_start();
            echo "sucesso";
            //header("Location: ../controle/control.php?metodo=incluir&nomeClasse=IentradaControle&nextPage=../html/cadastro_entrada.php");
        } catch (PDOException $e){
            $msg= "Não foi possível adicionar a entrada"."<br>".$e->getMessage();
            echo $msg;
        }
    }

    public function listarId(){
        extract($_REQUEST);
        try{
            $entradaDAO = new EntradaDAO();
            $entrada = $entradaDAO->listarId($id_entrada);
            session_start();
            $_SESSION['entrada'] = $entrada;
            header('Location: ' . $nextPage);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
