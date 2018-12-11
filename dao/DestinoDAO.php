<?php
require_once'../classes/Destino.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class DestinoDAO
{
    public function incluir($destino)
    {        
        try {
        	$pdo = Conexao::connect();

            $sql = 'INSERT destino(nome,cnpj,cpf,telefone) VALUES(:nome,:cnpj,:cpf,:telefone)';
            $sql = str_replace("'", "\'", $sql);            
 
            $stmt = $pdo->prepare($sql);

            $nome=$destino->getNome();
            $cnpj=$destino->getCnpj();
            $cpf=$destino->getCpf();
            $telefone=$destino->getTelefone();

            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':cnpj',$cnpj);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':telefone',$telefone);

            $stmt->execute();
        }catch (PDOExeption $e) {
            echo 'Error: <b>  na tabela destino = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    public function listarUm($nome)
    {
        $nome = "%" . $nome . "%";
            try{
                $pdo = Conexao::connect();
                $sql = "SELECT nome FROM destino WHERE nome LIKE :nome";
                $consulta = $pdo->prepare($sql);
                $consulta->execute(array(
                    ':nome' => $nome
                ));
                $destinos = Array();
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $destino = new destino($nome);
                    $destinos[] = $destino;
                }
            }catch (PDOExeption $e){
                echo 'Error: ' .  $e->getMessage();
            }
            return $destinos;
    }

        public function excluir($id_destino)
	    {
            try{
                $pdo = Conexao::connect();
                $sql = 'DELETE FROM destino WHERE id_destino = :id_destino';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_destino',$id_destino);
                $stmt->execute();
                
            }catch (PDOException $e) {
                    echo 'Error: <b>  na tabela destino = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            }
	    }
	    public function listarTodos(){

        try{
            $destinos=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id_destino,nome,cnpj,cpf,telefone FROM destino");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $destinos[$x]=array('id_destino'=>$linha['id_destino'],'nome'=>$linha['nome'],'cnpj'=>$linha['cnpj'],'cpf'=>$linha['cpf'],'telefone'=>$linha['telefone']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($destinos);
        }
}
?>