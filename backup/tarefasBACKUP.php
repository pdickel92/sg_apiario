<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Apiário </title>
    <link rel="stylesheet" href="css/estiloCat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>
<?php
include("config_login.php");
$exibe_apiario = "select * from lista_tarefa3 where TAR_STATUS = 'pendente'"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_apiario) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
// função mysqli_query retorna um valor inteiro ou TRUE se a query for bem sucedida ou false se a consulta for considerada ilegal ou não montada coretamente
?>

<body>
    <!-- menu de navegação responsivo-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container">

            <!--mostrar usuario e data-->
            <span class="navbar-text">Bem vindo: usuario logado
            </span>

            <!--botão -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" style="cursor:pointer">
                <span class="navbar-toggler-icon">
                </span>
            </button>

            <!--itens do botão-->
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
    </nav>
    <!-- container do conteudo-->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!--<input type="text" class="input" id="#" placeholder="Digite aqui...">
    <div class="container-fluid  "> -->


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
    <!------------------------------------final container----------------------------------------------------------------->

    <!-- div container envolve toda a tabela-->
    <div class="container ct-tabela ">

        <!------------------------------------inicio tabela de dados ----------------------------------------------------------------->
        <div class="row linhaTAB ">
            <table class=" table table-striped  overflow-x: hidden ">
                <thead class="table-dark">
                    <tr table>
                        <th scope="col ">Identificador</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Apiário</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-striped">
                        <?php
                        while ($linha  = mysqli_fetch_array($resultado)) //enquanto $linha receber função mysqli_fetch_array ($resultado)
                        {
                            $PRIORIDADE         = $linha["PRIORIDADE"];
                            $APIARIO            = $linha["LOCAL"];
                            $CODtarefa          = $linha["COD_TAREFA"];
                            $DT_tarefa          = $linha["DATA_TAREFA"];
                            $DESCtarefa         = $linha["DESC_TAREFA"];
                            $CATEGORIA          = $linha["CATEGORIA"];
                            $OBSERVACOES        = $linha["OBSERVACOES"];

                            //inverter data padrão brasileiro 
                            $data = implode("/", array_reverse(explode("-", $DT_tarefa)));
                            //abaixo mistura código em html com php

                            echo "<tr><td>"    . $DESCtarefa . "</td>";
                            echo "<td>"        . $data . "</td>";
                            echo "<td>"        . $CATEGORIA . "</td>";
                            echo "<td>"        . $PRIORIDADE . "</td>";
                            echo "<td>"        . $APIARIO . "</td>";

                            echo "<td>
                                        <a href='muda_status/mudaSTATUS_tarefa.php?COD_TAREFA=$CODtarefa'><img src='img/confirma.png' width='20px' height='20px'></img></a>
                                        <a href='excluir/excluir_tarefa.php?COD_TAREFA=$CODtarefa'><img src='img/excluir.png' width='20px' height='20px'></img></a>
                                        <a href='editar/editar_tarefa.php?COD_TAREFA=$CODtarefa'><img src='img/editar.png' width='20px' height='20px'></img></a>
                                    </td></tr>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row fixed-bottom  linhacad ">
            <div class="col-md-3 offset-1 ">

                <!-------------------------------------PESQUISA--------------------------------------------------------------->
                <form class="d-flex" method="POST" action="consulta/buscar_tarefa.php">
                    <button type="button" class="btn  btn-dark btcad " data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                        + Adicionar</button>

                    <input class="form-control" name="pesquisar" type="text" />
                    <button type="submit" class="btn btn-primary">Pesquisa</button>
                </form>
                <!-------------------------------------FIM PESQUISA------------------------------------------------------------>

            </div>

        </div>
    </div>

    </div>
    </div> <!-- final container-->
    <!------------------------------------------------ final  tabela de dados---------------------------------------------------------->




    <!------------------------------------inicio do modal------------------------------------------------------------->
    <!-- inicio tela modal de cadastro-->
    <div class="modal fade" id="CadApiarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <!--inicio cabeçalho do modal-->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Tarefas</h1>
                </div>
                <!--inicio corpo do modal-->
                <div class="modal-body">

                    <div class="col-md-12">
                        <!----------------------------inicio formulario de cadastro-------------------------->

                        <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_tarefa.php">
                            <input type="hidden" name="status" />

                            <br><input type="date" class="form-control" required maxlength="50" name="data" value="Data" onfocus="this.value='';" />

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
                            $cod_apiario = "select LOCAL, COD_APIARIO FROM apiario"; //select recebe o texto 
                            $result = mysqli_query($conecta, $cod_apiario)
                            ?>

                            <br>
                            <select class="form-control" name="APIARIO" width="auto">
                                <option value="selecione" selected>Selecione um Apiário</option>
                                <?php
                                while ($dados = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $dados['COD_APIARIO'] ?>">

                                        <?php echo $dados['LOCAL'] ?>
                                    <?php } ?>
                                    </option>
                            </select>
                            <br>

                            <!--SELECT ID FROM tabela ORDER BY ID DESC LIMIT1-->
                            
                            <!----------------------------------OBSERVAÇÕES------------------------------------->

                            <h6 id="categoria"> Observações </h6>

                            <textarea class="form-control" name="OBS" rows="5" cols="30" id="area" placeholder="Observações" maxlenght:300>
                            </textarea>

                            <br>
                            <a href="tarefas.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                            <button type="submit" class="btn btn-primary" name="enviar">Adicionar</button>
                        </form>

                    </div>
                </div>






                <!-------------------------------final código antigo------------------------------------------>
                </form>
            </div>
        </div>

        <!--fim formulario de cadastro-->


    </div>
    <!--fim tela modal de cadastro-->
    </div>
    </div>
    </div> <!-- fim tela modal de cadastro-->













</body>

</html>