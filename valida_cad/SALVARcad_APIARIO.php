<?php
	/*session_start(); //inicio de sessão
	if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
		header("location:index.php");                   // redirecionar usuario para index.php
	session_destroy(); 
	} */
	// PEGAR DATA E CONCATENAR COM STRING
	//date_default_timezone_set('America/Sao_Paulo');
	//$data_SISTEMA = date('His');
	//$id_tarefa = ("#A".$data_SISTEMA);
	//$id_tarefa;
	//recebe dados do formulario de cadastro pelo metodo POST


	$STATUS	                = $_POST["situacao"];
	$RESP		            = $_POST["RESPONSAVEL"];
	$dt_inativo             = $_POST["dt_inativo"];
	$dt_ativo               = $_POST["dt_ativo"];
	$LOCAL	                = $_POST["LOCAL"];
	$DESCRICAO              = $_POST["DESCRICAO"];
	$LATITUDE               = $_POST["LATITUDE"];
	$LONGITUDE              = $_POST["LONGITUDE"];



	//UPLOAD DE IMAGEM
	if (isset($_FILES['imagem'])) { //se recebido por $_files
		$arquivo = $_FILES['imagem'];
		$pasta = "../upload";
		$nome_do_arquivo = $arquivo['name'];
		$novo_nome_do_arquivo = uniqid();
		$extensao = strtolower(pathinfo($nome_do_arquivo, PATHINFO_EXTENSION));
		$caminho = $pasta . $novo_nome_do_arquivo . "." . $extensao;
		$upload = move_uploaded_file($arquivo['tmp_name'], $pasta . $novo_nome_do_arquivo . "." . $extensao);
	}

	//SELECT ULTIMO REGISTRO TABELA APIARIO
	include('../config_login.php');
		

		$STATUS = 1;
		$dt_ativo = date('Y/m/d');

		//inverter data padrão brasileiro 
		$data = implode("/", array_reverse(explode("-", $dt_ativo)));
		//include("../config_login.php");

		//VERIFICAÇÃO SE ALGUM REGISTRO JÁ EXISTE
		$consulta_registro = mysqli_query($conecta, "select * from apiario where ENDERECO = '$LOCAL' AND DESCRICAO = '$DESCRICAO'");
		$valor 	  = mysqli_num_rows($consulta_registro);


		if ($valor > 0) {
			echo "<script>alert('Registro já cadastrado!');</script>";
			//echo "<script>window.history.go(-1);</script>";
		} else {
			$insercao = mysqli_query($conecta, "INSERT into APIARIO values('','$DESCRICAO', '$RESP','$STATUS','$dt_ativo','$dt_inativo','$novo_nome_do_arquivo','$LATITUDE','$LONGITUDE','$caminho','$LOCAL' )") or die("Falha ao inserir um novo registro!");

			if ($insercao == 1) {
				echo "<script>window.location = '../apiario.php'</script>";
				//echo "<script>alert('Apiário adicionado com sucesso!');</script>";
			}
			//coloquei só um if,já que se der erro, acusa no php
		}
	mysqli_close($conecta);
?>
