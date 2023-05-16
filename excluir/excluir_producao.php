<?php
session_start(); //inicio de sessão
if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
    header("location:index.php");                   // redirecionar usuario para index.php
   session_destroy();
}

$cod_producao = $_GET ["COD_PRODUCAO"]; //$cod_usuario recebe o campo cod_usuario
include("../config_login.php");

// abaixo o deletar banco  apiario//
$deletar="delete from producao where COD_PRODUCAO ='$cod_producao';";
$deleta_banco = mysqli_query($conecta,$deletar);

if($deleta_banco==1)
{
echo"<script>alert('Produção excluída com sucesso!')</script>";
echo"<script>window.location='../producao.php'</script>";
}
else
	echo"<script>alert('Tipo de caixa não pode ser excluído!')</script>";
	echo"<script>window.location='listar_usuarios.php'</script>";
?>