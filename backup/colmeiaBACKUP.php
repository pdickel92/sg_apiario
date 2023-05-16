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
$exibe_colmeia = "select * from lista_colmeia3"; //$busca_CATcaixas recebe o código SQL
$resultado = mysqli_query($conecta, $exibe_colmeia) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
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
    <!--final container-->

    <!-- div container envolve toda a tabela-->
    <div class="container ct-tabela ">

        <!------------------------------------inicio tabela de dados ----------------------------------------------------------------->
        <div class="row linhaTAB ">
            <table class=" table table-striped  overflow-x: hidden ">
                <thead class="table-dark">
                    <tr table>
                        <th scope="col">Colméia</th>
                       
                        <th scope="col ">Dados da caixa</th>
                        <th scope="col ">Raínha</th>
                        <th scope="col">Instalação</th>
                        <th scope="col">Enxame</th>
                        <th scope="col">Origem</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="table-striped">
                        <?php
                        while ($linha  = mysqli_fetch_array($resultado)) //enquanto $linha receber função mysqli_fetch_array ($resultado)
                        {
                            $desc_COLM          = $linha["DESC_COLMEIA"];
                            
                            $desc_caixa         = $linha["CAIXA"];
                            $desc_rainha        = $linha["DESC_RAINHA"];
                            $dt_instalacao      = $linha["DATA_INSTALACAO"];
                            $desc_especie       = $linha["ESPECIE"];
                            $desc_origem        = $linha["ORIGEM"];
                            $desc_situacao      = $linha["SITUACAO"];
                            $CODcolmeia         = $linha["COD_COLMEIA"];
                            // $DT_inativ        = $linha["DATA_INATIVACAO"];                                   

                            //inverter data padrão brasileiro 
                            $data = implode("/", array_reverse(explode("-", $dt_instalacao)));

                            //abaixo mistura código em html com php

                            echo "<tr><td>" . $desc_COLM . "</td>";
                            
                            echo "<td>"    . $desc_caixa . "</td>";
                            echo "<td>"        . $desc_rainha . "</td>";
                            echo "<td>"        . $dt_instalacao . "</td>";
                            echo "<td>"        . $desc_especie . "</td>";
                            echo "<td>"        . $desc_origem . "</td>";
                            echo "<td>"        . $desc_situacao . "</td>";

                            echo "<td>
                                
                                 <a href='muda_status/mudaSTATUS_colmeia.php?COD_COLMEIA=$CODcolmeia'><img src='img/confirma.png' width='20px' height='20px' alt='Lumis Portal'></img></a>
                                 <a href='editar/editar_colmeia.php?COD_COLMEIA=$CODcolmeia'><img src='img/editar.png' width='20px' height='20px' alt='Lumis Portal'></img></a>
                                                        
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


                <!--INICIO FORMULARIO DE PESQUISA ----------------------------------------------------------------------------------->
                <form class="d-flex" method="POST" action="consulta/buscar_colmeia.php">
                    <button type="button" class="btn  btn-dark btcad " data-bs-toggle="modal" data-bs-target="#CadApiarioModal">
                        + Adicionar</button>

                    <input class="form-control" name="pesquisar" type="text" />
                    <button type="submit" class="btn btn-primary">Pesquisa</button>
                </form>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Colméias</h1>
                </div>
                <!--inicio corpo do modal-->
                <div class="modal-body">

                    <div class="col-md-12">
                        <!--inicio formulario de cadastro-->
                        <form class="form-group " method="POST" name="cadCOLMEIA" action="colmeia.php">

                            <!--<label for="" class="">Descrição do Apiário</label>-->
                            <input type="date" class="form-control" required maxlength="30" name="DT_INST" placeholder="Informe a data da instalação" onfocus="this.value='';" />
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
                            <!------------------------------------------ORIGEM------------------------------------------>
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
                            <!------------------------------------------ENXAME------------------------------------------>
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
                            $cod_apiario = "select LOCAL, COD_APIARIO FROM apiario"; //select recebe o texto 
                            $result = mysqli_query($conecta, $cod_apiario)
                            ?>

                            <!-- Inicio select campo apiario -->
                            <select name="APIARIO" class="form-control" width="auto">
                                <option value="selecione" selected>Selecione o Apiário</option>
                                <?php
                                while ($dados = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $dados['COD_APIARIO'] ?>">

                                        <?php echo $dados['LOCAL'] ?>
                                    <?php } ?>
                                    </option>
                            </select>
                            <br>
                            <a href="colmeia.php"><button type="button" class="btn btn-secondary">Cancelar </button></a>
                            <button type="submit" class="btn btn-primary" name="enviar">Adicionar</button>
                        </form>


                        <!--------------------------------------------------PHP CADASTRO DE COLMEIA----------------------------------------------------------------->

                        <?php

                        //session_start(); //inicio de sessão
                        //if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
                        //  header("location:index.php");                   // redirecionar usuario para index.php
                        //session_destroy();
                        //}

                        // PEGAR DATA E CONCATENAR COM STRING

                        date_default_timezone_set('America/Sao_Paulo');
                        $data_SISTEMA = date('His');
                        $id_tarefa = ("#C" . $data_SISTEMA);

                        $desccolmeia            = $id_tarefa;


                        //if (isset($_POST['STATUS'] ['DT_INST']['caixa']['enxame'] ['origem']['RAINHA']['APIARIO'])) {


                        //recebe dados do formulario de cadastro pelo metodo POST

                        $status                    = $_POST["STATUS"];
                        $dt_instal                 = $_POST["DT_INST"];
                        $desccaixa                 = $_POST["caixa"];
                        $enxame                    = $_POST["enxame"];
                        $origem                    = $_POST["origem"];
                        $rainha                    = $_POST["RAINHA"];
                        $apiario                   = $_POST["APIARIO"];


                        $status = "Ativo";

                        //include_once("config_login.php");

                        $consulta_desc = mysqli_query($conecta, "select * from colmeia where DESC_COLMEIA = '$desccolmeia'");

                        //busca ocorrencia de rainha
                        $consulta_rainha = mysqli_query($conecta, "select * from colmeia where COD_RAINHA = '$rainha'");
                        $valor       = mysqli_num_rows($consulta_desc);
                        $valor2       = mysqli_num_rows($consulta_rainha);


                        //valor recebe 0 se não tem ninguem com o cpf informado no formulário
                        //valor recebe 1 se existe um usuário cadastrado

                        //if ($valor or $valor2 > 0) {
                        if ($valor2 > 0) {
                            echo "<script>alert('Registro já cadastrado!');</script>";
                            echo "<script>alert('Colméia adicionada com sucesso!');</script>";

                            //echo "<script>window.history.go(-1);</script>";
                        } else {
                            $insercao = mysqli_query($conecta, "INSERT into colmeia values('$desccolmeia','$status','$dt_instal','','$desccaixa','$enxame','$origem','$rainha','$apiario','')") or die("Falha ao inserir um novo registro!");

                            if ($insercao == 1) {
                                echo "<script>window.location = 'colmeia.php'</script>";
                                echo "<script>alert('Colméia adicionada com sucesso!');</script>";
                            }
                            //coloquei só um if,já que se der erro, acusa no php
                        }

                        mysqli_close($conecta);
                        ?>

                        <!------------------------------------------------------FIM DO PHP CADASTRO COLMEIA-------------------------------------->


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