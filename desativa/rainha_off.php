
<?php
//session_start(); //inicio de sessão
//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
  // header("location:index.php");                   // redirecionar usuario para index.php
  //session_destroy();
//} 

$cod_rainha = $_GET ["COD_RAINHA"]; //$cod_usuario recebe o campo cod_usuario
include("../config_login.php");

$rainha_off_sql=" UPDATE  rainha SET STATUS= '0' WHERE COD_RAINHA ='$cod_rainha'";
$rainha_off = mysqli_query($conecta,$rainha_off_sql);

if($rainha_off==1)
{
//echo"<script>alert('Tarefa mudou seu status para 'finalizada!'')</script>";
echo"<script>window.location='../rainha.php'</script>";
}
else
	//echo"<script>alert('Tarefa não pode ser excluído!')</script>";
//	echo"<script>window.location='listar_usuarios.php'</script>";
?>



