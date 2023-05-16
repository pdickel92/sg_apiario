<?php

//verifica se foi digitado endereço diretamente ai redirecionar para apiario.php
if(!isset($_GET['dados'])){
header("location.apiario.php");
}


$busca = "%".trim($_GET['dados'])."%";
$dbh = new PDO('mysql:host=127.0.0.1;dbname=apiario','root','');
$sth = $dbh->prepare('SELECT * FROM 'apiario' WHERE 'DESCRICAO' LIKE:nome');
include("config_login.php");
?>



<!--//GET();
$sql = "SELECT * FROM apiario, $busca"; -->
