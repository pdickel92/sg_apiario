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
$sql_tarefas = "SELECT tarefa.CATEGORIA, apiario.DESCRICAO,tarefa.COD_TAREFA, tarefa.DATA_TAREFA, tarefa.DESC_TAREFA,tarefa.OBSERVACOES,tarefa.PRIORIDADE,
tarefa.TAR_STATUS
FROM tarefa 
inner JOIN apiario
on  apiario.COD_APIARIO = tarefa.COD_APIARIO
WHERE TAR_STATUS = 1;

"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $sql_tarefas) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
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
                    style="font-family: 'Times New Roman', Times, serif; font-size: 25px; font-weight: bold; color: white;">Minhas
                    tarefas</text>
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
                    <img class="log" src="img/logo2.png" width="auto;" height="130px" ; alt="img"> </img>
                </div>

                <!------------------------------- ------------------ MENU SUPERIOR ---------------------------------->
                <div class=" row ">
                    <div class="col-4" style="margin-left:-20px;">
                        <!--BOTÃO ADICIONAR COLMEIA--->
                        <button type="button" class="btn btn-success btn-sm btcad" data-bs-toggle="modal"
                            data-bs-target="#CadApiarioModal">
                            Adicionar Tarefa <img src='img/add.png' width='22px' height='28px' class="img-responsive">
                        </button>
                    </div>

                    <div class="col-8">
                        <!-- Funçoes de adicionar e buscar -->
                        <form class="d-flex img-responsive dt-responsive ml-0" action="" method="get">

                            <!--Pesquisar--->
                            <button type="submit" class="btn btn-primary " data-bs-target="#pesquisa"
                                style="width:120px; height:38px;"> Buscar
                                <img src='img/lupa.png' width='20px' height='20px' class="img-responsive">
                            </button>
                            <input class="form-control" name="pesquisar" type="text"
                                style="width: 100%; background: rgba(255, 255, 255, 0.3);" />
                        </form>
                    </div>

                </div>

            </div>
            <!--final da linha 01--->
        </div>


        <!--CONTAINER TABELA DE DADOS-->
        <div class="container overflow-auto "
            style="max-height: 300px; min-height:300px; margin-top:5px; background: rgba(255, 255, 255, 0.4); border-radius: 20px;">
            <div class="row linhaTAB  dt-responsive table-responsive overflow-auto">
                <!-- <div class="col table-responsive" > -->
                <table class=" table  overflow-auto" style="width:100%; ">
                    <thead class="table-dark position:sticky;   ">
                        <tr class="table-md   ">

                            <th scope="col">Categoria</th>
                            <th scope="col">Data</th>
                            <th scope="col">Apiário</th>
                            <th scope="col">Ações</th>
                            <th scope="col">Detalhes</th>





                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-striped ">
                            <?php
                            while ($linha = mysqli_fetch_array($resultado)) { ?>
                                <!--enquanto $linha receber função mysqli_fetch_array ($resultado)-->


                                <td>
                                    <?php echo $linha['CATEGORIA']; ?>
                                </td>

                                <!--CONVERTER DATA PADRÃO BRASILEIRO-->
                                <?php $DATA = $linha['DATA_TAREFA'];
                                $data_BR = implode("/", array_reverse(explode("-", $DATA)));
                                $desc_DATA_COLETA = $data_BR;
                                ?>
                                <td>
                                    <?php echo $data_BR ?>
                                </td>
                                <td>
                                    <?php echo $linha['DESCRICAO']; ?>
                                </td>



                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link"
                                        data-bs-target="#exclusao<?php echo $linha['COD_TAREFA']; ?>">
                                        <img src='img/confirma.png' width='22px' height='22px'>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-link "
                                        data-bs-target="#Edicao<?php echo $linha['COD_TAREFA']; ?>">
                                        <img src='img/editar.png' width='22px' height='22px'>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-sm btn-success"
                                        data-bs-target="#detalhes_AP<?php echo $linha['COD_TAREFA']; ?>">
                                        + detalhes
                                    </button>
                                </td>


                            </tr>

                            <!-- MODAL EXCLUSÃO-->
                            <div class="modal" tabindex="-1" role="dialog" id="exclusao<?php echo $linha['COD_TAREFA']; ?>">
                                <div class="modal-dialog img-responsive" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center bg-warning text-white ">
                                            <h5 class="modal-title">Concluir tarefa?</h5>
                                        </div>
                                        <div class="modal-body bg-light ">


                                            <p>Finalizou a tarefa: <b>
                                                    <?php echo $linha['CATEGORIA']; ?>
                                                </b> ? </p>

                                            <?php $id = $linha['COD_TAREFA']; ?>

                                        </div>
                                        <div class="modal-footer justify-content-center img-responsive ">
                                            <a href='tarefas.php'><button type="button"
                                                    class="btn btn-secondary text-center " data-dismiss="modal">
                                                    Cancelar
                                                </button>
                                            </a>
                                            <a href="#?COD_TAREFA=<?php echo $id ?>"><button type="button" class="btn btn-success 
                                        text-center"> Adicionar registro
                                                </button>
                                            </a>
                                            <a href="desativa/tarefa_off.php?COD_TAREFA=<?php echo $id ?>"><button
                                                    type="button" class="btn btn-warning 
                                        text-center"> Encerrar tarefa
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- MODAL EDIÇÃO-->
                            <div class="modal" tabindex="-1" role="dialog" id="Edicao<?php echo $linha['COD_TAREFA']; ?>">
                                <div class="modal-dialog img-responsive" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center bg-warning text-white ">
                                            <h5 class="modal-title">Edição de tarefa</h5>
                                        </div>
                                        <div class="modal-body bg-light ">

                                            <div class="col-md-12">
                                                <!--FORMULARIO-->
                                                <!----------------------------inicio formulario de cadastro-------------------------->

                                                <form class="form-group " method="post" name="cadAPIARIO"
                                                    action="valida_cad/SALVARcad_tarefa.php">
                                                    <input type="hidden" name="status" />

                                                    <br><input type="date" class="form-control" required maxlength="50"
                                                        name="data" value="Data" onfocus="this.value='';" />

                                                    <!----------------------------------CATEGORIA------------------------------------->
                                                <br>
                                                <select class="form-control" name="CATEGORIA" class="tarefas"
                                                    width="auto">
                                                    <option value="" selected> Informe uma categoria</option>
                                                    <option value=""> Geral</option>
                                                    <option value=" Revisão"> Revisão </option>
                                                    <option value="Produção"> Produção</option>
                                                    <option value=" Alimentação"> Alimentação </option>
                                                    <option value="Divisão de Colméia"> Divisão de Colméia</option>
                                                    <option value=" Transferencia de colméia"> Transferencia de colméia
                                                    </option>
                                                    <option value="Transferência de raínha"> Transferência de raínha
                                                    </option>
                                                    <option value=" Troca de Raínha"> Troca de Raínha </option>
                                                    <option value=" Unificação de Colmeia"> Unificação de Colmeia
                                                    </option>
                                                    <option value="Visita Técnica"> Visita Técnica</option>
                                                    <option value=" Outro Manejo"> Outro Manejo</option>
                                                </select>

                                                <!----------------------------------PRIORIDADE------------------------------------->
                                                <br>
                                                <select class="form-control" name="prior" width="auto">
                                                    <option value="" selected> Informe uma prioridade</option>
                                                    <option value="Não definida"> Não definida</option>
                                                    <option value=" Baixa"> Baixa </option>
                                                    <option value="Média"> Média</option>
                                                    <option value="Alta"> Alta</option>
                                                </select>

                                                <!----------------------------------APIARIO---------------------------------------->

                                                    <?php
                                                    $cod_apiario = "select DESCRICAO, COD_APIARIO FROM apiario"; //select recebe o texto 
                                                    $result = mysqli_query($conecta, $cod_apiario)
                                                        ?>

                                                    <br>
                                                    <select class="form-control" name="APIARIO" width="auto">
                                                        <option value="selecione" selected>Selecione um Apiário</option>
                                                        <?php
                                                        while ($dados = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <option value="<?php echo $dados['COD_APIARIO'] ?>">

                                                                <?php echo $dados['DESCRICAO'] ?>
                                                            <?php } ?>
                                                        </option>
                                                    </select>
                                                    <br>

                                                    <!--SELECT ID FROM tabela ORDER BY ID DESC LIMIT1-->

                                                    <!----------------------------------OBSERVAÇÕES------------------------------------->

                                                <h6 id="categoria"> Observações </h6>

                                                <textarea class="form-control" name="OBS" rows="5" cols="30" id="area"
                                                    placeholder="Observações" maxlenght:300>
                            </textarea>

                                                <br>
                                                <a href="tarefas.php"><button type="button"
                                                        class="btn btn-secondary">Cancelar</button></a>
                                                <button type="submit" class="btn btn-primary"
                                                    name="enviar">Alterar</button>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-center img-responsive ">
                                        <a href='tarefas.php'><button type="button"
                                                class="btn btn-secondary text-center " data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </a>
                                        <a href="desativa/TAREFA_off.php?COD_TAREFA=<?php echo $id ?>"><button
                                                type="button" class="btn btn-warning text-white 
                                        text-center"> Confirma
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--MODAL MAIS DETALHES DA TAREFA --->
                        <div class="modal   " id="detalhes_AP<?php echo $linha['COD_TAREFA']; ?>" tabindex="-1"
                            aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog  modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                        <div class="modal-header bg-dark text-white ">
                                            <h5 class="modal-title  ">
                                                <?php echo "Tarefa: " . $linha['DESC_TAREFA']; ?>
                                            </h5>
                                            <a href="tarefas.php"> <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> </a>
                                        </div>

                                        <!--inicio corpo do modal-->
                                        <div class="modal-body" style="height:380px;">
                                            <div class="container">

                                                <?php echo "<B>Observações</B>: " . $linha['OBSERVACOES'];
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--MODAL LISTAR COLMEIAS POR APIÁRIO --->
                        <div class="modal   " id="colmeia_AP<?php echo $linha['COD_COLMEIA']; ?>" tabindex="-1"
                            aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                        <div class="modal-header bg-dark text-white ">
                                            <h5 class="modal-title  ">
                                                <?php echo "Colméias do Apiário" ?>
                                            </h5>
                                            <a href="apiario.php">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
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


                            <!--MODAL LISTAR TAREFAS POR APIÁRIO --->
                        <div class="modal   " id="tarefas_AP<?php echo $linha['COD_COLMEIA']; ?>" tabindex="-1"
                            aria-labelledby="#" aria-hidden="true">
                            <div class="modal-dialog   modal_CONS" title="">
                                <div class="modal-content">

                                    <!--inicio cabeçalho do modal-->
                                        <div class="modal-header bg-dark text-white ">
                                            <h5 class="modal-title  ">
                                                <?php echo "Colméias do Apiário" ?>
                                            </h5>
                                            <a href="apiario.php">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
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
                                                            echo $cod_COL;

                                                            $sql_BUSCA_TAREFA = "SELECT * FROM tarefa WHERE COD_APIARIO = 31";
                                                            $BUSCA_TAREFA = mysqli_query($conecta, $sql_BUSCA_TAREFA);
                                                            while ($teste = mysqli_fetch_array($BUSCA_TAREFA)) {

                                                                //ATRIBUIR VALORES DA BUSCA A VARIAVEIS
                                                                $desc_CAT_TAREFA = $teste['CATEGORIA'];
                                                                $desc_DATA_TAREFA = $teste['DATA_TAREFA'];
                                                                $desc_PRIORIDADE = $teste['PRIORIDADE'];

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
                <!-- </div> -->
            </div>
        </div>


    <?php } ?>
    <!-- encerra o php aberto lá em cima " while ($linha  = mysqli_fetch_array($resultado)) { ?>" -->
    </tbody>
    </table>



    <!---CONTAINER ITENS DO RODAPE--->
    <div class="row fixed-bottom" style="min-height: 60px; background: rgba(0, 0, 0, 0.5);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 offset-1 mt-2" style="border-radius: 10px;">
                    <!-- Logotipo -->
                    <img src="img/logo2.png" alt="Logotipo" width="100">
                </div>
                <div class="col-6 text-center mt-2" style="border-radius: 10px;">
                    <!-- Informações de contato e redes sociais -->
                    <span>Acompanhe nossas redes sociais! </span>
                    <a href="https://www.instagram.com" name="Instagram" class="ms-auto" target="_blank"><img
                            src="img/insta.png" width="37px" height="35px"></a>
                    <a href="https://www.facebook.com" name="Facebook" class="ms-auto" target="_blank"><img
                            src="img/face.png" width="37px" height="35px"></a>
                    <a href="https://www.twitter.com" name="Twitter" class="ms-auto" target="_blank"><img
                            src="img/twitter.png" width="37px" height="35px"></a>
                    <a href="https://www.youtube.com" name="Youtube" class="ms-auto" target="_blank"><img
                            src="img/youtube.png" width="37px" height="35px"></a>
                </div>
                <div class="col-2 offset-1 mt-2" style="border-radius: 10px;">
                    <a href="https://wa.me/55991696366?text=Ol%C3%A1%2C%20gostaria%20de%20uma%20ajuda%20em%20rela%C3%A7%C3%A3o%20ao%20software%20de%20gerenciamento%20de%20api%C3%A1rios!"
                        class="btn btn-primary" target="_blank">Chamar Suporte (WhatsApp)</a>
                </div>
            </div>
        </div>
    </div>


    <!-- FIM DO CÓDIGO --------------------------------------(ITENS VISIVEIS EM 1 PLANO)--------------------------------------------->


    <!--MODAL DE CADASTRO DE TAREFAS-->
    <div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">

                <!--CABEÇALHO-->
                <div class="modal-header justify-content-center  bg-dark text-white ">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Tarefas</h5>
                </div>
                <!--CORPO-->
                <div class="modal-body">

                    <div class="col-md-12">

                        <!----------------------------inicio formulario de cadastro-------------------------->

                        <form class="form-group " method="post" name="cadAPIARIO"
                            action="valida_cad/SALVARcad_tarefa.php">
                            <input type="hidden" name="status" />

                            <br><input type="date" class="form-control" required maxlength="50" name="data" value="Data"
                                onfocus="this.value='';" />

                            <!----------------------------------CATEGORIA------------------------------------->
                            <br>
                            <select class="form-control" name="CATEGORIA" class="tarefas" width="auto">
                                <option value="" selected> Informe uma categoria</option>
                                <option value=""> Geral</option>
                                <option value=" Revisão"> Revisão </option>
                                <option value="Produção"> Produção</option>
                                <option value=" Alimentação"> Alimentação </option>
                                <option value="Divisão de Colméia"> Divisão de Colméia</option>
                                <option value=" Transferencia de colméia"> Transferencia de colméia </option>
                                <option value="Transferência de raínha"> Transferência de raínha</option>
                                <option value=" Troca de Raínha"> Troca de Raínha </option>
                                <option value=" Unificação de Colmeia"> Unificação de Colmeia </option>
                                <option value="Visita Técnica"> Visita Técnica</option>
                                <option value=" Outro Manejo"> Outro Manejo</option>
                            </select>

                            <!----------------------------------PRIORIDADE------------------------------------->
                            <br>
                            <select class="form-control" name="prior" width="auto">
                                <option value="" selected> Informe uma prioridade</option>
                                <option value="Não definida"> Não definida</option>
                                <option value=" Baixa"> Baixa </option>
                                <option value="Média"> Média</option>
                                <option value="Alta"> Alta</option>
                            </select>

                            <!----------------------------------APIARIO---------------------------------------->

                            <?php
                            $cod_apiario = "select DESCRICAO, COD_APIARIO FROM apiario"; //select recebe o texto 
                            $result = mysqli_query($conecta, $cod_apiario)
                                ?>

                            <br>
                            <select class="form-control" name="APIARIO" width="auto">
                                <option value="selecione" selected>Selecione um Apiário</option>
                                <?php
                                while ($dados = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $dados['COD_APIARIO'] ?>">

                                        <?php echo $dados['DESCRICAO'] ?>
                                    <?php } ?>
                                </option>
                            </select>
                            <br>

                            <!--SELECT ID FROM tabela ORDER BY ID DESC LIMIT1-->

                            <!----------------------------------OBSERVAÇÕES------------------------------------->

                            <h6 id="categoria"> Observações </h6>

                            <textarea class="form-control" name="OBS" rows="5" cols="30" id="area"
                                placeholder="Observações" maxlenght:300>
                            </textarea>

                            <br>
                            <a href="tarefas.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
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


                                        <td>
                                            <?php echo $linha['DESCRICAO']; ?>
                                        </td>
                                        <td>
                                            <?php echo $linha['RESPONSAVEL']; ?>
                                        </td>
                                        <td>
                                            <?php echo $linha['SITUACAO']; ?>
                                        </td>
                                        <?php
                                        $DATA = $linha['DATA_ATIVO'];
                                        $data_BR = implode("/", array_reverse(explode("-", $DATA)));
                                        ?>
                                        <td>
                                            <?php echo $data_BR; ?>
                                        </td>
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

                                marker.addListener('click', function () {
                                    info.fritsch.open(map, marker);
                                });

                                //NOVA JANELA DE INFORMAÇÃO DOS MARCADORES
                                var fritsch = new google.maps.InfoWindow({
                                    content: '<h2> Descrição marcador </h2>'
                                });

                                marker.addListener('click', function () {
                                    info.fritsch.open(map, marker);
                                });

                            }
                        </script>

                        <!-- MINHA CHAVE API MAPS-->
                        <script async
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE2VreFC7Urptz-GeKO7bJdEzm546VlDE&callback=initMap">
                            </script>



                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>