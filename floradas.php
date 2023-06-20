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
$exibe_florada= "select * from florada "; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_florada) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
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
                    style="font-family: 'Times New Roman', Times, serif; font-size: 25px; font-weight: bold; color: white;">Floradas</text>
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
                    <li class="nav-item"><a class="nav-link" href="apiario.php">Apiários</a></li>
                    <li class="nav-item"><a class="nav-link" href="colmeia.php">Colméias</a></li>
                    <li class="nav-item"><a class="nav-link" href="floradas.php">Floradas</a></li>
                    <li class="nav-item"><a class="nav-link" href="tarefas.php">Minhas Tarefas</a></li>
                    <li class="nav-item"><a class="nav-link" href="producao.php">Produções </a></li>
                    <li class="nav-item"><a class="nav-link" href="rainha.php">Raínhas</a></li>
                </ul>
            </div>
    </nav>
    <!--FINAL ITENS DO BOTÃO RESPONSIVO-->

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

            <!--coluna 1 linha 1 LOGOTIPO DO SISTEMA------>
            <div class="col-12  mx-auto text-center img-responsive ">
            <div class="img" style="height:130px;">
                <img class="log" src="img/logo2.png"   width="auto;" height="130px"; alt="img"> </img>
            </div>

            <!------------------------------- ------------------ MENU SUPERIOR ---------------------------------->
            <div class=" row " >
                <div class="col-4" style="margin-left:-20px;" >
                    <!--BOTÃO ADICIONAR FLORADA--->
                    
                    <button type="button" class="btn btn-success btn-sm btcad" data-bs-toggle="modal" data-bs-target="#CadFloradaModal" >                    
                        Adicionar Florada <img src='img/add.png' width='22px' height='28px' class="img-responsive">
                    </button>

                    <!--OPÇÃO DE SEGUNDO BOTÃO
                    <button type="button" class="btn btn-dark btn-sm btcad" data-bs-toggle="modal" data-bs-target="#CadRevisaoModal">                         
                        Adicionar Florada <img src='img/tarefas.png' width='22px' height='25px' class="img-responsive">
                    </button>
                        -->
                </div>
                    
                <div class="col-8" >
                    <!-- Funçoes de adicionar e buscar -->
                    <form class="d-flex img-responsive dt-responsive ml-0" action="" method="get">                    

                        <!--Pesquisar---> 
                        <button type="submit" class="btn btn-primary " data-bs-target="#pesquisa" style="width:120px; height:38px;" > Buscar 
                            <img src='img/lupa.png' width='20px' height='20px' class="img-responsive" >
                        </button>
                        <input class="form-control" name="pesquisar" type="text" style="width: 100%; background: rgba(255, 255, 255, 0.3);"  />
                    </form>
                </div>                
                    
            </div>

        </div>
        <!--final da linha 01--->
    </div>


    <!--CONTAINER TABELA DE DADOS-->
    <div class="container overflow-auto " style="max-height: 300px; min-height:300px; margin-top:5px; background: rgba(255, 255, 255, 0.4); border-radius: 20px;">
        <div class="row linhaTAB  dt-responsive table-responsive overflow-auto" >
            <!-- <div class="col table-responsive" > -->
                <table class=" table  overflow-auto"  style="width:100%; " >
                    <thead class="table-dark position:sticky;   ">
                        <tr class="table-md   ">
                            <th scope="col">Identificação</th>
                            <th scope="col">Nome científico</th>
                            <th scope="col">Início da Floração</th>
                            <th scope="col">Fim da Floração</th>
                            <th scope="col">Ações</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-striped  overflow-auto">
                            <?php
                            while ($linha  = mysqli_fetch_array($resultado)) { ?>
                                <!--enquanto $linha receber função mysqli_fetch_array ($resultado)-->

                                <td><?php echo $linha['DESC_FLORADA']; ?></td>
                                <td><?php echo $linha['NOME_CIENTIFICO']; ?></td>
                                <td><?php echo $linha['INICIO_FLORACAO']; ?></td>
                                <td><?php echo $linha['TERMINO_FLORACAO']; ?></td>
                                

                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link" data-bs-target="#exclusao<?php echo $linha['COD_FLORADA']; ?>">
                                        <img src='img/excluir.png' width='22px' height='22px' alt="Excluir a Florada?">
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link " data-bs-target="#Edicao<?php echo $linha['COD_FLORADA']; ?>">
                                        <img src='img/editar.png' width='22px' height='22px'>
                                    </button>
                                </td>
                                
                                

                        </tr>

                        <!-- MODAL EXCLUSÃO-->
                        <div class="modal" tabindex="-1" role="dialog" id="exclusao<?php echo $linha['COD_FLORADA']; ?>">
                            <div class="modal-dialog img-responsive" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-danger text-white ">
                                        <h5 class="modal-title">Confirmar exclusão</h5>
                                    </div>
                                    <div class="modal-body bg-light ">
                                        <p>Excluir a florada: <b><?php echo $linha['DESC_FLORADA']; ?>
                                            </b> ? </p>
                                        

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='floradas.php'><button type="button" class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/florada_off.php?COD_FLORADA=<?php echo $id ?>"><button type="button" class="btn btn-danger 
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

            <!-- </div> -->
        </div>
    </div>


<?php } ?>
<!-- encerra o php aberto lá em cima " while ($linha  = mysqli_fetch_array($resultado)) { ?>" -->
</tbody>
</table>



