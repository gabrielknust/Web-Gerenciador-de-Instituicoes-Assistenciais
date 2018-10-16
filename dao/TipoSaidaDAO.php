<?php
require_once'../classes/TipoSaida.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class TipoSaidaDAO
{
    public function incluir($tipo_saida)
    {        
        try {
        	$pdo = Conexao::connect();

            $sql = 'INSERT tipo_saida(descricao) VALUES(:descricao)';
            $sql = str_replace("'", "\'", $sql);            
 
            $stmt = $pdo->prepare($sql);

            $descricao=$tipo_saida->getDescricao();

            $stmt->bindParam(':descricao',$descricao);

            $stmt->execute();
        }catch (PDOExeption $e) {
            echo 'Error: <b>  na tabela tipo_saida = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
        public function excluir($id_tipo)
	    {
	        try {
	            $sql = 'DELETE from tipo_saida WHERE id_tipo = :id_tipo';
	            $sql = str_replace("'", "\'", $sql);
	            $acesso = new Acesso();
	            
	            $pdo = $acesso->conexao();
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $stmt = $pdo->prepare($sql);
	            
	            $stmt->bindParam(':id_tipo', $id_tipo);
	            
	            $stmt->execute();
	        } catch (PDOException $e) {
	            echo 'Error: <b>  na tabela tipo_saida = ' . $sql . '</b> <br /><br />' . $e->getMessage();
	        }
	    }
	    public function listarTodos(){

        try{
            $tiposaidas=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id_tipo, descricao FROM tipo_saida");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $tiposaidas[$x]=array('id_tipo'=>$linha['id_tipo'],'descricao'=>$linha['descricao']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($tiposaidas);
        }
}
?>