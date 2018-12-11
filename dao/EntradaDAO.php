<?php
require_once'../classes/Entrada.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class EntradaDAO
{
	public function listarTodos(){

    try{
        $entradas=array();
        $pdo = Conexao::connect();
        $consulta = $pdo->query("SELECT id_entrada, id_origem, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total FROM entrada");
        $x=0;
        while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $entradas[$x]=array('id_entrada'=>$linha['id_entrada'],'id_origem'=>$linha['id_origem'],'id_almoxarifado'=>$linha['id_almoxarifado'],'id_tipo'=>$linha['id_tipo'],'id_responsavel'=>$linha['id_responsavel'],'data'=>$linha['data'],'hora'=>$linha['hora'],'valor_total'=>$linha['valor_total']);
            $x++;
        }
        } catch (PDOExeption $e){
            echo 'Error:' . $e->getMessage;
        }
        return json_encode($entradas);
    }
    public function listarId($id_entrada){
    try{
        $pdo = Conexao::connect();
        $sql = "SELECT id_entrada, id_origem, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total FROM entrada WHERE id_entrada = :id_entrada";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_entrada',$id_entrada);

        $stmt->execute();
        $entradas = array();
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            $entradas[]=array('id_entrada'=>$linha['id_entrada'],'id_origem'=>$linha['id_origem'],'id_almoxarifado'=>$linha['id_almoxarifado'],'id_tipo'=>$linha['id_tipo'],'id_responsavel'=>$linha['id_responsavel'],'data'=>$linha['data'],'hora'=>$linha['hora'],'valor_total'=>$linha['valor_total']);
        }
        } catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
        return json_encode($entradas);  
    }
}
?>