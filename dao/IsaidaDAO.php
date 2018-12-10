<?php
require_once'../classes/Isaida.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';
class IsaidaDAO
{
    //Consultar um utilizando o ID
    public function listarId($id_isaida){
        try{
            $pdo = Conexao::connect();
            $sql = "SELECT id_isaida,id_saida,id_produto,qtd,valor_unitario FROM isaida";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_isaida',$id_isaida);

            $stmt->execute();
            $isaidas = array();
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                $isaidas[]=array('id_isaida'=>$linha['id_isaida'], 'id_saida'=>$linha['id_saida'], 'id_produto'=>$linha['id_produto'], 'qtd'=>$linha['qtd'], 'valor_unitario'=>$linha['valor_unitario'],);
                }
        } catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
        return json_encode($isaidas);  
    }

}

?>