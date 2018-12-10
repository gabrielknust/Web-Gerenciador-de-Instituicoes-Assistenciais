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

    public function incluir($entrada){
        try{
            extract($_REQUEST);
            $pdo = Conexao::connect();

            $sql = 'INSERT entrada(id_origem,id_almoxarifado,id_tipo,data,hora,valor_total) VALUES( :id_origem,:id_almoxarifado,:id_tipo,:data,:hora,:valor_total)';
            $sql = str_replace("'", "\'", $sql);            
            $stmt = $pdo->prepare($sql);

            $id_origem = $entrada->getId_origem()->getId_origem();
            $id_almoxarifado = $entrada->getId_almoxarifado()->getId_almoxarifado();
            $id_tipo = $entrada->getId_tipo()->getId_tipo();
            $data = $entrada->getData();
            $hora = $entrada->getHora();
            $valor_total = $entrada->getValor_total();

            $stmt->bindParam(':id_origem',$id_origem);
            $stmt->bindParam(':id_almoxarifado',$id_tipo);
            $stmt->bindParam(':id_tipo',$id_tipo);
            $stmt->bindParam(':data',$data);
            $stmt->bindParam(':hora',$hora);
            $stmt->bindParam(':valor_total',$valor_total);

            $stmt->execute();
        } catch(PDOExeption $e){
            echo : 'Error: <b>  na tabela produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }

    }
}
?>