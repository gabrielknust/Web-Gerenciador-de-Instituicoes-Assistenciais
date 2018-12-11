<?php
require_once'../classes/Saida.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class SaidaDAO
{
	public function listarTodos(){

    try{
        $saidas=array();
        $pdo = Conexao::connect();
        $consulta = $pdo->query("SELECT id_saida, id_destino, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total FROM saida");
        $x=0;
        while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $saidas[$x]=array('id_saida'=>$linha['id_saida'],'id_destino'=>$linha['id_destino'],'id_almoxarifado'=>$linha['id_almoxarifado'],'id_tipo'=>$linha['id_tipo'],'id_responsavel'=>$linha['id_responsavel'],'data'=>$linha['data'],'hora'=>$linha['hora'],'valor_total'=>$linha['valor_total']);
            $x++;
        }
        } catch (PDOExeption $e){
            echo 'Error:' . $e->getMessage;
        }
        return json_encode($saidas);
    }
    public function listarId($id_saida){
        try{
            $pdo = Conexao::connect();
            $sql = "SELECT id_saida, id_destino, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total FROM saida WHERE id_saida = :id_saida";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_saida',$id_saida);

            $stmt->execute();
            $saidas = array();
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                $saidas[]=array('id_saida'=>$linha['id_saida'],'id_destino'=>$linha['id_destino'],'id_almoxarifado'=>$linha['id_almoxarifado'],'id_tipo'=>$linha['id_tipo'],'id_responsavel'=>$linha['id_responsavel'],'data'=>$linha['data'],'hora'=>$linha['hora'],'valor_total'=>$linha['valor_total']);
            }
        } catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
        return json_encode($saidas);  
    }
}
?>