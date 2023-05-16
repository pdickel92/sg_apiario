<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produções </title>
    <link rel="stylesheet" href="css/estiloCat.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS DO MAPA DOS APIARIOS-->
    <style>
        #map {
            height: 400px;
            width: 400px;
        }
    </style>


</head>
<?php

include("config_login.php");
$exibe_colmeia = "SELECT producao.DESCRICAO,producao.DATA_COLETA,producao.QUANTIDADE, producao.CATEGORIA, producao.COD_PRODUCAO,
colmeia.DESC_COLMEIA AS colmeia,apiario.DESCRICAO AS apiario
FROM producao
INNER JOIN colmeia 
ON producao.COD_COLMEIA = colmeia.COD_COLMEIA
INNER JOIN apiario
ON producao.COD_APIARIO = apiario.COD_APIARIO
WHERE STATUS = 1;
"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_colmeia) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
// função mysqli_query retorna um valor inteiro ou TRUE se a query for bem sucedida ou false se a consulta for considerada ilegal ou não montada coretamente
?>

<body>
    <!-- MENU DE NAVEGAÇÃO RESPONSIVO-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container container_nav">

            <!--mostrar usuario e data-->
            <span class="navbar-text">Bem vindo: Fernando
            </span>
            <span class="navbar-text">Consulta de Produção
            </span>

            <!-------------------------------------BOTÃO QUE ABRE MENU RESPONSIVO  -------------------->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" style="cursor:pointer">
                <span class="navbar-toggler-icon">
                </span>
            </button>

            <!--ITENS DO BOTÃO-->
            <div class="navbar-collapse collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logoff.php">Desconectar </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="producao.php">Produção </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tarefas.php">Tarefas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apiario.php">Apiário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="colmeia.php">Colméia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rainha.php">Raínha</a>
                    </li>
                </ul>
            </div>
            <!--FINAL ITENS DO BOTÃO RESPONSIVO-->
        </div>
    </nav>


    <!-- INICIO CONTAINER DO LOGO--->
    <div class="container container-logo ">

        <!--inicio da linha 1----->
        <div class="row  mx-auto align-items-center l1">

            <!--coluna 1 linha 1------>
            <div class="col-12  mx-auto text-center img-responsive ">
                <div class="img">
                    <img class="logo" src="img/logo2.png" width="200px;" alt="img"> </img>
                </div>
            </div>

        </div>
        <!--final da linha 01--->
    </div>


    <!--CONTAINER TABELA DE DADOS-->
    <div class="container ct-tabela ">
        <div class="row linhaTAB  dt-responsive table-responsive ">
            <div class="col table-responsive">
                <table class=" table table-striped  ">
                    <thead class="table-dark    ">
                        <tr class="table-md   ">
                            <th scope="col">Descrição</th>
                            <th scope="col ">Categoria</th>
                            <th scope="col">Data da coleta</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Colmeia</th>
                            <th scope="col">Apiário</th>


                            <th scope="col">Ações</th>
                            <th scope="col">Detalhes</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-striped ">
                            <?php
                            while ($linha  = mysqli_fetch_array($resultado)) { ?>
                                <!--enquanto $linha receber função mysqli_fetch_array ($resultado)-->

                                <td><?php echo $linha['DESCRICAO']; ?></td>
                                <td><?php echo $linha['CATEGORIA']; ?></td>

                                <!--CONVERTER DATA PADRÃO BRASILEIRO-->
                                <?php $DATA = $linha['DATA_COLETA'];
                                $data_BR = implode("/", array_reverse(explode("-", $DATA)));
                                $desc_DATA_COLETA = $data_BR;
                                ?>

                                <td><?php echo $data_BR; ?></td>
                                <td><?php echo $linha['QUANTIDADE']; ?></td>
                                <td><?php echo $linha['colmeia']; ?></td>
                                <td><?php echo $linha['apiario']; ?></td>



                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#exclusao<?php echo $linha['COD_PRODUCAO']; ?>">
                                        <img src='img/desligar.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link " data-bs-target="#Edicao<?php echo $linha['COD_PRODUCAO']; ?>">
                                        <img src='img/editar.png' width='22px' height='22px'>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-target="#detalhes_AP<?php echo $linha['COD_PRODUCAO']; ?>">
                                        + detalhes
                                    </button>
                                </td>


                        </tr>

                        <!-- MODAL EXCLUSÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="exclusao<?php echo $linha['COD_PRODUCAO']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-danger text-white ">
                                        <h5 class="modal-title">Confirmar exclusão</h5>
                                    </div>
                                    <div class="modal-body bg-light ">


                                        <p>Ocultar esse registro: <b><?php echo $linha['DESCRICAO']; ?>
                                            </b> ? </p>

                                        <?php $id = $linha['COD_PRODUCAO']; ?>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='producao.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/producao_off.php?COD_PRODUCAO=<?php echo $id ?>"><button type="button" class="btn btn-danger 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- MODAL EDIÇÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="Edicao<?php echo $linha['COD_PRODUCAO']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-warning text-white ">
                                        <h5 class="modal-title">Edição de produção</h5>
                                    </div>
                                    <div class="modal-body bg-light ">

                                        <div class="col-md-12">

                                            <!--inicio formulario de cadastro-->
                                            <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_PRODUCAO.php">


                                                <!--PRODUTO-->
                                                <select class="form-control" name="produto">
                                                    <option value="selecione" selected>Selecione um produto</option>
                                                    <option class="prod" value="Mel">Mel (Kg) </option>
                                                    <option class="prod" value="Própolis">Própolis (Kg) </option>
                                                    <option class="prod" value="Cera">Cera (Kg) </option>
                                                    <option class="prod" value="Pólen"> Pólen (Kg)</option>
                                                    <option class="prod" value="Geléia Real">Geléia Real (Kg) </option>
                                                    <option class="prod" value="Apitoxina">Apitoxina (Mg)</option>
                                                    <option class="prod" value="Melato">Melato (Kg) </option>
                                                    <option class="prod" value="Hidromel">Hidromel (L) </option>
                                                </select>
                                                <br>



                                                <!--Apiario -->
                                                <?php
                                                $cod_apiario = "select DESCRICAO, COD_APIARIO FROM apiario"; //select recebe o texto 
                                                $result = mysqli_query($conecta, $cod_apiario)
                                                ?>

                                                <select class="form-control" name="APIARIO" class="tarefas" width="auto">
                                                    <option value="" selected>Selecione um Apiário </option>
                                                    <?php
                                                    while ($dados = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $dados['COD_APIARIO'] ?>">

                                                            <?php $pega_AP = $dados['COD_APIARIO']; ?>

                                                            <?php echo $dados['DESCRICAO'] ?>
                                                        <?php } ?>
                                                        </option>
                                                </select>
                                                <br>

                                                <?php $pega_AP; ?>
                                                <!--COLMEIA-->
                                                <?php
                                                $cod_colmeia = "select DESC_COLMEIA, COD_COLMEIA FROM colmeia "; //select recebe o texto 
                                                $result = mysqli_query($conecta, $cod_colmeia)
                                                ?>


                                                <select name="colmeia" class="form-control" width="auto">
                                                    <option value="selecione" selected>Selecione a colméia</option>
                                                    <?php
                                                    while ($dados = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $dados['COD_COLMEIA'] ?>">

                                                            <?php echo $dados['DESC_COLMEIA'] ?>
                                                        <?php } ?>
                                                        </option>
                                                </select>
                                                <br>

                                                <input type="number" class="form-control" required maxlength="30" name="QTD" placeholder="Quantidade" onfocus="this.value='';" />
                                               

                                            </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='producao.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/COLMEIA_off.php?COD_PRODUCAO=<?php echo $id ?>"><button type="button" class="btn btn-warning text-white 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL MAIS DETALHES DO APIÁRIO --->
                        <div class="modal   " id="detalhes_AP<?php echo $linha['COD_PRODUCAO']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  "><?php echo "Produção: " . $linha['DESCRICAO']; ?>
                                        </h5>
                                        <a href="colmeia.php"> <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button> </a>
                                    </div>

                                    <!--inicio corpo do modal-->
                                    <div class="modal-body" style="height:380px;">
                                        <div class="container">

                                            <!--LINHA 01 MODAL-->
                                            <div class="row" style="height:210px; ">
                                                <div class="col-md-10">

                                                    <br>


                                                    <br>
                                                    <hr width="100%">
                                                    </hr>

                                                </div>
                                            </div>

                                            <!--LINHA 02 MODAL-->
                                            <div class="row " style="background-color:whitesmoke;">
                                                <div class="col-md-4" style="background-color:whitesmoke;">

                                                </div>

                                                <div class="col-md-4">

                                                    <!--COLUNA QTD TAREFAS DENTRO LINHA 02-->
                                                    <h6><B>Tarefas </b></h6>

                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->
                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->


                                                </div>

                                                <div class="col-md-4" style="background-color:whitesmoke;">

                                                    <!--COLUNA QTD TAREFAS DENTRO LINHA 02-->
                                                    <h6><B>Tarefas </b></h6>

                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->
                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->


                                                    <img src="img/tarefas.png" width="45px" style="padding-top:15px;"></img>
                                                    <h6 style="color:blue;  font-weight:bold; font-size:60px; float:left; ">

                                                    </h6>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL LISTAR PRODUÇÃO POR COLMEIA --->
                        <div class="modal   " id="colmeia_AP<?php echo $linha['COD_PRODUCAO']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  ">
                                            <?php echo "Produção da colméia" ?>
                                        </h5>
                                        <a href="colmeia.php">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </a>
                                    </div>


                                    <!--inicio corpo do modal-->
                                    <div class="modal-body" style='background-color:whitesmoke'>
                                        <div class=" container">
                                            <div class="row ">
                                                <div class="col md-12 COL1 ">
                                                    <div clas="col-md-8" style='overflow-x:auto; max-height:300px;'>

                                                        <?php
                                                        $cod_col = $linha['COD_PRODUCAO'];

                                                        $sql_BUSCA_COLMEIA = "SELECT * FROM producao WHERE COD_COLMEIA = '$cod_col'";
                                                        $BUSCA_COLMEIA = mysqli_query($conecta, $sql_BUSCA_COLMEIA);
                                                        while ($teste = mysqli_fetch_array($BUSCA_COLMEIA)) {

                                                            //CONVERTER DATA PADRÃO BRASILEIRO
                                                            $DATA = $teste['DATA_COLETA'];
                                                            $data_BR = implode("/", array_reverse(explode("-", $DATA)));
                                                            $desc_DATA_COLETA  = $data_BR;

                                                            //ATRIBUIR VALORES DA BUSCA A VARIAVEIS
                                                            $desc_PROD     = $teste['DESCRICAO'];
                                                            $desc_CATEGORIA    = $teste['CATEGORIA'];
                                                            $desc_QUANTIDADE     = $teste['QUANTIDADE'];


                                                            //IMPRIMIR VALORES DA BUSCA
                                                            echo  "<B>Descrição:</B> " . $desc_PROD . "<BR>";
                                                            echo  "<B>Data coleta:</B> " . $data_BR  . "<BR>";
                                                            echo  "<B>Categoria:</B> " .  $desc_CATEGORIA . "<BR>";
                                                            echo  "<B>Quantidade:</B> " . $desc_QUANTIDADE;
                                                            echo "<hr width='100%'></hr>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL LISTAR TAREFAS POR APIÁRIO --->
                        <div class="modal   " id="tarefas_AP<?php echo $linha['COD_PRODUCAO']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  ">
                                            <?php echo "Colméias do Apiário" ?>
                                        </h5>
                                        <a href="apiario.php">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </a>
                                    </div>


                                    <!--inicio corpo do modal-->
                                    <div class="modal-body" style='background-color:whitesmoke'>
                                        <div class=" container">
                                            <div class="row ">
                                                <div class="col md-12 COL1 ">
                                                    <div clas="col-md-8" style='overflow-x:auto; max-height:300px;'>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>


<?php } ?>
<!-- encerra o php aberto lá em cima " while ($linha  = mysqli_fetch_array($resultado)) { ?>" -->
</tbody>
</table>



<!---CONTAINER ITENS DO RODAPE--->
<div class="container-fluid ">
    <div class="row fixed-bottom  linhacad ">

        <!--INICIO DA COLUNA1--->
        <div class="col-md-2 offset-md-1   ">

            <!--FORMULARIO DE PESQUISA--->
            <form class="d-flex img-responsive dt-responsive " action="" method="get">
                <input class="form-control  " name="pesquisar" type="text" />
                <button type="submit" class="btn btn-primary btn-sm  " data-bs-toggle="modal" data-bs-target="#pesquisa">
                    Buscar <img src='img/lupa.png' width='20px' height='20px' class=" img-responsive  ">
                </button>
            </form>
        </div>

        <!--INICIO DA COLUNA2--->
        <div class="col-md-3   ">
            <button type="button" class="btn  btn-dark btn-sm  btcad " data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                Adicionar <img src='img/add.png' width='22px' height='22px' class=" img-responsive ">
            </button>

        </div>


    </div>
</div>


<!-- FIM DO CÓDIGO --------------------------------------(ITENS VISIVEIS EM 1 PLANO)--------------------------------------------->


<!--MODAL DE CADASTRO DE PRODUCAO-->
<div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">

            <!--CABEÇALHO-->
            <div class="modal-header justify-content-center  bg-dark text-white ">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastro de produção</h5>
            </div>
            <!--CORPO-->
            <div class="modal-body">

                <div class="col-md-12">

                    <!--inicio formulario de cadastro-->
                    <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_PRODUCAO.php">


                        <!--PRODUTO-->
                        <select class="form-control" name="produto">
                            <option value="selecione" selected>Selecione um produto</option>
                            <option class="prod" value="Mel">Mel (Kg) </option>
                            <option class="prod" value="Própolis">Própolis (Kg) </option>
                            <option class="prod" value="Cera">Cera (Kg) </option>
                            <option class="prod" value="Pólen"> Pólen (Kg)</option>
                            <option class="prod" value="Geléia Real">Geléia Real (Kg) </option>
                            <option class="prod" value="Apitoxina">Apitoxina (Mg)</option>
                            <option class="prod" value="Melato">Melato (Kg) </option>
                            <option class="prod" value="Hidromel">Hidromel (L) </option>
                        </select>
                        <br>



                        <!--Apiario -->
                        <?php
                        $cod_apiario = "select DESCRICAO, COD_APIARIO FROM apiario"; //select recebe o texto 
                        $result = mysqli_query($conecta, $cod_apiario)
                        ?>

                        <select class="form-control" name="APIARIO" class="tarefas" width="auto">
                            <option value="" selected>Selecione um Apiário </option>
                            <?php
                            while ($dados = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $dados['COD_APIARIO'] ?>">

                                    <?php $pega_AP = $dados['COD_APIARIO']; ?>

                                    <?php echo $dados['DESCRICAO'] ?>
                                <?php } ?>
                                </option>
                        </select>
                        <br>

                        <?php $pega_AP; ?>
                        <!--COLMEIA-->
                        <?php
                        $cod_colmeia = "select DESC_COLMEIA, COD_COLMEIA FROM colmeia "; //select recebe o texto 
                        $result = mysqli_query($conecta, $cod_colmeia)
                        ?>


                        <select name="colmeia" class="form-control" width="auto">
                            <option value="selecione" selected>Selecione a colméia</option>
                            <?php
                            while ($dados = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $dados['COD_COLMEIA'] ?>">

                                    <?php echo $dados['DESC_COLMEIA'] ?>
                                <?php } ?>
                                </option>
                        </select>
                        <br>

                        <input type="number" class="form-control" required maxlength="30" name="QTD" placeholder="Quantidade" onfocus="this.value='';" />
                        <br>
                        <br>
                        <a href="producao.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                        <button type="submit" class="btn btn-primary" name="enviar">Adicionar</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


<!--MODAL RESULTADO DA CONSULTA --->
<div class=" modal  " id="pesquisa" tabindex="-1" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-lg   ">
        <div class="modal-content ">

            <!--inicio cabeçalho do modal-->
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fs-5" id="#">Tela de consulta</h4>
            </div>

            <!--inicio corpo do modal-->
            <div class="conteiner-fluid">
                <div class="modal-body  ">
                    <table class="table table-striped ">
                        <thead class="table-dark ">
                            <tr table>
                                <th scope="col ">Descrição</th>
                                <th scope="col ">Responsável</th>
                                <th scope="col ">Situação</th>
                                <th scope="col ">Ativação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-striped">

                                <?php

                                if (isset($_GET['pesquisar'])) {
                                    //$pesquisar = $_GET['pesquisar'];
                                }
                                //echo $teste;
                                $pesquisar = $_GET['pesquisar'];
                                $pesquisar;
                                $result = $SQL = "SELECT * FROM apiario WHERE DESCRICAO LIKE '%$pesquisar%' 
                                        OR RESPONSAVEL LIKE '%$pesquisar%' OR 'LOCAL' LIKE '%$pesquisar%'";
                                $resultado_apiario = mysqli_query($conecta, $result);

                                while ($linha = mysqli_fetch_array($resultado_apiario)) { ?>


                                    <td><?php echo $linha['DESCRICAO']; ?></td>
                                    <td><?php echo $linha['RESPONSAVEL']; ?></td>
                                    <td><?php echo $linha['SITUACAO']; ?></td>
                                    <?php
                                    $DATA = $linha['DATA_ATIVO'];
                                    $data_BR = implode("/", array_reverse(explode("-", $DATA)));
                                    ?>
                                    <td><?php echo $data_BR; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--MODAL MAPAS-->
<div class="modal fade" id="mapas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">

            <!--CABEÇALHO-->
            <div class="modal-header bg-dark text-white ">
                <h5 class="modal-title fs-5 mx-auto " id="exampleModalLabel">Localização dos Apiários</h5>
                <a href="apiario.php"> <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button> </a>
            </div>
            <!--CORPO-->
            <div class="modal-body">
                <div class="col-md-12">


                    <!--DIV QUE CONTÉM O MAPA-->
                    <div id="map">
                    </div>

                    <script>
                        function initMap() {

                            //OPÇÕES DO MAPA
                            var options = {
                                zoom: 12,
                                center: {
                                    lat: -28.286786,
                                    lng: -53.499586
                                }
                            }

                            //NOVO MAPA
                            var map = new
                            google.maps.Map(document.getElementById('map'), options);

                            //ADICIONAR O MARCADOR 1
                            var marker = new google.maps.Marker({
                                position: {
                                    lat: -28.266741,
                                    lng: -53.498730
                                },
                                map: map
                            });

                            //ADICIONAR O MARCADOR 2
                            var marker = new google.maps.Marker({
                                position: {
                                    lat: -28.327455,
                                    lng: -53.519828
                                },
                                map: map
                            });

                            //NOVA JANELA DE INFORMAÇÃO DOS MARCADORES
                            var fritsch = new google.maps.InfoWindow({
                                content: '<h2> Descrição marcador </h2>'
                            });

                            marker.addListener('click', function() {
                                info.fritsch.open(map, marker);
                            });

                            //NOVA JANELA DE INFORMAÇÃO DOS MARCADORES
                            var fritsch = new google.maps.InfoWindow({
                                content: '<h2> Descrição marcador </h2>'
                            });

                            marker.addListener('click', function() {
                                info.fritsch.open(map, marker);
                            });

                        }
                    </script>

                    <!-- MINHA CHAVE API MAPS-->
                    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE2VreFC7Urptz-GeKO7bJdEzm546VlDE&callback=initMap">
                    </script>



                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>