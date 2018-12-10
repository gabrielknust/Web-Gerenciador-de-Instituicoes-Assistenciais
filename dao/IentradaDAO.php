<?php
require_once'../classes/Ientrada.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';
class IentradaDAO
{
    //Consultar um utilizando o ID
    public function listarId($id_ientrada){
        try{
            $pdo = Conexao::connect();
            $sql = "SELECT id_ientrada,id_entrada,id_produto,qtd,valor_unitario FROM ientrada";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_ientrada',$id_ientrada);

            $stmt->execute();
            $ientradas = array();
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                $ientradas[]=array('id_ientrada'=>$linha['id_ientrada'], 'id_entrada'=>$linha['id_entrada'], 'id_produto'=>$linha['id_produto'], 'qtd'=>$linha['qtd'], 'valor_unitario'=>$linha['valor_unitario'],);
                }
        } catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
        return json_encode($ientradas);  
    }

}

?>