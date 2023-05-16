<?php
session_start(); //inicio de sessão
//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
   // header("location:index.php");                   // redirecionar usuario para index.php
   //session_destroy();
//}
$cod_RAINHA = $_GET ["COD_RAINHA"]; //$cod_usuario recebe o campo cod_usuario
include("../config_login.php");
echo $cod_RAINHA;

/*$cod_colmeia = "select COD_COLMEIA from colmeia "; // $COD_COLMEIA = SELECT COD_COLMEIA FROM COLMEIA
$VERIFICA_COLMEIA = mysqli_query ($conecta,$cod_colmeia); // $verifica colmeia recebe lista dos codigos de colmeia

if ($VERIFICA_COLMEIA = $cod_RAINHA){
    echo"<script>alert('
    
    
    sucesso!')</script>";
}

$deletar="delete from rainha where COD_RAINHA ='$cod_RAINHA';";
$deleta_banco = mysqli_query($conecta,$deletar);

if($deleta_banco==1)
{
//echo"<script>alert('Raínha excluída com sucesso!')</script>";
echo"<script>window.location='../rainha.php'</script>";
}
else
    echo"<script>alert('Tipo de caixa não pode ser excluído!')</script>";
	echo"<script>window.location='../rainha.php'</script>";
    */
?>