<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu </title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- menu de navegação responsivo-->
    <nav class="navbar  bg-dark  navbar-dark">
        <div class="container-fluid">
            <!--Botão chamar login-->
            <button class="btn btn-primary" onclick="openForm()">Login</button>
            <button type="button" class="btn  btn-dark btn-sm  btcad " data-bs-toggle="modal" data-bs-target="#mapas">
                Adicionar <img src='img/add.png' width='22px' height='22px' class=" img-responsive ">
            </button>

    </nav>
    <!-- container que contém todo o conteudo-->
    <div class="container-fluid cont1 ">
        <!--linha 01-->
        <div class="row l1">
            <!-- coluna 1 linha 1-->

            <div class="col-md-12 col-xs-1 mx-auto align-items-center  ">
                <div class="img">
                    <img class="logo" src="img/logo2.png" alt="img">
                </div>
            </div>

        </div>
    </div>
    <!--inicio linha 2-->
    <div class="row l2">
        <!--inicio coluna 1 linha2------------------------------------------------------------------->
        <div class="col-md-6 prevT">
            <!-- inicio previsão do tempo classe -->
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
                                        <div class="booked-wzs-250-175-date">Quinta-Feira, 06 Outubro</div>
                                        <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Ver Previsão de 7 Dias</span> </div>
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
                    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1');
                    document.getElementsByTagName("head")[0].appendChild(css_file);

                    function setWidgetData_31359(data) {
                        if (typeof(data) != 'undefined' && data.results.length > 0) {
                            for (var i = 0; i < data.results.length; ++i) {
                                var objMainBlock = document.getElementById('m-booked-weather-bl250-31359');
                                if (objMainBlock !== null) {
                                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                                    objMainBlock.innerHTML = data.results[i].html_code;
                                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                                }
                            }
                        } else {
                            alert('data=undefined||data.results is empty');
                        }
                    }
                    var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=333690;type=3;scode=124;ltid=3457;domid=585;anc_id=20130;countday=undefined;cmetric=1;wlangID=8;color=137AE9;wwidth=160;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";
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
        <!-- inicio coluna2 da linha 2---------------------------------------------------------------->
        <div class="col-md-6 prevT">
            <div class="cotacao">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/markets/stocks-usa/" rel="noopener" target="_blank"><span class="blue-text">Bolsa de Valores Hoje</span></a> por TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
                        {

                            "colorTheme": "light",
                            "dateRange": "1D",
                            "exchange": "US",
                            "showChart": true,
                            "locale": "br",
                            "largeChartUrl": "",
                            "isTransparent": true,
                            "showSymbolLogo": false,
                            "showFloatingTooltip": true,
                            "width": "270",
                            "height": "200",
                            "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                            "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                            "gridLineColor": "rgba(240, 243, 250, 0)",
                            "scaleFontColor": "rgba(106, 109, 120, 1)",
                            "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                            "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                            "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                            "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                            "symbolActiveColor": "rgba(41, 98, 255, 0.12)"
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
    <div class="row l3">
        <div class="col-md-12">


        </div>
    </div>
    <!--inicio formulario de login-->
    <div class="form-popup" id="form_loginUsuario">
        <form action="verifica_login.php" class="form-container" method="post" name="login">


            <label for="nome"><b>Nome</b></label>
            <input type="text" class="form-control" placeholder="Informe o usuário" name="USUARIO" required>

            <br><label for="senha"><b>Senha</b></label>
            <input type="password" class="form-control" placeholder="Informe a senha" name="SENHA" required>
            <br>
            <button type="submit" class="btn btn-secundary ">Entrar</button><br>
            <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
        </form>
    </div>

    <script>
        function openForm() {
            document.getElementById("form_loginUsuario").style.display = "block";
        }

        function closeForm() {
            document.getElementById("form_loginUsuario").style.display = "none";

        }
    </script>
    <!--fim formulario de login-->


    <!---------------- FIM DA ÁREA VISIVEL------------------------------------------------------------------------------------------------>

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