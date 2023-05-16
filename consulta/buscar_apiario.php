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
                <img class="logo" src="../img/log.png" alt="img">
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
            <table class=" table table-striped   ">
                <thead class="table-dark ">
                    <tr table>
                        <th scope="col ">Descrição</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Local</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ativo desde</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-striped">


                        <?php


                        //verifica se foi digitado endereço diretamente ai redirecionar para apiario.php
                        //if(!isset($_GET['dados'])){
                        //header("location.apiario.php");
                        //}
                        include("../config_login.php");
                        $pesquisar = $_POST['pesquisar'];
                        $result = $SQL = "SELECT * FROM apiario WHERE DESCRICAO LIKE '%$pesquisar%' 
                        OR RESPONSAVEL LIKE '%$pesquisar%' OR 'LOCAL' LIKE '%$pesquisar%'";
                        $resultado_apiario = mysqli_query($conecta, $result);

                        while ($linha  = mysqli_fetch_array($resultado_apiario)) //enquanto $linha receber função mysqli_fetch_array ($resultado)
                        {
                            $desc  =  $linha['DESCRICAO'];
                            $resp  =  $linha['RESPONSAVEL'];
                            $local = $linha['LOCAL'];
                            $sit   = $linha['SITUACAO'];
                            $ativacao = $linha['DATA_ATIVO'];

                            echo "<tr><td>" . $desc . "<td>";
                            echo "<td>" . $resp . "<td>";
                            echo "<td>" . $local . "<td>";
                            echo "<td>".$sit. "td></tr>";
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


                <!----------------------------------------------FORMULARIO DE PESQUISA------------------------------------------->
                <form class="d-flex" action="consulta/buscar_apiario.php" method="POST">
                    <button type="button" class="btn  btn-dark btcad " data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                        + Adicionar</button>

                    <input class="form-control" name="pesquisar" type="text" />
                    <button type="submit" class="btn btn-primary">Pesquisa</button>
                </form>
                <!----------------------------------------------FIM FORMULARIO DE PESQUISA----------------------------------------->

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tela de cadastro de Apiários</h1>
                </div>
                <!--inicio corpo do modal-->
                <div class="modal-body">

                    <div class="col-md-12">
                        <!--inicio formulario de cadastro-->
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

                <!--fim formulario de cadastro-->


            </div>
            <!--fim tela modal de cadastro-->
        </div>
    </div>



    <!------------------------------------inicio modal cosulta------------------------------------------------------------->

    </div>








    </div> <!-- fim tela modal de cadastro-->

</body>

</html>