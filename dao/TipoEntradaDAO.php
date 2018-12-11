<?php
require_once'../classes/TipoEntrada.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class TipoEntradaDAO
{
    public function incluir($tipo_entrada)
    {        
        try {
        	$pdo = Conexao::connect();

            $sql = 'INSERT tipo_entrada(descricao) VALUES(:descricao)';
            $sql = str_replace("'", "\'", $sql);            
 
            $stmt = $pdo->prepare($sql);

            $descricao=$tipo_entrada->getDescricao();

            $stmt->bindParam(':descricao',$descricao);

            $stmt->execute();
        }catch (PDOExeption $e) {
            echo 'Error: <b>  na tabela tipo_entrada = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    public function listarUm($descricao)
    {
        $descricao = "%" . $descricao . "%";
            try{
                $pdo = Conexao::connect();
                $sql = "SELECT descricao FROM tipo_entrada WHERE descricao LIKE :descricao";
                $consulta = $pdo->prepare($sql);
                $consulta->execute(array(
                    ':descricao' => $descricao
                ));
                $tipoentradas = Array();
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $tipoentrada = new TipoEntrada($descricao);
                    $tipoentradas[] = $tipoentrada;
                }
            }catch (PDOExeption $e){
                echo 'Error: ' .  $e->getMessage();
            }
            return $tipoentradas;
    }
        public function excluir($id_tipo)
	    {
	        try{
                $pdo = Conexao::connect();
                $sql = 'DELETE FROM tipo_entrada WHERE id_tipo = :id_tipo';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_tipo',$id_tipo);
                $stmt->execute();
                
            }catch (PDOException $e) {
                    echo 'Error: <b>  na tabela tipo_entrada = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            }
	    }
	    public function listarTodos(){

        try{
            $tipoentradas=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id_tipo, descricao FROM tipo_entrada");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $tipoentradas[$x]=array('id_tipo'=>$linha['id_tipo'],'descricao'=>$linha['descricao']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($tipoentradas);
        }
}
?>