<?php

//INICIO DE UMA SESSÃO
//SESSION_START();


$USER =$_POST["USUARIO"];
$SENHA=$_POST["SENHA"]; 

include ("config_login.php"); //incluir o arquivo de verificação de conexão do B.D

$verifica_login = "SELECT * FROM USUARIO WHERE USUARIO='$USER' and SENHA='$SENHA'";
$verifica_login = mysqli_query($conecta,$verifica_login); // conexão ao banco de dados

$valor = mysqli_num_rows($verifica_login); // 
if ($valor>0){
    $_SESSION['USUARIO_LOGIN'] = true;
    header("location:principal.php");
    echo"<script>alert('USUARIO CONECTADO');</script>";
    //echo"<script>window.location= 'principal.php'</script>";
    }
    else{
    echo"<script>alert('Usuario ou senha invalidos!');</script>";
    echo"<script>window.location= 'index.php'</script>";
    }
    mysqli_close($conecta);
    exit;
?>