<?php
header("Content-Type: text/html; charset=utf-8",true);

//faz conexão com o servidor mysql
$servidor ="localhost";                       //servidor
$usuario_server = "root";                     //usuario
$senha_server ="";                            // senha 
$banco_de_dados ="apiario";                   //nome da base de dados


// parametros da conexão do BD, para as variaveis

$conecta =mysqli_connect($servidor,$usuario_server,$senha_server,$banco_de_dados);
if(!$conecta){
  echo "Falha ao conectar a base de dados";}
//else{
//echo"Conectado";}

//variavel conecta recebe função "mysql_connect" com as variaveis passadas acima
//se conecta falhar, imprime uma mensagem de erro


?>