<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu </title>
    <link rel="stylesheet" href="css/estiloCat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>
<?php
include("config_login.php");
$exibe_apiario = "select * from apiario where SITUACAO = 'Ativo'"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_apiario) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
// função mysqli_query retorna um valor inteiro ou TRUE se a query for bem sucedida ou false se a consulta for considerada ilegal ou não montada coretamente
?>

<body>
    <!-- menu de navegação responsivo-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container-fluid">

            <!--mostrar usuario e data-->
            <span class="navbar-text"><?php $hoje = date('d/m/Y');
                                        echo $hoje . "&nbsp; &nbsp; Bem vindo: usuario logado " ?></span>

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
    <div class="container-fluid  cont">
        

       
<div class="container">

    <!------------------------------------inicio da linha fn------------------------------------------------------------->
    <div class="row fn ">
            <!-- classe chamada fn-->
            <div class="col-md-5">
                <button type="button " class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                    + Adicionar</button>
                <button type="button " class="btn btn-secondary btn-sm">Consultar</button>
                <input type="text" class="input" id="#" placeholder="Digite aqui...">
            </div>
        </div>
</div>
        <!------------------------------------inicio da linha fn------------------------------------------------------------->
    <!------------------------------------inicio tabela de dados ----------------------------------------------------------------->
    <div class="container">
        <table class=" table table-striped  ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Local</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    while ($linha  = mysqli_fetch_array($resultado)) //enquanto $linha receber função mysqli_fetch_array ($resultado)
                    {
                        $desc_apiario     = $linha["DESCRICAO"];
                        $desc_LOCAL       = $linha["LOCAL"];
                        $resp             = $linha["RESPONSAVEL"];
                        $apSTATUS         = $linha["SITUACAO"];
                        $CODapiario       = $linha["COD_APIARIO"];

                        //abaixo mistura código em html com php

                        echo "<tr> <td>" . $desc_apiario . "</td>";
                        echo "<td>" . $desc_LOCAL . "</td>";
                        echo "<td>" . $resp . "</td>";
                        echo "<td>" . $apSTATUS . "</td>";
                        echo "<td>
                                                <a href='muda_status/mudaSTATUS_apiario.php?COD_APIARIO=$CODapiario'><img src='img/confirma.png' width='20px' height='20px'></img></a>
                                                <a href=excluir/excluir_apiario.php?COD_APIARIO=$CODapiario'><img src='img/excluir.png' width='20px' height='20px'></img></a>
                                                <a href='editar/editar_apiario.php?COD_APIARIO=$CODapiario'><img src='img/editar.png' width='20px' height='20px'></img></a>

                                                </td></tr>";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <!------------------------------------------------ final  tabela de dados---------------------------------------------------------->












</body>

</html>