<!---CONTAINER ITENS DO RODAPE--->
<div class="row fixed-bottom" style="min-height: 60px; max-height:60px; background: rgba(0, 0, 0, 0.5);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 offset-1 mt-0" style="border-radius: 10px;">
                    <!-- Logotipo -->
                    <img src="img/logo2.png" alt="Logotipo" width="100">
                </div>
                <div class="col-6 text-center mt-2" style="border-radius: 10px;">
                    <!-- Informações de contato e redes sociais -->
                    <span style="padding-right:15px; color:black;">Acompanhe nossas redes sociais! </span>
                    <a href="https://www.instagram.com" name="Instagram" class="ms-auto" target="_blank"><img
                            src="img/insta.png" width="35px" height="35px" style="padding-right:5px;"></a>
                    <a href="https://www.facebook.com" name="Facebook" class="ms-auto" target="_blank"><img
                            src="img/face.png" width="35px" height="35px" style="padding-right:5px;"></a>
                    <a href="https://www.twitter.com" name="Twitter" class="ms-auto" target="_blank"><img
                            src="img/twitter.png" width="35px" height="35px" style="padding-right:5px;"></a>
                    <a href="https://www.youtube.com" name="Youtube" class="ms-auto" target="_blank"><img
                            src="img/youtube.png" width="35px" height="35px" style="padding-right:5px;"></a>
                </div>
                <div class="col-3 offset-0 mt-2" style="border-radius: 10px;">
                    <a href="https://wa.me/55991696366?text=Ol%C3%A1%2C%20gostaria%20de%20uma%20ajuda%20em%20rela%C3%A7%C3%A3o%20ao%20software%20de%20gerenciamento%20de%20api%C3%A1rios!"
                        class="btn btn-primary" target="_blank">Chamar Suporte (WhatsApp)</a>
                </div>
            </div>
        </div>
    </div>


<!-- FIM DO CÓDIGO --------------------------------------(ITENS VISIVEIS EM 1 PLANO)--------------------------------------------->




<!--MODAL DE CADASTRO DE FLORADA-->
<div class="modal fade" id="CadFloradaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">

            <!--CABEÇALHO-->
            <div class="modal-header justify-content-center  bg-primary text-white ">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Florada</h5>
            </div>
            <!--CORPO-->
            <div class="modal-body">

                <div class="col-md-12">
                    <!--FORMULARIO-->
                    <form class="form-group " method="post" name="cadFLORADA" action="valida_cad/SALVARcad_FLORADA.php" >

                        

                        <!--ITENS AGRUPADOS NA MESMA LINHA -->
                        <div class=" form-inline mt-3">
                            <input type="text" class=" form-control " maxlength="50" name="DESC_FLORADA" placeholder="Informe uma descrição para a Florada" onfocus="this.value='';" required/>
                        </div>
                        <div class=" form-inline mt-3">
                            <input type="text" class=" form-control " maxlength="50" name="NOME_CIENTIFICO" placeholder="Nome científico da Florada" onfocus="this.value='';" />
                        </div>
                        
                        <!------------------------------------------SELECT INICIO FLORADA------------------------------------------>
                        <label class="form-text mt-2"><b>Data de início da florada</b></label>                        
                        <select class="form-control" name="INICIO_FLORADA" width="auto">
                            <option value="Janeiro" selected> Janeiro</option>
                            <option value="Fevereiro"> Fevereiro</option>
                            <option value=" Março"> Março</option>
                            <option value="Abril"> Abril</option>
                            <option value="Maio"> Maio</option>
                            <option value="Junho"> Junho</option>
                            <option value="Julho"> Julho</option>
                            <option value="Agosto"> Agosto</option>
                            <option value="Setembo"> Setembro</option>
                            <option value="Outubro"> Outubro</option>
                            <option value="Novembro"> Novembro</option>
                            <option value="Dezembro"> Dezembro</option>                                                    
                            </option>
                        </select>

                        <!------------------------------------------SELECT FIM FLORADA------------------------------------------>
                        <label class="form-text mt-2"><b>Data de fim da florada</b></label>                        
                        <select class="form-control" name="FIM_FLORADA" width="auto">
                            <option value="Janeiro" selected> Janeiro</option>
                            <option value="Fevereiro"> Fevereiro</option>
                            <option value=" Março"> Março</option>
                            <option value="Abril"> Abril</option>
                            <option value="Maio"> Maio</option>
                            <option value="Junho"> Junho</option>
                            <option value="Julho"> Julho</option>
                            <option value="Agosto"> Agosto</option>
                            <option value="Setembo"> Setembro</option>
                            <option value="Outubro"> Outubro</option>
                            <option value="Novembro"> Novembro</option>
                            <option value="Dezembro"> Dezembro</option>                                                    
                            </option>
                        </select>
                        <br>
                        <a href="floradas.php"><button type="button" class="btn btn-secondary btn-sm ">Cancelar</button></a>
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