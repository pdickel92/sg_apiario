<?php

	//SELECT ULTIMO REGISTRO TABELA COLMEIA
	include('../config_login.php');
	
	$dt_ativo = date('Y/m/d');
	$dt_inativo = date('00/00/00');

	//inverter data padrão brasileiro 
	$data = implode("/", array_reverse(explode("-", $dt_ativo)));

	
	//recebe dados do formulario de cadastro pelo metodo POST
	$status                    = $_POST["STATUS"];
	$desccaixa                 = $_POST["caixa"];
	$enxame                    = $_POST["enxame"];
	$origem                    = $_POST["origem"];
	$rainha                    = $_POST["RAINHA"];
	$apiario                   = $_POST["APIARIO"];
	$desc_COLMEIA              = $_POST['DESCRICAO_COLMEIA'];
	
	$status = TRUE;

	//busca ocorrencia de rainha
	$consulta_rainha = mysqli_query($conecta, "select * from colmeia where COD_RAINHA = '$rainha'");	
	$valor2       = mysqli_num_rows($consulta_rainha);
	//valor recebe 0 se não tem ninguem com o cpf informado no formulário
	//valor recebe 1 se existe um usuário cadastrado

	
	if ($valor2 > 0) {
		echo "<script>alert('Registro já cadastrado!');</script>";
		//echo "<script>alert('Colméia adicionada com sucesso!');</script>";
		echo "<script>window.history.go(-1);</script>";

	} 
	else {
		$insercao = mysqli_query($conecta, "INSERT into colmeia values('$desc_COLMEIA','$dt_ativo','','$desccaixa','$enxame','$origem','$rainha','$apiario','$dt_inativo','$status')") or die("Falha ao inserir um novo registro!");

		if ($insercao == 1) {
			echo "<script>window.location = '../colmeia.php'</script>";
			echo "<script>alert('Colméia adicionada com sucesso!');</script>";
		}
		//coloquei só um if,já que se der erro, acusa no php
	}

	mysqli_close($conecta);
?>