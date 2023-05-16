<?php
$cod_apiario = $_GET ["COD_APIARIO"]; //$cod_usuario recebe o campo cod_usuario
include("../config_login.php");


// abaixo o deletar banco  apiario//
$deletar="delete from apiario where COD_APIARIO ='$cod_apiario';";
$deleta_banco = mysqli_query($conecta,$deletar);

echo "Deseja excluir o registro?";
echo "<a href='excluir_apiario.php?COD_APIARIO=$id'> Sim</a>";
echo "<a href='../apiario.php'>Não</a>";

//if()


//if($deleta_banco==1)
//{
//echo"<script>alert('Apiário excluído com sucesso!')</script>";
//echo"<script>window.location='../apiario.php'</script>";
//}
//else
	//echo"<script>alert('Apiário não pode ser excluído!')</script>";
	//echo"<script>window.location='apiario.php'</script>";
//?>
