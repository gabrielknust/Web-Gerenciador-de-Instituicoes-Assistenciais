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
    public function listarUm($id_tipo)
    {
        try{
            $pdo = Conexao::connect();
            $sql = "SELECT id_tipo,descricao  FROM tipo_entrada WHERE id_tipo = :id_tipo";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                'id_tipo' => $id_tipo,
            ));
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $tipo_entrada = new TipoEntrada($linha['descricao']);
                $tipo_entrada->setId_tipo($linha['id_tipo']);
            }
        }catch(PDOExeption $e){
            throw $e;
        }
        return $tipo_entrada;
    }
        public function excluir($id_tipo)
	    {
	        try {
	            $sql = 'DELETE from tipo_entrada WHERE id_tipo = :id_tipo';
	            $sql = str_replace("'", "\'", $sql);
	            $acesso = new Acesso();
	            
	            $pdo = $acesso->conexao();
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $stmt = $pdo->prepare($sql);
	            
	            $stmt->bindParam(':id_tipo', $id_tipo);
	            
	            $stmt->execute();
	        } catch (PDOException $e) {
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