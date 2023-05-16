
<?php
//session_start(); //inicio de sessão
//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
  // header("location:index.php");                   // redirecionar usuario para index.php
  //session_destroy();
//} 

$cod_TAREFA = $_GET["COD_PRODUCAO"]; //$cod_usuario recebe o campo cod_usuario
include("../config_login.php");

$deletar="UPDATE  producao SET STATUS= '0' WHERE COD_PRODUCAO ='$cod_TAREFA'";
$deleta_banco = mysqli_query($conecta,$deletar);

if($deleta_banco==1)
{
//echo"<script>alert('Tarefa mudou seu status para 'finalizada!'')</script>";
echo"<script>window.location='../producao.php'</script>";
}
else
	echo"<script>alert('Tarefa não pode ser excluído!')</script>";
//	echo"<script>window.location='listar_usuarios.php'</script>";
?>



