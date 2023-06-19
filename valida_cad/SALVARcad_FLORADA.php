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
	
	$DESCRICAO              = $_POST["DESC_FLORADA"];
	$NOME_CIENTIFICO             = $_POST["NOME_CIENTIFICO"];
	$INICIO_FLORACAO             = $_POST["INICIO_FLORADA"];
	$FIM_FLORACAO              = $_POST["FIM_FLORADA"];
	
	include('../config_login.php');
		
		//VERIFICAÇÃO SE ALGUM REGISTRO JÁ EXISTE
		$consulta_registro = mysqli_query($conecta, "select * from florada where DESC_FLORADA = '$DESCRICAO'");
		$valor 	  = mysqli_num_rows($consulta_registro);


		if ($valor > 0) {
			echo "<script>alert('Registro já cadastrado!');</script>";
			//echo "<script>window.history.go(-1);</script>";
		} else {
			$insercao = mysqli_query($conecta, "INSERT into florada values('$DESCRICAO', '$NOME_CIENTIFICO','','$INICIO_FLORACAO','$FIM_FLORACAO' )") or die("Falha ao inserir um novo registro!");

			if ($insercao == 1) {
				echo "<script>window.location = '../floradas.php'</script>";
				//echo "<script>alert('Apiário adicionado com sucesso!');</script>";
			}
			//coloquei só um if,já que se der erro, acusa no php
		}
	mysqli_close($conecta);
?>
