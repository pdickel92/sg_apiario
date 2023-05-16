<?php
session_start(); //inicio de sessão
if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
    header("location:index.php");                   // redirecionar usuario para index.php
   session_destroy();
}
$cod_COLMEIA = $_GET ["COD_COLMEIA"]; //$cod_usuario recebe o campo cod_usuario
include("../config_login.php");

$deletar="delete from colmeia where COD_COLMEIA ='$cod_COLMEIA';";
$deleta_banco = mysqli_query($conecta,$deletar);

if($deleta_banco==1)
{
echo"<script>alert('Colméia excluída com sucesso!')</script>";
echo"<script>window.location='../colmeia.php'</script>";
}
else
	echo"<script>alert('Tipo de caixa não pode ser excluído!')</script>";
	echo"<script>window.location='listar_usuarios.php'</script>";
?>