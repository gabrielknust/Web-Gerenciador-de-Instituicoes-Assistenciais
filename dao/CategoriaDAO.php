<?php
require_once'../classes/Categoria.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';
class CategoriaDAO
{
    public function incluir($categoria)
        {        
            try {
            	$pdo = Conexao::connect();

                $sql = 'INSERT categoria_produto(descricao_categoria) VALUES( :descricao_categoria)';
                $sql = str_replace("'", "\'", $sql);            
        
                $stmt = $pdo->prepare($sql);

                $descricao_categoria=$categoria->getDescricaoCategoria();  
                $stmt->bindParam(':descricao_categoria',$descricao_categoria);

                $stmt->execute();
            }catch (PDOExeption $e) {
                echo 'Error: <b>  na tabela categoria_produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            }
        }

        public function excluir($id_categoria)
    	    {
    	        try {
    	            $sql = 'DELETE from categoria_produto WHERE id_categoria = :id_categoria';
    	            $sql = str_replace("'", "\'", $sql);
    	            $acesso = new Acesso();
    	            
    	            $pdo = $acesso->conexao();
    	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	            
    	            $stmt = $pdo->prepare($sql);
    	            
    	            $stmt->bindParam(':id_categoria', $id_categoria);
    	            
    	            $stmt->execute();
    	        } catch (PDOException $e) {
    	            echo 'Error: <b>  na tabela categoria_produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
    	        }
    	    }
    	public function listarTodos(){

            try{
                $categorias=array();
                $pdo = Conexao::connect();
                $consulta = $pdo->query("SELECT id_categoria, descricao_categoria FROM categoria_produto");
                $x=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $categorias[$x]=array('id_categoria'=>$linha['id_categoria'],'descricao_categoria'=>$linha['descricao_categoria']);
                    $x++;
                }
                } catch (PDOExeption $e){
                    echo 'Error:' . $e->getMessage;
                }
                return json_encode($categorias);
            }

    	    
        }

?>