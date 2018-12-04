<?php
require_once'../classes/Origem.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class OrigemDAO
{
    public function incluir($origem)
    {        
        try {
        	$pdo = Conexao::connect();

            $sql = 'INSERT origem(nome,cnpj,cpf,telefone) VALUES(:nome,:cnpj,:cpf,:telefone)';
            $sql = str_replace("'", "\'", $sql);            
 
            $stmt = $pdo->prepare($sql);

            $nome=$origem->getNome();
            $cnpj=$origem->getCnpj();
            $cpf=$origem->getCpf();
            $telefone=$origem->getTelefone();

            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':cnpj',$cnpj);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':telefone',$telefone);

            $stmt->execute();
        }catch (PDOExeption $e) {
            echo 'Error: <b>  na tabela origem = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    public function listarUm($id_origem)
    {
        try{
            $pdo = Conexao::connect();
            $sql = "SELECT id_origem, nome, cnpj, cpf, telefone FROM origem WHERE id_origem = :id_origem";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                'id_origem' => $id_origem,
            ));
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $origem = new Origem($linha['nome'], $linha['cnpj'], $linha['cpf'],$linha['telefone']);
                $origem->setId_origem($linha['id_origem']);
            }
        }catch(PDOExeption $e){
            throw $e;
        }
        return $origem;
    }
        public function excluir($id_origem)
	    {
	        try {
	            $sql = 'DELETE from origem WHERE id_origem = :id_origem';
	            $sql = str_replace("'", "\'", $sql);
	            $acesso = new Acesso();
	            
	            $pdo = $acesso->conexao();
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $stmt = $pdo->prepare($sql);
	            
	            $stmt->bindParam(':id_origem', $id_origem);
	            
	            $stmt->execute();
	        } catch (PDOException $e) {
	            echo 'Error: <b>  na tabela origem = ' . $sql . '</b> <br /><br />' . $e->getMessage();
	        }
	    }
	    public function listarTodos(){

        try{
            $origens=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id_origem,nome,cnpj,cpf,telefone FROM tipo_saida");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $origens[$x]=array('id_origem'=>$linha['id_origem'],'nome'=>$linha['nome'],'cnpj'=>$linha['cnpj'],'cpf'=>$linha['cpf'],'telefone'=>$linha['telefone']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($origens);
        }

        public function listarId_Nome(){

            try{
            $origens=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id_origem,nome FROM origem");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $origens[$x]=array('id_origem'=>$linha['id_origem'],'nome'=>$linha['nome']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($origens);
        }
}
?>