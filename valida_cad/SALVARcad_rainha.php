<link href="../css/validaCAD.css" rel="stylesheet"></link>
<?php

	//session_start(); //inicio de sessão
	//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
		//header("location:../index.php");                   // redirecionar usuario para index.php
	// session_destroy();
	//}

	

	//SELECT ULTIMO REGISTRO TABELA APIARIO
	include('../config_login.php');
			
		$desc_RAINHA = $_POST['DESCRICAO_RAINHA'];

		$STATUS = 1;
		date_default_timezone_set('America/Sao_Paulo');
		$dt_ativo = date('Y/m/d');	
		
		$sitRAINHA = $_POST['situacao'];
		$origem = $_POST['origem'];
		$OBS = $_POST['OBS'];

	
		$insercao = mysqli_query($conecta, "INSERT into rainha values('$dt_ativo','$desc_RAINHA','$OBS','','$sitRAINHA','$origem','$STATUS')") or die("Falha ao inserir um novo registro!");

		if($insercao==1)
		{
			//echo "<script>alert('Raínha adicionada com sucesso!');</script>";
			echo "<script>window.location = '../rainha.php'</script>";	
		}
			//coloquei só um if,já que se der erro, acusa no php		

		mysqli_close($conecta);
?>