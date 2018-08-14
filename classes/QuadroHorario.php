<?php

class QuadroHorario
{

    private $idfuncionario;

    private $tipo;

    private $carga_mensal;

    private $primeira_entrada;

    private $primeira_saida;

    private $segunda_entrada;

    private $segunda_saida;

    private $carga_diaria;

    private $dias_trabalhados;

    private $folgas;

   
    // Insert
    public function incluir($tipo, $carga_mensal, $primeira_entrada, $primeira_saida, $segunda_entrada, $segunda_saida, $carga_diaria, $dias_trabalhados, $folgas, $observacoes)
    {
        try {
            $sql = 'INSERT quadro_horario (tipo, carga_mensal, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, carga_diaria,dias_trabalhados,folgas,observacoes) VALUES (:tipo, :carga_mensal, :primeira_entrada, :primeira_saida, :segunda_entrada, :segunda_saida, :carga_diaria, :dias_trabalhados, :folgas, :observacoes)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':escala', $escala);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':carga_horaria', $carga_horaria);
            $stmt->bindParam(':entrada1', $entrada1);
            $stmt->bindParam(':saida1', $saida1);
            $stmt->bindParam(':entrada2', $entrada2);
            $stmt->bindParam(':saida2', $saida2);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':dias_trabalhados', $dias_trabalhados);
            $stmt->bindParam(':folga', $folga);
            $stmt->bindParam(':observacoes', $observacoes);
                        
            $stmt->execute();

            $this->consultar("select max(id_quadro_horario) as idQH from quadro_horario");
            $linha = $this->Linha;
            $rs = $this->Result;
            $id_quadro_horario = $rs[0]['idQH'];

        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }

        return $id_quadro_horario;
    }

    // excluir
    public function excluir($id_quadro_horario)
    {
        try {
            $sql = 'DELETE from cargo WHERE id_quadro_horario = :id_quadro_horario';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_quadro_horario', $id_quadro_horario);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela quadro_horario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Editar
    public function alterar($idfuncionario, $tipo, $carga_mensal, $primeira_entrada, $primeira_saida, $segunda_entrada, $segunda_saida, $carga_diaria, $dias_trabalhados, $folgas)
    {
        try {
            $sql = 'update quadro_horario set idfuncionario=:idfuncionario,tipo=:tipo, carga_mensal=:carga_mensal, primeira_entrada=:primeira_entrada, primeira_saida=:primeira_saida, segunda_entrada=:segunda_entrada, segunda_saida=:segunda_saida,carga_diaria=:carga_diaria,dias_trabalhados=:dias_trabalhados,folgas=:folgas';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':carga_mensal', $carga_mensal);
            $stmt->bindParam(':primeira_entrada', $primeira_entrada);
            $stmt->bindParam(':primeira_saida', $primeira_saida);
            $stmt->bindParam(':segunda_entrada', $primeira_entrada);
            $stmt->bindParam(':segunda_saida', $segunda_saida);
            $stmt->bindParam(':carga_diaria', $carga_diaria);
            $stmt->bindParam(':dias_trabalhados', $dias_trabalhados);
            $stmt->bindParam(':folgas', $folgas);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    public function consultar($sql)
    {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
}

