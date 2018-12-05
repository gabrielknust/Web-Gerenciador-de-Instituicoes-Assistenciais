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

        public function listarUm($id)
        {
             try {
                $pdo = Conexao::connect();
                $sql = "SELECT id_categoria_produto, descricao_categoria  FROM categoria_produto where id_categoria_produto = :id_categoria_produto";
                $consulta = $pdo->prepare($sql);
                $consulta->execute(array(
                ':id_categoria_produto' => $id,
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria($linha['descricao_categoria']);
                $categoria->setId_categoria_produto($linha['id_categoria_produto']);

            }
            } catch (PDOException $e) {
                throw $e;
            }
            return $categoria;
        }

        public function excluir($id_categoria_produto){
    	    try{
                $pdo = Conexao::connect();
                $sql = 'DELETE FROM categoria_produto WHERE id_categoria_produto = :id_categoria_produto';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_categoria_produto',$id_categoria_produto);
                $stmt->execute();
                
            }catch (PDOException $e) {
                    echo 'Error: <b>  na tabela categoria_produto = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            }
        }
    	public function listarTodos(){

            try{
                $categorias=array();
                $pdo = Conexao::connect();
                $consulta = $pdo->query("SELECT id_categoria_produto, descricao_categoria FROM categoria_produto");
                $x=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $categorias[$x]=array('id_categoria_produto'=>$linha['id_categoria_produto'],'descricao_categoria'=>$linha['descricao_categoria']);
                    $x++;
                }
                } catch (PDOExeption $e){
                    echo 'Error:' . $e->getMessage;

                }
                return json_encode($categorias);
            }

    	    
        }

?>