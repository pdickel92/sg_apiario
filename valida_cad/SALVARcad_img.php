<?php 
INCLUDE ('../config_login.php');
if(isset($_FILES['imagem'])){
    $extensao = strtolower(substr($_FILES['imagem']['name'],-4)); //pega a extensão do arquivo
    $novo_nome = md5(time()).$extensao; //define o nome do arquivo
    $diretorio = "upload"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['imagem']['tmp_name'],$diretorio.$novo_nome); //efetua o upload

    //$sql_code="INSERT INTO codigo ('','teste',NOW())";

    $sql_code = mysqli_query($conecta,"INSERT INTO upload VALUES (1,'$novo_nome')"); 
    echo $sql_code;
   if($sql_code>0){
        echo "upload realizado";
    }
}

?>
<!-- $img = ;
filter_input($_FILES['imagem']);

INCLUDE ('../config_login.php');




$insercao = mysqli_query($conecta, "INSERT into APIARIO values('','$desc_apiario', '$RESP','$desc_local','$STATUS','$dt_ativo','$dt_inativo','$imagem' )") or die("Falha ao inserir um novo registro!");

if ($insercao == 1) {
    //echo "<script>window.location = '../apiario.php'</script>";
    //echo "<script>alert('Apiário adicionado com sucesso!');</script>";
    
}

?> 