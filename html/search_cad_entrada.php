<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'wegia';


//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get matched data from skills table
$data = array();
$query = $db->query("SELECT descricao FROM produto ORDER BY descricao ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['descricao'];
}
//return json data
session_start();
$_SESSION['autocomplete'] = json_encode($data);
header('Location: cadastro_entrada.php');
?>