<?php
include_once '../classes/Saida.php';
include_once '../dao/SaidaDAO.php';
include_once '../classes/Destino.php';
include_once '../dao/DestinoDAO.php';
include_once '../classes/Almoxarifado.php';
include_once '../dao/AlmoxarifadoDAO.php';
include_once '../classes/TipoSaida.php';
include_once '../dao/TipoSaidaDAO.php';
include_once '../classes/Isaida.php';
include_once '../dao/IsaidaDAO.php';
include_once '../classes/Produto.php';
include_once '../dao/ProdutoDAO.php';
class SaidaControle
{
    public function verificar(){
        extract($_REQUEST);
        date_default_timezone_set('America/Sao_Paulo');
        $horadata = date('Y-m-d H:i');
        $horadata = explode(" ", $horadata);
        $data = $horadata[0];
        $hora = $horadata[1];
        $valor_total = $total_total;
        $responsavel = 1;
        $saida = new Saida($responsavel,$data,$hora,$valor_total);
        
        return $saida;
    }
    
    
    public function listarTodos(){
        extract($_REQUEST);
        $saidaDAO= new SaidaDAO();
        $origens = $saidaDAO->listarTodos();
        session_start();
        $_SESSION['saida']=$origens;
        header('Location: ../html/cadastro_saida.php');
    }
    
    public function incluir(){
        extract($_REQUEST);
        $saida = $this->verificar();
        

        $saidaDAO = new SaidaDAO();
        $destinoDAO = new DestinoDAO();
        $almoxarifadoDAO = new AlmoxarifadoDAO();
        $TipoSaidaDAO = new TipoSaidaDAO();
        $destino = explode("-", $destino);
        $destino = $destino[0];
        $destino = $destinoDAO->listarUm($destino);
        $almoxarifado = $almoxarifadoDAO->listarUm($almoxarifado);
        $TipoSaida =$TipoSaidaDAO->listarUm($tipo_saida);

        try{
            $saida->setId_destino($destino);
            $saida->setId_almoxarifado($almoxarifado);
            $saida->setId_tipo($TipoSaida);

            $saidaDAO->incluir($saida);

            $id_responsavel = $saidaDAO->ultima();
            $id_responsavel = implode("",$id_responsavel);

            $x = 1;
            $id = "id";
            $qtdd = "qtd";
            $valor_unitario = "valor_unitario";
            while($x<=$conta){
                if(isset(${$id.$x})){
                    $isaida = new Isaida(${$qtdd.$x},${$valor_unitario.$x});
                    $isaidaDAO = new IsaidaDAO();
                    $produtoDAO = new ProdutoDAO();
                    $produto = $produtoDAO->listarUm(${$id.$x});
                    $saida = $saidaDAO->listarUm($id_responsavel);

                    $isaida->setId_produto($produto);
                    $isaida->setId_saida($saida);

                    $isaida = $isaidaDAO->incluir($isaida);

                }
            $x++;
            header('Location: ../html/cadastro_saida.php');
            }
        } catch (PDOException $e){
            $msg= "Não foi possível adicionar a saida"."<br>".$e->getMessage();
            echo $msg;
        }
    }

    public function listarId(){
        extract($_REQUEST);
        try{
            $saidaDAO = new SaidaDAO();
            $saida = $saidaDAO->listarId($id_saida);
            session_start();
            $_SESSION['saida'] = $saida;
            header('Location: ' . $nextPage);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}