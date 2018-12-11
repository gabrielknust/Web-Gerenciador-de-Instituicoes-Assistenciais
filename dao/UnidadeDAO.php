<?php
require_once'../classes/Unidade.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class UnidadeDAO
{
    public function incluir($unidade_produto)
    {        
        try {
        	$pdo = Conexao::connect();

            $sql = 'INSERT unidade(descricao_unidade) VALUES(:descricao_unidade)';
            $sql = str_replace("'", "\'", $sql);            
 
            $stmt = $pdo->prepare($sql);

            $descricao_unidade=$unidade_produto->getDescricao_unidade();

            $stmt->bindParam(':descricao_unidade',$descricao_unidade);

            $stmt->execute();
        }catch (PDOExeption $e) {
            echo 'Error: <b>  na tabela unidade_produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    public function listarUm($descricao_unidade)
    {
        $descricao_unidade = "%" . $descricao_unidade . "%";
            try{
                $pdo = Conexao::connect();
                $sql = "SELECT descricao_unidade FROM unidade WHERE descricao_unidade LIKE :descricao_unidade";
                $consulta = $pdo->prepare($sql);
                $consulta->execute(array(
                    ':descricao_unidade' => $descricao_unidade
                ));
                $unidades = Array();
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $unidade = new Unidade($descricao_unidade);
                    $unidades[] = $unidade;
                }
            }catch (PDOExeption $e){
                echo 'Error: ' .  $e->getMessage();
            }
            return $unidades;
    }

        public function excluir($id_unidade)
	    {
	        try {
                $pdo = Conexao::connect();
	            $sql = 'DELETE from unidade WHERE id_unidade = :id_unidade';
	            $stmt = $pdo->prepare($sql);
	            $stmt->bindParam(':id_unidade',$id_unidade);
                $stmt->execute();
	        } catch (PDOException $e) {
	            echo 'Error: <b>  na tabela unidade_produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
	        }
	    }
	    public function listarTodos(){

        try{
            $unidades=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id_unidade, descricao_unidade FROM unidade");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $unidades[$x]=array('id_unidade'=>$linha['id_unidade'],'descricao_unidade'=>$linha['descricao_unidade']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($unidades);
        }
}
?>