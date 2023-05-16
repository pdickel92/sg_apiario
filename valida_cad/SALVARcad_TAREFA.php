<?php

	//session_start(); //inicio de sessão
	//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
		//header("location:index.php");                   // redirecionar usuario para index.php
	//session_destroy();
	//}

	// PEGAR DATA E CONCATENAR COM STRING
	date_default_timezone_set('America/Sao_Paulo');
	$data_SISTEMA = date('His');
	$id_tarefa = ("Tar".$data_SISTEMA);
	$id_tarefa;
	$desc =	$id_tarefa;	 

	//recebe dados do formulario de cadastro pelo metodo POST
	$data_tarefa	    = $_POST["data"];
	$obs		        = $_POST["OBS"];
	$catTAREFA	        = $_POST["CATEGORIA"];
	$prior		        = $_POST["prior"];
	$apiario	        = $_POST["APIARIO"];
	$tar_status         = $_POST['status'];

	$data_tarefa_br = implode("/",array_reverse(explode("-",$data_tarefa))); //data nova
	$DATA_ATUAL = date('d/m/Y'); //
	//echo$DATA_ATUAL;
	//echo$data_tarefa_br;

	//if( $data_tarefa_br > $DATA_ATUAL){

	$tar_status = 1;

	include("../config_login.php");

	$consulta_registro = mysqli_query($conecta, "select * from tarefa where DESC_TAREFA = '$desc'");
	$valor 	  = mysqli_num_rows($consulta_registro);  

	//valor recebe 0 se não tem ninguem com o cpf informado no formulário
	//valor recebe 1 se existe um usuário cadastrado

	if ($valor >0){
		echo"<script>alert('Registro já cadastrado!');</script>";
			echo "<script>window.history.go(-1);</script>";
	}
	else{
		
		$insercao = mysqli_query($conecta, "INSERT into tarefa values('$desc','$data_tarefa','$obs','','$catTAREFA','$prior','$apiario','$tar_status')") or die("Falha ao inserir um novo registro!");

		if($insercao==1)
		{
			//echo "<script>alert('Tarefa cadastrada com sucesso!');</script>";
			echo "<script>window.location = '../tarefas.php'</script>";
	
		}
			//coloquei só um if,já que se der erro, acusa no php
		}
		

	//aqui fecha o primeiro if lá em cima

	//}
	//else {
		//echo "<script>alert('Informe uma data superior a data atual!');</script>";	
	//}
		
		mysqli_close($conecta);
	?>
