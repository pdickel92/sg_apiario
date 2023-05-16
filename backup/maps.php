<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--ESTILO DO MAPA-->
    <style>
        #map {
            height: 400px;
            width: 400px;
        }
    </style>
</head>

<body>
    <h4>Mapa</h4>

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
                content:'<h2> Descrição marcador </h2>'
            });
            
            marker.addListener('click', function(){
                info.fritsch.open(map, marker);
            });

            //NOVA JANELA DE INFORMAÇÃO DOS MARCADORES
            var fritsch = new google.maps.InfoWindow({
                content:'<h2> Descrição marcador </h2>'
            });
            
            marker.addListener('click', function(){
                info.fritsch.open(map, marker);
            });

        }
    </script>

    <!-- MINHA CHAVE API MAPS-->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE2VreFC7Urptz-GeKO7bJdEzm546VlDE&callback=initMap">
    </script>

</body>

</html>