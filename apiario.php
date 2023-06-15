<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produções </title>
    <link rel="stylesheet" href="css/estiloCat.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--CSS-->


</head>
<?php
include("config_login.php");
$exibe_apiario = "select * from apiario where SITUACAO = 1"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_apiario) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
// função mysqli_query retorna um valor inteiro ou TRUE se a query for bem sucedida ou false se a consulta for considerada ilegal ou não montada coretamente
?>

<body>
    <?php
    session_start(); //inicio de sessão
    if (!isset($_SESSION['USUARIO_LOGIN'])) { // se a sessão USUARIO_LOGIN não for encontrada
        header("location:index.php"); // redirecionar usuario para index.php
        session_destroy();
    }
    include("config_login.php");
    ?>

    <!-- menu de navegação responsivo-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container">

            <div class="d-flex align-items-center">
                <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                    style="cursor:pointer"><span class="navbar-toggler-icon"></span>
                </button>
                <a href="principal.php" class="ms-auto"> <img src="img/home1.png" width="37px" height="35px"></a>
            </div>
            <span class="navbar-text d-flex justify-content-center mx-auto">
                <text
                    style="font-family: 'Times New Roman', Times, serif; font-size: 25px; font-weight: bold; color: white;">Apiários</text>
            </span>

            <div class="navbar-text d-flex justify-content-end">
                <span class="me-3">Bem-vindo:
                    <?php echo $_SESSION['NOME_USUARIO']; ?>
                </span>
                <a href="logoff.php" class="nav-link">Sair</a>
            </div>

            <!--itens do botão-->
            <div class="navbar-collapse collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="producao.php">Produções </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tarefas.php">Minhas Tarefas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apiario.php">Apiários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="colmeia.php">Colméias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rainha.php">Raínhas</a>
                    </li>
                </ul>
                <!--FINAL ITENS DO BOTÃO RESPONSIVO-->
            </div>    
    </nav>
    <script>
        document.addEventListener('click', function (event) {
            var navbarMenu = document.getElementById('menu');
            var targetElement = event.target; // Elemento clicado

            // Verifica se o elemento clicado está dentro do menu
            var isClickedInsideMenu = navbarMenu.contains(targetElement);

            if (!isClickedInsideMenu) {
                // Remove a classe "show" para recolher o menu
                navbarMenu.classList.remove('show');
            }
        });
    </script>


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
                <table class=" table   ">
                    <thead class="table-dark    ">
                        <tr class="table-md   ">
                            <th scope="col">ID</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Ações</th>
                            <th scope="col">Detalhes</th>
                            <th scope="col">Relatórios</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-striped ">
                            <?php
                            while ($linha  = mysqli_fetch_array($resultado)) { ?>
                                <!--enquanto $linha receber função mysqli_fetch_array ($resultado)-->

                                <td><?php echo $linha['DESCRICAO']; ?></td>
                                <td><?php echo $linha['RESPONSAVEL']; ?></td>

                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#exclusao<?php echo $linha['COD_APIARIO']; ?>">
                                        <img src='img/excluir.png' width='22px' height='22px' alt="Excluir o Apiário?">
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link " data-bs-target="#Edicao<?php echo $linha['COD_APIARIO']; ?>">
                                        <img src='img/editar.png' width='22px' height='22px'>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-target="#detalhes_AP<?php echo $linha['COD_APIARIO']; ?>">
                                        + detalhes
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#colmeia_AP<?php echo $linha['COD_APIARIO']; ?>">
                                        <img src='img/colmeia.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#tarefas_AP<?php echo $linha['COD_APIARIO']; ?>">
                                        <img src='img/tarefas.png' width='22px' height='22px'>
                                    </button>
                                </td>

                        </tr>

                        <!-- MODAL EXCLUSÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="exclusao<?php echo $linha['COD_APIARIO']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-danger text-white ">
                                        <h5 class="modal-title">Confirmar exclusão</h5>
                                    </div>
                                    <div class="modal-body bg-light ">
                                        <p>Excluir o apiario: <b><?php echo $linha['DESCRICAO']; ?>
                                            </b> ? </p>
                                        <p><b>Endereço:</b> Rua
                                            <?php echo $linha['RUA'] . " número " . $linha['NUMERO'] . ", Bairro " . $linha['BAIRRO']; ?>
                                            <BR>
                                            <b>Cidade: </b><?php echo $linha['CIDADE'] ?>
                                        </p>
                                        <?php $id = $linha['COD_APIARIO']; ?>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='apiario.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/apiario_off.php?COD_APIARIO=<?php echo $id ?>"><button type="button" class="btn btn-danger 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- MODAL EDIÇÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="Edicao<?php echo $linha['COD_APIARIO']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-warning text-white ">
                                        <h5 class="modal-title">Edição de apiário</h5>
                                    </div>
                                    <div class="modal-body bg-light ">

                                        <div class="col-md-12">
                                            <!--FORMULARIO-->
                                            <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_APIARIO.php" enctype="multipart/form-data">

                                                <label class="form-text "><b>Localização do Apiário</b></label>

                                                <!--ITENS AGRUPADOS NA MESMA LINHA -->
                                                <div class=" form-inline mt-3">
                                                    <input type="text" class=" form-control " maxlength="50" name="CIDADE" placeholder="Cidade" onfocus="this.value='';" />
                                                    <input type="text" class=" form-control ml-3 " maxlength="50" name="BAIRRO" placeholder="Bairro" onfocus="this.value='';" />
                                                </div>


                                                <!--ITENS AGRUPADOS NA MESMA LINHA -->
                                                <div class="form-inline">
                                                    <input type="text" class=" form-control mt-2  " maxlength="50" name="RUA" placeholder="Rua" onfocus="this.value='';" />
                                                    <input type="number" class=" form-control ml-3 mt-2" maxlength="50" name="NUMERO" placeholder="Número" onfocus="this.value='';" />
                                                </div>


                                                <!--ITENS AGRUPADOS NA MESMA LINHA -->
                                                <div class="form-inline mt-2 ">
                                                    <input type="number" class=" form-control mt-2 " maxlength="50" name="LATITUDE" placeholder="Latitude" onfocus="this.value='';" />
                                                    <input type="number" class=" form-control ml-3 mt-2 " maxlength="50" name="LONGITUDE" placeholder="Longitude" onfocus="this.value='';" />
                                                </div>
                                                <BR>


                                                <input type="text" class="form-control  " required maxlength="30" name="RESPONSAVEL" placeholder="Informe o responsável " onfocus="this.value='';" />
                                                <input type="file" class="form-control mt-3 " accept="image/*" type="file" id="formFile" name="imagem">


                                                <input type="hidden" id="input" name="dt_inativo" />
                                                <input type="hidden" id="input" name="dt_ativo" />
                                                <input type="hidden" id="input" name="situacao" /><br>

                                            </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='apiario.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/apiario_off.php?COD_APIARIO=<?php echo $id ?>"><button type="button" class="btn btn-warning text-white 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL MAIS DETALHES DO APIÁRIO --->
                        <div class="modal   " id="detalhes_AP<?php echo $linha['COD_APIARIO']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog  modal-lg modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  "><?php echo "Apiário: " . $linha['DESCRICAO']; ?>
                                        </h5>
                                        <a href="apiario.php"> <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button> </a>
                                    </div>


                                    <!--inicio corpo do modal-->
                                    <div class="modal-body" style="height:380px;">
                                        <div class="container">

                                            <!--LINHA 01 MODAL-->
                                            <div class="row ">
                                                <div class="col md-1  ">
                                                    <?php $img = $linha['IMAGEM'];
                                                    echo "<img src='$img' width='180px' height='180px'> </img>" ?>
                                                </div>

                                                <div class="col-md-8">
                                                    <?php echo "<B>Responsável</B>: " . $linha['RESPONSAVEL']; ?><br>
                                                    <?php echo "<B>Endereço</B>: Rua " . $linha['RUA'] . " " . $linha['NUMERO'] . ", bairro " . $linha['BAIRRO']; ?><br>
                                                    <?php echo "<b>Cidade </b>" . $linha['CIDADE']; ?> <br>

                                                    <?php
                                                    if ($linha['SITUACAO'] = 1) {
                                                        $SITUACAO = "Ativo";
                                                    }
                                                    ?>

                                                    <?php echo "<B>Situação </B>: " . $SITUACAO; ?> <br>
                                                    <?php

                                                    //MUDAR DATA PDRÃO BRASILEIRO
                                                    $DATA = $linha['DATA_ATIVO'];
                                                    $data_BR = implode("/", array_reverse(explode("-", $DATA)));
                                                    ?>

                                                    <?php echo "<B>Inicio do funcionamento</B>: " . $data_BR; ?><br>
                                                    <?php echo "<B>Latitude</B>: " . $linha['LATITUDE'] . "<B>" .  "  Longitude</B>: " . $linha['LONGITUDE']; ?>
                                                    <hr width="100%">
                                                    <br>
                                                    </hr>

                                                </div>
                                            </div>

                                            <!--LINHA 02 MODAL-->
                                            <div class="row" style="background-color:whitesmoke;">
                                                <div class="col-md-3 ">

                                                    <h5><B>Raínhas ativas</b></h5>

                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->
                                                    <?php $cod_ap = $linha['COD_APIARIO'];
                                                    $busca = "SELECT COUNT(DESC_RAINHA) AS cod FROM lista_colmeia8 WHERE COD_APIARIO = $cod_ap";
                                                    $query = mysqli_query($conecta, $busca);
                                                    $result_col = mysqli_fetch_array($query);
                                                    ?>
                                                    <img src="img/rainha.png" width="70px" style="padding-top:15px; ">
                                                    <p style="color:blue;  font-weight:bold; font-size:60px; float:left; ">
                                                        <?php echo $result_col['cod']; ?>
                                                    </p>

                                                </div>



                                                <div class="col-md-3" style="background-color:whitesmoke;">


                                                    <h5><B>Colméias ativas</b></h5>

                                                    <!--IMPRIMIR QTD DE COLMEIA POR APIÁRIO-->
                                                    <?php $cod_ap = $linha['COD_APIARIO'];
                                                    $busca = "SELECT COUNT(*) AS cod FROM colmeia WHERE COD_APIARIO = $cod_ap";
                                                    $query = mysqli_query($conecta, $busca);
                                                    $result_col = mysqli_fetch_array($query);
                                                    ?>
                                                    <img src="img/colmeia.png" width="70px" style="padding-top:15px;">
                                                    <p style="color:blue;  font-weight:bold; font-size:60px; float:left; ">
                                                        <?php echo $result_col['cod']; ?>
                                                    </p>

                                                </div>

                                                <div class="col-md-3">


                                                    <h5><B>Tarefas </b></h5>

                                                    <!--IMPRIMIR QTD DE TAREFAS POR APIÁRIO-->
                                                    <?php $cod_ap = $linha['COD_APIARIO'];
                                                    $busca = "SELECT COUNT(*) AS cod FROM tarefa WHERE COD_APIARIO = $cod_ap";
                                                    $query = mysqli_query($conecta, $busca);
                                                    $result_col = mysqli_fetch_array($query);
                                                    ?>
                                                    <img src="img/tarefas.png" width="70px" style="padding-top:15px;">
                                                    <p style="color:blue;  font-weight:bold; font-size:60px; float:left; ">
                                                        <?php echo $result_col['cod']; ?>
                                                    </p>

                                                </div>

                                                <div class="col-md-3" style="background-color:whitesmoke;">


                                                    <h5><B>Produção de mel</b></h5>

                                                    <!--IMPRIMIR QTD ?? POR APIÁRIO-->
                                                    <?php $cod_ap = $linha['COD_APIARIO'];
                                                    $busca = "SELECT SUM(QUANTIDADE) AS cod FROM producao WHERE CATEGORIA LIKE 'Mel' AND COD_APIARIO = '$cod_ap'";
                                                    $query = mysqli_query($conecta, $busca);
                                                    $result_col = mysqli_fetch_array($query);
                                                    ?>
                                                    <img src="img/mel.png" width="70px" style="padding-top:15px;">
                                                    <p style="color:blue;  font-weight:bold; font-size:30px; float:left; padding-top:20px; ">

                                                        <?php
                                                        $res = $result_col['cod'];
                                                        if ($result_col['cod'] < 1) {
                                                            echo "0 Kg";
                                                        } else {
                                                            echo $res . " Kg";
                                                        }
                                                        ?>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--MODAL LISTAR COLMEIAS POR APIÁRIO --->
                        <div class="modal   " id="colmeia_AP<?php echo $linha['COD_APIARIO']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
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
                                                    <div clas="col-md-8" style='overflow-x:auto; height:300px;'>
                                                        <?php
                                                        $cod_ap = $linha['COD_APIARIO'];

                                                        $sql_BUSCA_COLMEIA = "SELECT * FROM colmeia WHERE COD_APIARIO = '$cod_ap'";
                                                        $BUSCA_COLMEIA = mysqli_query($conecta, $sql_BUSCA_COLMEIA);
                                                        while ($teste = mysqli_fetch_array($BUSCA_COLMEIA)) {

                                                            //ATRIBUIR VALORES DA BUSCA A VARIAVEIS
                                                            $desc_COLMEIA     = $teste['DESC_COLMEIA'];
                                                            $desc_INSTALACAO  = $teste['DATA_INSTALACAO'];
                                                            $desc_ESPECIE     = $teste['ESPECIE'];
                                                            $desc_ORIGEM      = $teste['ORIGEM'];
                                                            $desc_SITUACAO    = $teste['SITUACAO'];
                                                            $desc_COD_RAINHA  = $teste['COD_RAINHA'];

                                                            //IMPRIMIR VALORES DA BUSCA
                                                            echo  "<B>Colmeia:</B> " . $desc_COLMEIA . "<BR>";
                                                            echo  "<B>Instalação:</B> " . $desc_INSTALACAO . "<BR>";
                                                            echo  "<B>Espécie do enxame:</B> " . $desc_ESPECIE . "<BR>";
                                                            echo  "<B>Raínha:</B> " . "";
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
                        <div class="modal   " id="tarefas_AP<?php echo $linha['COD_APIARIO']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  ">
                                            <?php echo "Tarefas do Apiário" ?>
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
                                                    <div clas="col-md-8" style='overflow-x:auto; height:300px;'>
                                                        <?php
                                                        $cod_ap = $linha['COD_APIARIO'];

                                                        $sql_BUSCA_TAREFA = "SELECT * FROM tarefa WHERE COD_APIARIO = '$cod_ap'";
                                                        $BUSCA_TAREFA = mysqli_query($conecta, $sql_BUSCA_TAREFA);
                                                        while ($teste = mysqli_fetch_array($BUSCA_TAREFA)) {

                                                            $desc_CAT_TAREFA     = $teste['CATEGORIA'];
                                                            echo $desc_CAT_TAREFA;
                                                            if ($teste < 1) {
                                                                echo "<h3> Nenhum registro encontardo! </h3>";
                                                            } else {


                                                                //ATRIBUIR VALORES DA BUSCA A VARIAVEIS
                                                                $desc_CAT_TAREFA     = $teste['CATEGORIA'];
                                                                $desc_DATA_TAREFA  = $teste['DATA_TAREFA'];
                                                                $desc_PRIORIDADE      = $teste['PRIORIDADE'];
                                                                $desc_OBSERVACOES      = $teste['OBSERVACOES'];
                                                                $desc_CO      = $teste['OBSERVACOES'];


                                                                //IMPRIMIR VALORES DA BUSCA
                                                                echo  "<B>Tarefa:</B> " . $desc_CAT_TAREFA . "<BR>";
                                                                echo  "<B>Data:</B> " . $desc_DATA_TAREFA . "<BR>";
                                                                echo  "<B>Prioriade:</B> " . $desc_PRIORIDADE . "<BR>";
                                                                echo  "<B>Observações:</B> " . $desc_OBSERVACOES . "<BR>";

                                                                echo "<hr width='100%'></hr>";
                                                            }
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
            <button type="button" class="btn  btn-dark btn-sm  btcad " data-bs-toggle="modal" data-bs-target="#mapas">
                Mapa
                <img src='img/maps.png' width='25px' height='25px' class="img-responsive img-fluid "></img>
            </button>
        </div>


    </div>
</div>


<!-- FIM DO CÓDIGO --------------------------------------(ITENS VISIVEIS EM 1 PLANO)--------------------------------------------->


<!--MODAL DE CADASTRO DE APIARIO-->
<div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">

            <!--CABEÇALHO-->
            <div class="modal-header justify-content-center  bg-dark text-white ">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Apiário</h5>
            </div>
            <!--CORPO-->
            <div class="modal-body">

                <div class="col-md-12">
                    <!--FORMULARIO-->
                    <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_APIARIO.php" enctype="multipart/form-data">

                        <label class="form-text "><b>Localização do Apiário</b></label>

                        <!--ITENS AGRUPADOS NA MESMA LINHA -->
                        <div class=" form-inline mt-3">
                            <input type="text" class=" form-control " maxlength="50" name="CIDADE" placeholder="Cidade" onfocus="this.value='';" />
                            <input type="text" class=" form-control ml-3 " maxlength="50" name="BAIRRO" placeholder="Bairro" onfocus="this.value='';" />
                        </div>


                        <!--ITENS AGRUPADOS NA MESMA LINHA -->
                        <div class="form-inline">
                            <input type="text" class=" form-control mt-2  " maxlength="50" name="RUA" placeholder="Rua" onfocus="this.value='';" />
                            <input type="number" class=" form-control ml-3 mt-2" maxlength="50" name="NUMERO" placeholder="Número" onfocus="this.value='';" />
                        </div>


                        <!--ITENS AGRUPADOS NA MESMA LINHA -->
                        <div class="form-inline mt-2 ">
                            <input type="number" class=" form-control mt-2 " maxlength="50" name="LATITUDE" placeholder="Latitude" onfocus="this.value='';" />
                            <input type="number" class=" form-control ml-3 mt-2 " maxlength="50" name="LONGITUDE" placeholder="Longitude" onfocus="this.value='';" />
                        </div>
                        <BR>


                        <input type="text" class="form-control  " required maxlength="30" name="RESPONSAVEL" placeholder="Informe o responsável " onfocus="this.value='';" />
                        <input type="file" class="form-control mt-3 " accept="image/*" type="file" id="formFile" name="imagem">


                        <input type="hidden" id="input" name="dt_inativo" />
                        <input type="hidden" id="input" name="dt_ativo" />
                        <input type="hidden" id="input" name="situacao" /><br>
                        <a href="apiario.php"><button type="button" class="btn btn-secondary btn-sm ">Cancelar</button></a>
                        <button type="submit" class="btn btn-primary btn-sm" name="enviar">Adicionar</button>

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
                    <table class="table table-striped"  style="overflow-x:auto;">
                        <thead class="table-dark  "style="overflow-x:auto;">
                            <tr table style="overflow-x:auto;">
                                <th scope="col ">Descrição</th>
                                <th scope="col ">Responsável</th>
                               
                                <th scope="col ">Cidade</th>
                                <th scope="col ">Bairro</th>
                                <th scope="col ">Rua</th>
                                <th scope="col ">Situação</th>
                                <th scope="col ">Ativação</th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-striped" style="overflow-x:auto;">

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
                                    <td><?php echo $linha['CIDADE']; ?></td>
                                    <td><?php echo $linha['BAIRRO']; ?></td>
                                    <td><?php echo $linha['RUA']; ?></td>
                                    
                                    
                                    <td>
                                        <?php $status =  $linha['SITUACAO'];
                                        if($status ==1){
                                            $situacao_ap = "Ativo";
                                            echo $situacao_ap;
                                        }
                                        else{
                                            $situacao_ap = "Desativado";
                                            echo $situacao_ap;
                                        }
                                        ?>
                                    </td>
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
    <div class="modal-dialog  ">
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