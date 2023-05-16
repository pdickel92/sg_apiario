<?php

//session_start(); //inicio de sessão
//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
//header("location:index.php");                   // redirecionar usuario para index.php
//session_destroy();
//}

// PEGAR DATA E CONCATENAR COM STRING
date_default_timezone_set('America/Sao_Paulo');
$data_SISTEMA = date('Y/m/d');

$STATUS = 1;

//SELECT ULTIMO REGISTRO TABELA APIARIO
include('../config_login.php');
$consulta_ID = mysqli_query($conecta, "select COD_PRODUCAO from producao ORDER BY COD_PRODUCAO DESC ");
$ID 	  = mysqli_num_rows($consulta_ID);


//SOMA AO ÚLTIMO CÓDIGO +1
$ID = $ID + 1;

//CONCATENA STRING COM $ID
$codigo = "Prod" . $ID;
$desc_prod = $codigo;

$STATUS = 1;
$dt_ativo = date('Y/m/d');


//recebe dados do formulario de cadastro pelo metodo POST

$produto 		    = $_POST["produto"];
$qtd		        = $_POST["QTD"];
$colmeia	        = $_POST["colmeia"];
$apiario		    = $_POST["APIARIO"];

include("../config_login.php");


	$insercao = mysqli_query($conecta, "INSERT into producao values('$desc_prod','$data_SISTEMA','$qtd','','$produto','$colmeia','$apiario')") or die("Falha ao inserir um novo registro!");

	if ($insercao == 1) {
		//echo "<script>alert('Nova produção adicionada com sucesso!');</script>";
		echo "<script>window.location = '../producao.php'</script>";
	}
	//coloquei só um if,já que se der erro, acusa no php


mysqli_close($conecta);
