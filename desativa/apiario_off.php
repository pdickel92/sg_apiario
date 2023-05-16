
<?php

  //session_start(); //inicio de sessão
  //if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
  //header("location:index.php");                   // redirecionar usuario para index.php
  //session_destroy();
  //} 

  //RECEBE O COD_APIARIO POR GET
  $cod_APIARIO = $_GET["COD_APIARIO"];
  
  //CONEXÃO B.D
  include("../config_login.php");
  
  // DATA PADRÃO AMERICANO
  $data_atual = date('Y/m/d'); 

  //COLOCA O APIARIO COMO DESATIVADO
  $SQL = "UPDATE  apiario SET SITUACAO= 0 WHERE COD_APIARIO ='$cod_APIARIO'";
  $INATIVA_AP = mysqli_query($conecta, $SQL);

  //COLOCA STATUS DA COLMEIA COMO DESATIVADA
  $SQL_COLMEIA = "UPDATE    colmeia SET STATUS= 0 WHERE COD_APIARIO = '$cod_APIARIO'";
  $INATIVA_AP = mysqli_query($conecta, $SQL_COLMEIA);

   //DEFINE DATA DE INATIVAÇÃO COLMEIA   
   $SQL_DATA_INATIVA_COLM = "UPDATE  colmeia SET DATA_INATIVACAO = '$data_atual' WHERE COD_APIARIO = '$cod_APIARIO'";
   $DATA_INATIVA_COLM = mysqli_query($conecta, $SQL_DATA_INATIVA_COLM);
  

  
  //abaixo teste para inserir data do sistema no campo dt_inativo//
  //$insere_data="INSERT INTO  DT_INATIVO VALUES= '$data_atual' WHERE COD_APIARIO ='$cod_APIARIO'";
  //$insere = mysqli_query($conecta,$insere_data); 
  //acima teste para inserir data do sistema no campo dt_inativo//

  if ($INATIVA_AP == 1) {
    echo "<script>alert('Apiário mudou seu status para 'Desativado!'')</script>";
    echo "<script>window.location='../apiario.php'</script>";
  } else
    echo "<script>alert('Tarefa não pode ser excluído!')</script>";
  	echo"<script>window.location='apiario.php'</script>";
?>



