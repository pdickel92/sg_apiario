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
$exibe_colmeia = "SELECT colmeia.CAIXA,apiario.DESCRICAO as APIARIO, apiario.COD_APIARIO,colmeia.COD_COLMEIA,rainha.DESC_RAINHA,
colmeia.DATA_INATIVACAO, colmeia.DATA_INSTALACAO,colmeia.DESC_COLMEIA,colmeia.ESPECIE,colmeia.ORIGEM, colmeia.STATUS  
FROM colmeia
inner JOIN apiario
on  apiario.COD_APIARIO = colmeia.COD_APIARIO
INNER join rainha
on rainha.COD_RAINHA = colmeia.COD_RAINHA
WHERE 'STATUS' = 0;
"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_colmeia) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
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
                    style="font-family: 'Times New Roman', Times, serif; font-size: 25px; font-weight: bold; color: white;">Colméias</text>
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
    <div class="container" style="min-height: 60px; background: rgba(255, 255, 255, 0.4); border-radius: 20px;">
        <div class="row linhaTAB  dt-responsive table-responsive ">
            <div class="col table-responsive">
                <table class=" table table-striped  ">
                    <thead class="table-dark    ">
                        <tr class="table-md   ">
                            <th scope="col">ID</th>
                            <th scope="col ">Caixa</th>

                            <th scope="col">Instalação</th>
                            <th scope="col">Enxame</th>


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

                                <td><?php echo $linha['DESC_COLMEIA']; ?></td>
                                <td><?php echo $linha['CAIXA']; ?></td>

                                <!--CONVERTER DATA PT-BR-->
                                <?php $DATA = $linha['DATA_INSTALACAO'];
                                $data_BR = implode("/", array_reverse(explode("-", $DATA))); ?>
                                <td><?php echo $data_BR; ?></td>
                                <td><?php echo $linha['APIARIO']; ?></td>



                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#exclusao<?php echo $linha['COD_COLMEIA']; ?>">
                                        <img src='img/excluir.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link " data-bs-target="#Edicao<?php echo $linha['COD_COLMEIA']; ?>">
                                        <img src='img/editar.png' width='22px' height='22px'>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-target="#detalhes_AP<?php echo $linha['COD_COLMEIA']; ?>">
                                        + detalhes
                                    </button>
                                </td>

                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#tarefas_AP<?php echo $linha['COD_COLMEIA']; ?>">
                                        <img src='img/tarefas.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#IOT_AP<?php echo $linha['COD_COLMEIA']; ?>">
                                        <img src='img/iot.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#colmeia_AP<?php echo $linha['COD_COLMEIA']; ?>">
                                        <img src='img/producao.png' width='22px' height='22px'>
                                    </button>
                                </td>

                        </tr>

                        <!-- MODAL EXCLUSÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="exclusao<?php echo $linha['COD_COLMEIA']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-danger text-white ">
                                        <h5 class="modal-title">Confirmar exclusão</h5>
                                    </div>
                                    <div class="modal-body bg-light ">


                                        <p>Excluir a Colméia: <b><?php echo $linha['DESC_COLMEIA']; ?>
                                            </b> ? </p>

                                        <?php $id = $linha['COD_COLMEIA']; ?>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='colmeia.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/colmeia_off.php?COD_COLMEIA=<?php echo $id ?>"><button type="button" class="btn btn-danger 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- MODAL DE EDIÇÃO DE COLMEIA-->
                        <div class="modal" tabindex="-1" role="dialog" id="Edicao<?php echo $linha['COD_COLMEIA']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-warning text-white ">
                                        <h5 class="modal-title">Edição de colméia</h5>
                                    </div>
                                    <div class="modal-body bg-light ">

                                        <div class="col-md-12">
                                            <!--FORMULARIO-->
                                            <!--inicio formulario de cadastro-->

                                                <input type="hidden" name="STATUS" />
                                                

                                                <br>
                                                <!------------------------------------------CAIXA------------------------------------------>
                                                <select class="form-control" name="caixa" width="auto">
                                                    <option value="Sem Informação" selected> Selecione a caixa</option>
                                                    <option value="Sem Informação"> Sem Informação</option>
                                                    <option value=" Caixa Langstroth"> Caixa Langstroth </option>
                                                    <option value="Caíxa Lusitana"> Caixa Lusitana</option>
                                                    <option value="Caixa Reversível"> Reversível</option>
                                                    <option value="Caixa Queniana"> Caixa Queniana</option>
                                                    <option value="Caixa  Tanzânia"> Caixa Tanzania</option>
                                                    <option value="Caixa Layens"> Caixa Layens</option>
                                                    <option value="Caixa Schenk"> Caixa Schenk</option>
                                                    <option value="Caixa Shirmer"> Shirmer</option>
                                                    <option value="Caixa Curtinaz"> Caixa Curtinaz</option>
                                                    <option value="Caixa Dadant"> Caixa Dadant</option>
                                                    <option value="Caixa Núcleo de Captura"> Caixa Núcleo de Captura</option>
                                                </select>

                                                <br>
                                                <!---SELECT ORIGEM---->
                                                <select class="form-control" name="origem" width="auto">
                                                    <option value="Sem Informação" selected> Selecione a origem do enxame</option>
                                                    <option value="Sem Informação"> Sem Informação</option>
                                                    <option value=" Comprada"> Comprada </option>
                                                    <option value="Resgatada"> Resgatada</option>
                                                    <option value="Caixa-Isca"> Caixa-Isca</option>
                                                    <option value="Ganhada"> Ganhada</option>
                                                    <option value="Divisão"> Divisão</option>
                                                </select>

                                                <br>
                                                <!--SELECT ENXAME-->
                                                <select class="form-control" name="enxame" width="auto">
                                                    <option value="Sem Informação" selected> Selecione a espécie do enxame</option>
                                                    <option value="Sem Informação"> Sem Informação</option>
                                                    <option value="Abelha-Africana"> Abelha-Africana</option>
                                                    <option value="Abelhas-Africanizadas">Abelhas-Africanizadas </option>
                                                    <option value="Abelha-Carnica"> Abelha-Carnica</option>
                                                    <option value="Abelha-Caucasiana"> Abelhas-Caucasiana</option>
                                                    <option value="Abelha-Europeia"> Abelha-Europeia</option>
                                                    <option value="Abelha-Italiana"> Abelha-Italiana</option>
                                                    <option value="Outra"> Outra</option>
                                                </select>

                                                <br>
                                                <!-- Inicio select campo rainha -->
                                                <?php
                                                $cod_rainha = "select DESC_RAINHA, COD_RAINHA FROM rainha"; //select recebe o texto 
                                                $result = mysqli_query($conecta, $cod_rainha)
                                                ?>

                                                <select class="form-control" name="RAINHA" width="auto">
                                                    <option value="" selected>Selecione a rainha</option>
                                                    <?php
                                                    while ($dados = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $dados['COD_RAINHA'] ?>">

                                                            <?php echo $dados['DESC_RAINHA'] ?>
                                                        <?php } ?>
                                                        </option>
                                                </select>


                                                <br>
                                                <!-- Inicio select campo apiario -->
                                                <?php
                                                $cod_apiario = "select DESCRICAO, COD_APIARIO FROM apiario"; //select recebe o texto 
                                                $result = mysqli_query($conecta, $cod_apiario)
                                                ?>

                                                <select name="APIARIO" class="form-control" width="auto">
                                                    <option value="selecione" selected>Selecione o Apiário</option>
                                                    <?php
                                                    while ($dados = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $dados['COD_APIARIO'] ?>">"

                                                            <?php echo $dados['DESCRICAO'] ?>
                                                        <?php }
                                                        ?>
                                                        </option>
                                                </select>
                                                <br>
                                                </input>
                                                
                                            </form>

                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='colmeia.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/COLMEIA_off.php?COD_COLMEIA=<?php echo $id ?>"><button type="button" class="btn btn-warning text-white 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL MAIS DETALHES DA COLMEIA --->
                        <div class="modal   " id="detalhes_AP<?php echo $linha['COD_COLMEIA']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  "><?php echo "Colméia: " . $linha['DESC_COLMEIA']; ?>
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
                                                    <?php echo "<B>Caixa</B>: " . $linha['CAIXA']; ?><br>

                                                    <?php $DATA = $linha['DATA_INSTALACAO'];
                                                    $data_BR = implode("/", array_reverse(explode("-", $DATA))); ?>

                                                    <?php echo "<B>Instalação</B>: " . $data_BR; ?><br>
                                                    <?php echo "<B>Apiário</B>: " . $linha['APIARIO']; ?><br>
                                                    <?php echo "<B>Raínha</B>: " . $linha['DESC_RAINHA']; ?><br>

                                                    <?php $ativa =  $linha['STATUS'];
                                                    if ($ativa == 1) {
                                                        $situacao = "Ativa";
                                                        echo "<B>Situação</B>: " . $situacao;
                                                    }

                                                    ?>
                                                    <br>


                                                    <br>
                                                    <hr width="100%">
                                                    </hr>

                                                </div>
                                            </div>

                                            <!--LINHA 02 MODAL-->
                                            <div class="row " style="background-color:whitesmoke;">

                                                <div class="col-md-4" style="background-color:whitesmoke;">

                                                    <!--COLUNA QTD COLMÉIAS DENTRO LINHA 02-->
                                                    <h6><B>Produção Mel </b></h6>

                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->
                                                    <?php $cod_COL = $linha['COD_COLMEIA'];
                                                    $busca = "SELECT COUNT(*) AS cod FROM producao WHERE COD_COLMEIA = '$cod_COL' 
                                                    AND CATEGORIA = 'Mel'";
                                                    $query = mysqli_query($conecta, $busca);
                                                    $result_col = mysqli_fetch_array($query);
                                                    ?>

                                                    <img src="img/mel.png" width="45px" style="padding-top:15px;"></img>
                                                    <h6 style="color:blue;  font-weight:bold; font-size:60px; float:left; ">
                                                        <?php echo $result_col['cod']; ?>
                                                    </h6>





                                                </div>

                                                <div class="col-md-4">

                                                    <!--COLUNA QTD TAREFAS DENTRO LINHA 02-->
                                                    <h6><B>Tarefas </b></h6>

                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->
                                                    <!--IMPRIMIR QTD DE RAINHA POR APIÁRIO-->
                                                    <?php $cod_COL = $linha['COD_COLMEIA'];
                                                    $busca = "SELECT COUNT(*) AS cod FROM producao WHERE COD_COLMEIA = '$cod_COL' 
                                                        AND CATEGORIA = 'Mel'";
                                                    $query = mysqli_query($conecta, $busca);
                                                    $result_col = mysqli_fetch_array($query);
                                                    ?>

                                                    <img src="img/tarefas.png" width="45px" style="padding-top:15px;"></img>
                                                    <h6 style="color:blue;  font-weight:bold; font-size:60px; float:left; ">
                                                        <?php echo $result_col['cod']; ?>
                                                    </h6>

                                                </div>

                                                <div class="col-md-4" style="background-color:whitesmoke;">



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL LISTAR PRODUÇÃO POR COLMEIA --->
                        <div class="modal   " id="colmeia_AP<?php echo $linha['COD_COLMEIA']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  ">
                                            <?php echo "Produção da colméia:  " . $linha['DESC_COLMEIA']; ?>
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
                                                        $cod_col = $linha['COD_COLMEIA'];

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
                        <div class="modal   " id="tarefas_AP<?php echo $linha['COD_COLMEIA']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
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
                                                        <?php
                                                        $cod_COL = $linha['COD_COLMEIA'];


                                                        $sql_BUSCA_TAREFA = "SELECT * FROM tarefa WHERE COD_APIARIO = 31";
                                                        $BUSCA_TAREFA = mysqli_query($conecta, $sql_BUSCA_TAREFA);
                                                        while ($teste = mysqli_fetch_array($BUSCA_TAREFA)) {

                                                            //ATRIBUIR VALORES DA BUSCA A VARIAVEIS
                                                            $desc_CAT_TAREFA     = $teste['CATEGORIA'];
                                                            $desc_DATA_TAREFA  = $teste['DATA_TAREFA'];
                                                            $desc_PRIORIDADE      = $teste['PRIORIDADE'];

                                                        ?>
                                                            kkkjIMPRIMIR VALORES DA BUSCA
                                                            "<B>Categoria:</B> " . $desc_CAT_TAREFA . "<BR>";

                                                        <?php
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




                        <!--MODAL IOT COLMEIA --->
                        <div class="modal   " id="IOT_AP<?php echo $linha['COD_COLMEIA']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  ">
                                            <?php echo "Monitoramento de temperatura da colmeia" ?>
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
                                                    <h5>Temperatura da colméia</h5><br>
                                                    <iframe width="450" height="290" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1863160/charts/1?color=%23d62020&dynamic=true&results=60&type=line"></iframe>
                                                    <hr width="100%">
                                                    </hr>
                                                    <h6>Link para acesso Nodered</h6>
                                                    <a href="http://127.0.0.1:1880/ui/">Nodered</a>
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

        
        
            <button type="button" class="btn  btn-dark btn-sm  btcad " data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                Ver Inativos 
            </button>
            </div>

        
        <!--INICIO DA COLUNA3--->
        


    </div>
</div>


<!-- FIM DO CÓDIGO --------------------------------------(ITENS VISIVEIS EM 1 PLANO)--------------------------------------------->


<!--MODAL DE CADASTRO DE APIARIO-->
<div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">

            <!--CABEÇALHO-->
            <div class="modal-header justify-content-center  bg-dark text-white ">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Colméia</h5>
            </div>
            <!--CORPO-->
            <div class="modal-body">

                <div class="col-md-12">
                    <!--inicio formulario de cadastro-->
                    <form class="form-group " method="POST" name="cadCOLMEIA" action="VALIDA_CAD/SALVARcad_COLMEIA.php">
                        <input type="text" class="form-control  " required maxlength="30" name="DESCRICAO_COLMEIA" placeholder="Descrição da Colméia " onfocus="this.value='';" />
                        <input type="hidden" name="STATUS" />

                        <br>
                        <!------------------------------------------CAIXA------------------------------------------>
                        <select class="form-control" name="caixa" width="auto">
                            <option value="Sem Informação" selected> Selecione a caixa</option>
                            <option value="Sem Informação"> Sem Informação</option>
                            <option value=" Caixa Langstroth"> Caixa Langstroth </option>
                            <option value="Caíxa Lusitana"> Caixa Lusitana</option>
                            <option value="Caixa Reversível"> Reversível</option>
                            <option value="Caixa Queniana"> Caixa Queniana</option>
                            <option value="Caixa  Tanzânia"> Caixa Tanzania</option>
                            <option value="Caixa Layens"> Caixa Layens</option>
                            <option value="Caixa Schenk"> Caixa Schenk</option>
                            <option value="Caixa Shirmer"> Shirmer</option>
                            <option value="Caixa Curtinaz"> Caixa Curtinaz</option>
                            <option value="Caixa Dadant"> Caixa Dadant</option>
                            <option value="Caixa Núcleo de Captura"> Caixa Núcleo de Captura</option>
                        </select>

                        <br>
                        <!---SELECT ORIGEM---->
                        <select class="form-control" name="origem" width="auto">
                            <option value="Sem Informação" selected> Selecione a origem do enxame</option>
                            <option value="Sem Informação"> Sem Informação</option>
                            <option value=" Comprada"> Comprada </option>
                            <option value="Resgatada"> Resgatada</option>
                            <option value="Caixa-Isca"> Caixa-Isca</option>
                            <option value="Ganhada"> Ganhada</option>
                            <option value="Divisão"> Divisão</option>
                        </select>

                        <br>
                        <!--SELECT ENXAME-->
                        <select class="form-control" name="enxame" width="auto">
                            <option value="Sem Informação" selected> Selecione a espécie do enxame</option>
                            <option value="Sem Informação"> Sem Informação</option>
                            <option value="Abelha-Africana"> Abelha-Africana</option>
                            <option value="Abelhas-Africanizadas">Abelhas-Africanizadas </option>
                            <option value="Abelha-Carnica"> Abelha-Carnica</option>
                            <option value="Abelha-Caucasiana"> Abelhas-Caucasiana</option>
                            <option value="Abelha-Europeia"> Abelha-Europeia</option>
                            <option value="Abelha-Italiana"> Abelha-Italiana</option>
                            <option value="Outra"> Outra</option>
                        </select>

                        <br>
                        <!-- Inicio select campo rainha -->
                        <?php
                        $cod_rainha = "select DESC_RAINHA, COD_RAINHA FROM rainha"; //select recebe o texto 
                        $result = mysqli_query($conecta, $cod_rainha)
                        ?>

                        <select class="form-control" name="RAINHA" width="auto">
                            <option value="" selected>Selecione a rainha</option>
                            <?php
                            while ($dados = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $dados['COD_RAINHA'] ?>">

                                    <?php echo $dados['DESC_RAINHA'] ?>
                                <?php } ?>
                                </option>
                        </select>


                        <br>
                        <!-- Inicio select campo apiario -->
                        <?php
                        $cod_apiario = "select DESCRICAO, COD_APIARIO FROM apiario"; //select recebe o texto 
                        $result = mysqli_query($conecta, $cod_apiario)
                        ?>

                        <select name="APIARIO" class="form-control" width="auto">
                            <option value="selecione" selected>Selecione o Apiário</option>
                            <?php
                            while ($dados = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $dados['COD_APIARIO'] ?>">"

                                    <?php echo $dados['DESCRICAO'] ?>
                                <?php }
                                ?>
                                </option>
                        </select>
                        <br>
                        </input>
                        <a href="colmeia.php">
                            <button type="button" class="btn btn-secondary">
                                Cancelar
                            </button>
                        </a>
                        <button type="submit" class="btn btn-primary" name="enviar">
                            Adicionar
                        </button>
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