<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu </title>

    <!--GRAFICO APEX CHARTS-->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--CSS-->
    <link rel="stylesheet" href="css/estilo_principal.css">

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--JAVA SCRIPT BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php

    //session_start(); //inicio de sessão
    //if (!isset($_SESSION['USUARIO_LOGIN'])){            // se a sessão USUARIO_LOGIN não for encontrada
     //header("location:index.php");                   // redirecionar usuario para index.php
    //session_destroy();
    //}


    include("config_login.php");
    ?>
    <!-- menu de navegação responsivo-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container">
            <!--mostrar usuario e data-->
            <span class="navbar-text">
                Bem vindo: Fernando
            </span>
            <!--botão responsivo-->
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


    <!-- container que contém todo o conteudo-->
    <div class="container CONT img-responsive mx-auto align-items-center " style="background-color:whitesmoke;">

        <!--linha 01-->
        <div class="row img-responsive mx-auto align-items-center pt-2 " style="background-color: whitesmoke;">

            <!--COLUNA01 LINHA01-->
            <div class="col-md-12 img-responsive mx-auto align-items-center text-center ">
                <div class="IMG">
                    <img src="img/logo2.png" alt="img" style="max-width: 220px;">
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="background-color:whitesmoke;">

        <!--LINHA02-->
        <div class="row pt-5 " style="min-height:250px;">

            <!--COLUNA01 LINHA02--->
            <div class="col-md-3 pt-2 ">

                <!--CONTAINER DENTRO DA COLUNA 01 LINHA 02-->
                <!--TESTE  CHARTS-->
                <div id="chart"></div>
                <script>
                    //OPÇÕES DO GRÁFICO
                    var options = {
                        chart: {
                            type: 'bar'
                        },

                        //SÉRIES
                        series: [{
                            name: 'sales',
                            data: [2, 3, 5, 5],

                        }],




                        //EIXO X
                        xaxis: {
                            categories: ["Apiários", "Colméias", "Tarefas", "Raínhas"]
                        }
                    }


                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                </script>

            </div>

            <!--COLUNA02 LINHA02-->
            <div class="col-md-3 pt-2 ">

                <!--CONTAINER DENTRO DA COLUNA 02 LINHA 02-->
                <div clas="container ">
                    <div class="row ">
                        <div class="col">

                            <!--PREVISÃO DO TEMPO -->
                            <div class="tempo">
                                <div id="m-booked-weather-bl250-31359">
                                    <div class="booked-wzs-250-175 weather-customize" style="background-color:#137AE9;width:160px;" id="width1">
                                        <div class="booked-wzs-250-175_in">
                                            <div class="booked-wzs-250-175-data">
                                                <div class="booked-wzs-250-175-left-img wrz-18"> </div>
                                                <div class="booked-wzs-250-175-right">
                                                    <div class="booked-wzs-day-deck">
                                                        <div class="booked-wzs-day-val">
                                                            <div class="booked-wzs-day-number"><span class="plus">+</span>19</div>
                                                            <div class="booked-wzs-day-dergee">
                                                                <div class="booked-wzs-day-dergee-val">&deg;</div>
                                                                <div class="booked-wzs-day-dergee-name">C</div>
                                                            </div>
                                                        </div>
                                                        <div class="booked-wzs-day">
                                                            <div class="booked-wzs-day-d">H: <span class="plus">+</span>22&deg;</div>
                                                            <div class="booked-wzs-day-n">L: <span class="plus">+</span>16&deg;</div>
                                                        </div>
                                                    </div>
                                                    <div class="booked-wzs-250-175-info">
                                                        <div class="booked-wzs-250-175-city">Panambi </div>
                                                        <div class="booked-wzs-250-175-date">Quinta-Feira, 06 Outubro
                                                        </div>
                                                        <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Ver Previsão de 7
                                                                Dias</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250">
                                                <tr>
                                                    <td>Sex</td>
                                                    <td>Sáb</td>
                                                    <td>Dom</td>
                                                    <td>Seg</td>
                                                    <td>Ter</td>
                                                    <td>Qua</td>
                                                </tr>
                                                <tr>
                                                    <td class="week-day-ico">
                                                        <div class="wrz-sml wrzs-18"></div>
                                                    </td>
                                                    <td class="week-day-ico">
                                                        <div class="wrz-sml wrzs-01"></div>
                                                    </td>
                                                    <td class="week-day-ico">
                                                        <div class="wrz-sml wrzs-18"></div>
                                                    </td>
                                                    <td class="week-day-ico">
                                                        <div class="wrz-sml wrzs-18"></div>
                                                    </td>
                                                    <td class="week-day-ico">
                                                        <div class="wrz-sml wrzs-03"></div>
                                                    </td>
                                                    <td class="week-day-ico">
                                                        <div class="wrz-sml wrzs-01"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="week-day-val"><span class="plus">+</span>18&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>23&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>15&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>15&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>18&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>21&deg;</td>
                                                </tr>
                                                <tr>
                                                    <td class="week-day-val"><span class="plus">+</span>12&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>10&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>7&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>7&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>9&deg;</td>
                                                    <td class="week-day-val"><span class="plus">+</span>8&deg;</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    var css_file = document.createElement("link");
                                    var widgetUrl = location.href;
                                    css_file.setAttribute("rel", "stylesheet");
                                    css_file.setAttribute("type", "text/css");
                                    css_file.setAttribute("href",
                                        'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1');
                                    document.getElementsByTagName("head")[0].appendChild(css_file);

                                    function setWidgetData_31359(data) {
                                        if (typeof(data) != 'undefined' && data.results.length > 0) {
                                            for (var i = 0; i < data.results.length; ++i) {
                                                var objMainBlock = document.getElementById('m-booked-weather-bl250-31359');
                                                if (objMainBlock !== null) {
                                                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data
                                                        .results[i].widget_type);
                                                    objMainBlock.innerHTML = data.results[i].html_code;
                                                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                                                }
                                            }
                                        } else {
                                            alert('data=undefined||data.results is empty');
                                        }
                                    }
                                    var widgetSrc =
                                        "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=333690;type=3;scode=124;ltid=3457;domid=585;anc_id=20130;countday=undefined;cmetric=1;wlangID=8;color=137AE9;wwidth=160;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";
                                    widgetSrc += ';ref=' + widgetUrl;
                                    widgetSrc += ';rand_id=31359';
                                    var weatherBookedScript = document.createElement("script");
                                    weatherBookedScript.setAttribute("type", "text/javascript");
                                    weatherBookedScript.src = widgetSrc;
                                    document.body.appendChild(weatherBookedScript)
                                </script>
                                <!-- weather widget end -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <!--COLUNA03 LINHA02-->
            <div class="col-md-6  ">
                <!--CONTAINER DENTRO DA COLUNA 03 LINHA 02-->
                <div clas="container ">
                    <div class="row mt-3">
                        <div class="col">

                            <?php

                            $exibe_apiario = "select * from tarefa"; //$busca_CATcaixas recebe o código SQL
                            $resultado = mysqli_query($conecta, $exibe_apiario) // $resultado recebe por comando mysqli_query as variaveis $conecta e $busca_CATcaixas
                            // função mysqli_query retorna um valor inteiro ou TRUE se a query for bem sucedida ou false se a consulta for considerada ilegal ou não montada coretamente
                            ?>

                            <!--CONTAINER TABELA DE DADOS-->
                            <div class="container ct-tabela ">
                                <div class="row linhaTAB  dt-responsive table-responsive ">
                                    <div class="col table-responsive">
                                        <table class=" table table-striped  ">
                                            <thead class="table-dark    ">
                                                <tr class="table-md   ">
                                                    <th scope="col">Categoria</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Prioridade</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-striped ">
                                                    <?php
                                                    $sql_BUSCA_TAREFA = "SELECT * FROM tarefa";
                                                    $BUSCA_TAREFA = mysqli_query($conecta, $sql_BUSCA_TAREFA);
                                                    while ($linha  = mysqli_fetch_array($BUSCA_TAREFA)) {



                                                        echo "<td>" . $linha['CATEGORIA'];
                                                        "</td>";
                                                        echo "<td>" . $linha['DATA_TAREFA'];
                                                        "</td>";
                                                        echo "<td>" . $linha['PRIORIDADE'];
                                                        "</td>                                                                                                
                                                      

                                                            
                                                     
                                                </tr>";
                                                    } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="container">
                    <div class="row fixed-bottom " style="min-height:170px; background-color:black;">


                        <div clas="container-fluid ">
                            <div class="row">
                                <div class="col-2 offset-1 mt-2" style=" border-radius:10px;">


                                </div>
                                <div class="col-2 offset-1 mt-2" style=" border-radius:10px;">


                                </div>
                            </div>
                        </div>


                    </div>

                </div>

</body>

</html>