<?php

//verifica se foi digitado endereço diretamente ai redirecionar para apiario.php
//if(!isset($_GET['dados'])){
//header("location.apiario.php");
//}
include("../config_login.php");
$pesquisar = $_POST['pesquisar'];
$result = $SQL = "SELECT * FROM lista_colmeia WHERE CAIXA LIKE '%$pesquisar%' 
OR 'LOCAL' LIKE '%$pesquisar%' OR DESC_RAINHA LIKE '%$pesquisar%' OR DATA_INSTALACAO LIKE '%pesquisar%' OR DESC_COLMEIA LIKE '%$pesquisar%'
OR ESPECIE LIKE '%$pesquisar%' OR SITUACAO LIKE '%$pesquisar%' OR ORIGEM LIKE '%$pesquisar%'";
$resultado_apiario = mysqli_query($conecta, $result);


while ($linha = mysqli_fetch_array($resultado_apiario)) {

    //ECHO mysqli_fetch_array($resultado_apiario);     ------------TESTE
    //ECHO $resultado_apiario; ---------------------TESTE

    echo "Descrição" . $linha['DESC_RAINHA'] . "<br>";
    echo "Situação" . $linha['DATA_INSTALACAO'] . "<br>";
    echo "Instalação" . $linha['DESC_COLMEIA'] . "<br>";
    echo "Caixa" . $linha['ESPECIE'] . "<br>";
    echo "Enxame" . $linha['SITUACAO'] . "<br>";
    echo "Caixa" . $linha['ORIGEM'] . "<br>";
    
}



//----------------------------------PHP TESTE-------------------------------------------------------->

//while ($linha  = mysqli_fetch_array($resultado)) //enquanto $linha receber função mysqli_fetch_array ($resultado)
//{
  //  $desc_apiario     = $linha["DESCRICAO"];
    //$desc_LOCAL       = $linha["LOCAL"];
    //$resp             = $linha["RESPONSAVEL"];
    //$apSTATUS         = $linha["SITUACAO"];
    //$CODapiario       = $linha["COD_APIARIO"];

    //abaixo mistura código em html com php

    //echo "<tr> <td>" . $desc_apiario . "</td>";
    //echo "<td>" . $desc_LOCAL . "</td>";
    //echo "<td>" . $resp . "</td>";
    //echo "<td>" . $apSTATUS . "</td>";
    //echo "<td>
                                               // <a href='muda_status/mudaSTATUS_apiario.php?COD_APIARIO=$CODapiario'><img src='img/confirma.png' width='20px' height='20px'></img></a>
                                                //<a href=excluir/excluir_apiario.php?COD_APIARIO=$CODapiario'><img src='img/excluir.png' width='20px' height='20px'></img></a>
                                               // <a href='editar/editar_apiario.php?COD_APIARIO=$CODapiario'><img src='img/editar.png' width='20px' height='20px'></img></a>

                                               // </td></tr>";
//}

//----------------------------------FINAL PHP TESTE-------------------------------------------------------->



//$busca = "%".trim($_GET['dados'])."%";
//$dbh = new PDO('mysql:host=127.0.0.1;dbname=apiario','root','');
//$sth = $dbh->prepare('SELECT * FROM 'apiario' WHERE 'DESCRICAO' LIKE:nome');
//include("config_login.php");
?>



<!--//GET();
$sql = "SELECT * FROM apiario, $busca"; -->