<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Apiário </title>
    <link rel="stylesheet" href="css/estiloCat.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<?php
include("config_login.php");
$exibe_apiario = "select * from apiario where SITUACAO = 'Ativo'"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_apiario) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
// função mysqli_query retorna um valor inteiro ou TRUE se a query for bem sucedida ou false se a consulta for considerada ilegal ou não montada coretamente
?>

<body>
    <!-- MENU DE NAVEGAÇÃO RESPONSIVO-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container container_nav">

            <!--mostrar usuario e data-->
            <span class="navbar-text">Bem vindo: Fernando
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
    <div class="container-fluid container-logo ">

        <!-----------------------------------inicio da linha 1---------------------------------------------------------------->
        <div class="row l1">

            <!----------------------------------------------- coluna 1 linha 1------------------------------------------------>
            <div class="col-md-12 coluna-logo">
                <div class="img">
                    <img class="logo" src="img/logo2.png" alt="img">
                </div>
            </div>

        </div>
        <!------------------------------------final da linha 01-------------------------------------------------------------->
    </div>


    <!--CONTAINER TABELA DE DADOS-->
    <div class="container ct-tabela ">
        <div class="row linhaTAB ">
            <table class=" table table-striped   ">
                <thead class="table-dark ">
                    <tr table>
                        <th scope="col ">Descrição</th>
                        <th scope="col">Local</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ativo desde</th>
                        <th scope="col">Ações</th>
                        <th scope="col">Ver detalhes</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="table-striped">
                        <?php
                        while ($linha  = mysqli_fetch_array($resultado)) //enquanto $linha receber função mysqli_fetch_array ($resultado)
                        {
                            $desc_apiario     = $linha["DESCRICAO"];
                            $desc_LOCAL       = $linha["LOCAL"];
                            $resp             = $linha["RESPONSAVEL"];
                            $apSTATUS         = $linha["SITUACAO"];
                            $CODapiario       = $linha["COD_APIARIO"];
                            $dt_ativo       = $linha["DATA_ATIVO"];

                            // INVERTER DATA PADRÃO BRASILEIRO
                            $data = implode("/", array_reverse(explode("-", $dt_ativo)));

                            //abaixo mistura código em html com php

                            echo "<tr> <td>" . $desc_apiario . "</td>";
                            echo "<td>" . $desc_LOCAL . "</td>";
                            echo "<td>" . $resp . "</td>";
                            echo "<td>" . $apSTATUS . "</td>";
                            echo "<td>" . $data . "</td>";
                            echo "<td>
                                                <a href='muda_status/mudaSTATUS_apiario.php?COD_APIARIO=$CODapiario'><img src='img/confirma.png' width='20px' height='20px' alt='Desativar Apiário'></img></a>
                                                <a href='editar/editar_apiario.php?COD_APIARIO=$CODapiario' alt='Editar informações'><img src='img/editar.png' width='20px' height='20px'></img></a>
                                                <a href='#detalhes_AP' data-bs-toggle='modal'><img src='img/editar.png' width='20px' height='20px'></img></a>
                                                
                                    </td>";
                            echo "<td> <button type='button' id='$CODapiario' class='btn btn-primary ' data-bs-toggle='modal' data-bs-target='#detalhes_AP'> 
                            COD_APIARIO=$CODapiario
                            </button>    
                                </td>                            
                                                
                                                
                                </tr>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!---CONTAINER ITENS DO RODAPE--->
    <div class="container-fluid">

        <div class="row fixed-bottom  linhacad ">

            <!--INICIO DA COLUNA1--->
            <div class="col-md-3 offset-1 ">

                <!--FORMULARIO DE PESQUISA--->
                <form class="d-flex" action="apiario.php" method="POST">
                    <input class="form-control" name="pesquisar" type="text" />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pesquisa">Pesquisa</button>
                </form>
            </div>

            <!--INICIO DA COLUNA2--->
            <div class="col-md-1">
                <button type="button" class="btn  btn-dark btcad " data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                    + Adicionar
                </button>
            </div>

            <!--INICIO DA COLUNA3 ABRE MODAL MAPS APIARIO--->
            <div class="col-md-1">
                <button type="button" class="btn  btn-dark btcad " data-bs-toggle="modal" data-bs-target="#detalhes_AP">
                    + Adicionar
                </button>
            </div>
        </div>
    </div>


    <!-- FIM DO CÓDIGO --------------------------------------(ITENS VISIVEIS EM 1 PLANO)--------------------------------------------->



    <!--MODAL DE CADASTRO DE APIARIO-->
    <div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!--CABEÇALHO-->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Apiários</h1>
                </div>
                <!--CORPO-->
                <div class="modal-body">

                    <div class="col-md-12">
                        <!--FORMULARIO-->
                        <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_APIARIO.php">

                            <input type="text" class="form-control" required maxlength="50" name="LOCAL" placeholder="Informe a localização do apiário" onfocus="this.value='';" />
                            <br> <input type="text" class="form-control" required maxlength="30" name="RESPONSAVEL" placeholder="Informe o responsável " onfocus="this.value='';" />
                            <input type="hidden" id="input" name="dt_inativo" />
                            <input type="hidden" id="input" name="dt_ativo" />
                            <input type="hidden" id="input" name="situacao" /><br>
                            <a href="apiario.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                            <button type="submit" class="btn btn-primary" name="enviar">Adicionar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--MODAL RESULTADO DA CONSULTA --->
    <div class="modal fade " id="pesquisa" tabindex="-1" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!--inicio cabeçalho do modal-->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="#">Tela de consulta</h1>
                </div>

                <!--inicio corpo do modal-->
                <div class="modal-body">
                    <table class="table">
                        <?php

                        if (isset($_POST['pesquisar'])) {
                            //$pesquisar = $_GET['pesquisar'];

                        }
                        //echo $teste;
                        $pesquisar = $_POST['pesquisar'];
                        echo $pesquisar;
                        $result = $SQL = "SELECT * FROM apiario WHERE DESCRICAO LIKE '%$pesquisar%' 
                                        OR RESPONSAVEL LIKE '%$pesquisar%' OR 'LOCAL' LIKE '%$pesquisar%'";
                        $resultado_apiario = mysqli_query($conecta, $result);

                        while ($linha = mysqli_fetch_array($resultado_apiario)) {


                            $desc  =  $linha['DESCRICAO'];
                            $resp  =  $linha['RESPONSAVEL'];
                            $local = $linha['LOCAL'];
                            $sit   = $linha['SITUACAO'];
                            $ativacao = $linha['DATA_ATIVO'];

                            echo "<tr><td>" . $desc . "<td>";
                            echo "<td>" . $resp . "<td>";
                            echo "<td>" . $local . "<td>";
                            echo "<td>" . $sit . "td>";
                            echo "<td>" . $ativacao . "td></tr>";
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!--MODAL MAIS DETALHES DO APIÁRIO --->
    <div class="modal fade " id="detalhes_AP" tabindex="-1" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog " title="<?php $desc_apiario?>">
            <div class="modal-content">

                <!--inicio cabeçalho do modal-->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="#">Tela de consulta</h1>
                </div>

                <!--inicio corpo do modal-->
                <div class="modal-body">
                    <table class="table">
                        <?php

                        echo $CODapiario;
                        /*
                        if (isset($_POST['pesquisar'])) {
                            //$pesquisar = $_GET['pesquisar'];

                        }
                        //echo $teste;
                        $pesquisar = $_POST['pesquisar'];
                        echo $pesquisar;
                        $result = $SQL = "SELECT * FROM apiario WHERE DESCRICAO LIKE '%$pesquisar%' 
                                        OR RESPONSAVEL LIKE '%$pesquisar%' OR 'LOCAL' LIKE '%$pesquisar%'";
                        $resultado_apiario = mysqli_query($conecta, $result);

                        while ($linha = mysqli_fetch_array($resultado_apiario)) {


                            $desc  =  $linha['DESCRICAO'];
                            $resp  =  $linha['RESPONSAVEL'];
                            $local = $linha['LOCAL'];
                            $sit   = $linha['SITUACAO'];
                            $ativacao = $linha['DATA_ATIVO'];

                            echo "<tr><td>" . $desc . "<td>";
                            echo "<td>" . $resp . "<td>";
                            echo "<td>" . $local . "<td>";
                            echo "<td>" . $sit . "td>";
                            echo "<td>" . $ativacao . "td></tr>";
                        }
                        */
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>