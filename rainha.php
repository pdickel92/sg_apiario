<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Raínhas </title>
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
$exibe_colmeia = "select * from rainha WHERE status='1'"; //$busca_CATcaixas recebe o código SQL
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
            <span class="navbar-text">Consulta de Raínhas
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
                            <th scope="col">ID</th>
                            <th scope="col ">Inserção</th>
                            <th scope="col">Colméia</th>
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

                                <td><?php echo $linha['DESC_RAINHA']; ?></td>

                                <!--DATA PADRÃO BRASIL-->
                                <?php $DATA = $linha['ANO_NASC'];
                                $data_BR = implode("/", array_reverse(explode("-", $DATA))); ?>
                                <td><?php echo $data_BR; ?></td>

                                <td><?php echo $linha['EST_RAINHA']; ?></td>

                                <td><?php echo $linha['ORIG_RAINHA']; ?></td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#exclusao<?php echo $linha['COD_RAINHA']; ?>">
                                        <img src='img/excluir.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link " data-bs-target="#Edicao<?php echo $linha['COD_RAINHA']; ?>">
                                        <img src='img/editar.png' width='22px' height='22px'>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-target="#detalhes_AP<?php echo $linha['COD_RAINHA']; ?>">
                                        Observações
                                    </button>
                                </td>

                        </tr>

                        <!-- MODAL EXCLUSÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="exclusao<?php echo $linha['COD_RAINHA']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-danger text-white ">
                                        <h5 class="modal-title">Confirmar exclusão</h5>
                                    </div>
                                    <div class="modal-body bg-light ">


                                        <p>Excluir a raínha: <b><?php echo $linha['DESC_RAINHA']; ?>
                                            </b> ? </p>

                                        <?php $id = $linha['COD_RAINHA']; ?>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='rainha.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/rainha_off.php?COD_RAINHA=<?php echo $id ?>"><button type="button" class="btn btn-danger 
                                        text-center"> Confirma
                                            </button>
                                        </a>

                                        <!-- TRANSFERIR RAINHA DE COLMEIA -->
                                        <button type="button" class="btn btn-primary 
                                        text-center"> Transferir de colmeia?
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- MODAL EDIÇÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="Edicao<?php echo $linha['COD_RAINHA']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-warning text-white ">
                                        <h5 class="modal-title">Edição de raínha</h5>
                                    </div>
                                    <div class="modal-body bg-light ">

                                        <div class="col-md-12">

                                            <!--inicio formulario de cadastro-->
                                            <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_rainha.php">

                                                <!--<label for="" class="">Descrição do Apiário</label>-->

                                                <br>
                                                <select class="form-control" name="situacao" width="auto">
                                                    <option value="" selected> Informe a situação da raínha</option>
                                                    <option value="Sem Informação"> Não definido</option>
                                                    <option value=" Virgem"> Virgem </option>
                                                    <option value="Fecundada"> Fecundada</option>
                                                </select>

                                                <br>
                                                <select class="form-control" name="origem" class="situacao" width="auto">
                                                    <option value="Sem informação" selected> Informe a origem da raínha</option>
                                                    <option value="Sem informação"> Sem informação</option>
                                                    <option value=" Realeira"> Realeira </option>
                                                    <option value="Comprada"> Comprada</option>
                                                    <option value="Fabricação Própria"> Fabricação Própria</option>
                                                </select>

                                                <br>
                                                <textarea class="form-control" name="OBS" rows="5" cols="30" id="area" maxlenght:300>
                                                </textarea>
                                                <input type="hidden" name="STATUS"> </input>

                                            </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='rainha.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/COLMEIA_off.php?COD_RAINHA=<?php echo $id ?>"><button type="button" class="btn btn-warning text-white 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL MAIS DETALHES DA RAÍNHA --->
                        <div class="modal   " id="detalhes_AP<?php echo $linha['COD_RAINHA']; ?>" tabindex="-1" aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                    <div class="modal-header bg-dark text-white ">
                                        <h5 class="modal-title  "><?php echo "Raínha: " . $linha['DESC_RAINHA']; ?>
                                        </h5>
                                        <a href="rainha.php"> <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button> </a>
                                    </div>

                                    <!--inicio corpo do modal-->
                                    <div class="modal-body" style="height:240px;">
                                        <div class="container">

                                            <!--LINHA 01 MODAL-->
                                            <div class="row" style="height:240px; overflow-x:auto; ">
                                                <div class="col-md-10">
                                                    <?php echo "<B>Descrição</B>: " . $linha['DESC_RAINHA']; ?><br>

                                                    <?php $DATA = $linha['ANO_NASC'];
                                                    $data_BR = implode("/", array_reverse(explode("-", $DATA))); ?>
                                                    <?php echo "<B>Inserção</B>: " . $data_BR; ?><br>

                                                    <?php echo "<B>Descrição</B>: " . $linha['DESC_RAINHA']; ?><br>

                                                    <?php echo "<B>Origem</B>: " . $linha['ORIG_RAINHA']; ?><br>
                                                    <?php echo "<B>Situação</B>: " . $linha['EST_RAINHA']; ?><br>
                                                    <?php echo "<B>Apiário</B>: "  ?><br>
                                                    <?php echo "<B>Colméia</B>: "  ?><br>

                                                    

                                                   
                                                    
                                                    <?php echo "<B>Observações</B>: " . $linha['OBSERVACOES']; ?><br>

                                                    <hr width="100%">
                                                    </hr>

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


<!--MODAL DE CADASTRO DE RAINHA-->
<div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">

            <!--CABEÇALHO-->
            <div class="modal-header justify-content-center  bg-dark text-white ">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Raínha</h5>
            </div>
            <!--CORPO-->
            <div class="modal-body">

                <div class="col-md-12">

                    <!--inicio formulario de cadastro-->
                    <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_rainha.php">

                    <input type="text" class="form-control  " required maxlength="30" name="DESCRICAO_RAINHA" placeholder="Descrição da Raínha " onfocus="this.value='';" />
                                               
                        <br>
                        <select class="form-control" name="situacao" width="auto">
                            <option value="" selected> Informe a situação da raínha</option>
                            <option value="Sem Informação"> Não definido</option>
                            <option value=" Virgem"> Virgem </option>
                            <option value="Fecundada"> Fecundada</option>
                        </select>

                        <br>
                        <select class="form-control" name="origem" class="situacao" width="auto">
                            <option value="Sem informação" selected> Informe a origem da raínha</option>
                            <option value="Sem informação"> Sem informação</option>
                            <option value=" Realeira"> Realeira </option>
                            <option value="Comprada"> Comprada</option>
                            <option value="Fabricação Própria"> Fabricação Própria</option>
                        </select>

                        <br>
                        <textarea class="form-control" name="OBS" rows="5" cols="30" id="area" maxlenght:300>
                        </textarea>
                        <input type="hidden" name="STATUS"> </input>

                        <a href="rainha.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                        <button type="submit" class="btn btn-primary" name="enviar">Adicionar</button>
                    </form>

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