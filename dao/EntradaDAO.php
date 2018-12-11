<?php
require_once'../classes/Entrada.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class EntradaDAO
{
	public function incluir($entrada){
        try{
            extract($_REQUEST);
            $pdo = Conexao::connect();

            $sql = 'INSERT entrada(id_origem,id_almoxarifado,id_tipo,id_responsavel,data,hora,valor_total) VALUES( :id_origem,:id_almoxarifado,:id_tipo,:id_responsavel,:data,:hora,:valor_total)';
            $sql = str_replace("'", "\'", $sql);            
            $stmt = $pdo->prepare($sql);

            $id_origem = $entrada->get_origem()->getId_origem();
            
            $id_almoxarifado = $entrada->get_almoxarifado()->getId_almoxarifado();
            $id_tipo = $entrada->get_tipo()->getId_tipo();
            $id_responsavel = $entrada->get_responsavel();
            $data = $entrada->getData();
            $hora = $entrada->getHora();
            $valor_total = $entrada->getValor_total();

            $stmt->bindParam(':id_origem',$id_origem);
            $stmt->bindParam(':id_almoxarifado',$id_almoxarifado);
            $stmt->bindParam(':id_tipo',$id_tipo);
            $stmt->bindParam(':id_responsavel',$id_responsavel);
            $stmt->bindParam(':data',$data);
            $stmt->bindParam(':hora',$hora);
            $stmt->bindParam(':valor_total',$valor_total);

            $stmt->execute();
        } catch(PDOExeption $e){
            echo 'Error: <b>  na tabela produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }

    }
	
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
    public function listarUm($id)
        {
             try {
                $pdo = Conexao::connect();
                $sql = "SELECT id_entrada, data, hora, valor_total, id_responsavel FROM entrada where id_entrada = :id_entrada";
                $consulta = $pdo->prepare($sql);
                $consulta->execute(array(
                ':id_entrada' => $id,
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $entrada = new Entrada($linha['data'],$linha['hora'],$linha['valor_total'],$linha['id_responsavel']);
                $entrada->setId_entrada($linha['id_entrada']);
            }
            } catch (PDOException $e) {
                throw $e;
            }
            return $entrada;
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
    public function ultima(){
        $pdo = Conexao::connect();
        $sql = "SELECT MAX(id_entrada) as id_entrada FROM entrada";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            $ultima = array('id_entrada'=>$linha['id_entrada']);
        }
        return $ultima;
    }
}
?>
