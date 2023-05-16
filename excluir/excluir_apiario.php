<?php
//session_start(); //inicio de sessão
//if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
  //  header("location:index.php");                   // redirecionar usuario para index.php
  // session_destroy();
//}


//filter_input(INPUT_GET,'COD_APIARIO',FILTER_SANITIZE_NUMBER_INT);

//CHAMAR ARQUIVO DE CONEXÃO B.D
include("../config_login.php");

//RECEBE O COD_APIARIO POR GET
$cod_apiario = $_GET["COD_APIARIO"]; 

//VERIFICAR SE COD_APIARIO TEM UMA COLMEIA ASSOCIADA
$verifca_existencia_AP = "SELECT * FROM COLMEIA WHERE COD_APIARIO = '$cod_apiario'";
$existencia_AP = mysqli_query($conecta,$verifca_existencia_AP);
if ($existencia_AP >0) {
  echo "Não é possível excluir, remova Colméias associadas!";
  echo"<script>window.location='../apiario.php'</script>";

 }
else{
  // abaixo o deletar banco  apiario//
  $deletar="delete from apiario where COD_APIARIO ='$cod_apiario'";
  $deleta_banco = mysqli_query($conecta,$deletar);

  if($deleta_banco==1)
  {
    //echo $cod_apiario;
  echo"<script>alert('Apiário excluído com sucesso!')</script>";
  echo"<script>window.location='../apiario.php'</script>";
  }
  else
    echo"<script>alert('Apiário não pode ser excluído!')</script>";
    echo"<script>window.location='apiario.php'</script>";
}
?>