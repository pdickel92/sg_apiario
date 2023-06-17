<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Gerenciamento de Apicultores</title>
  <style>
    /* Estilos CSS para o menu */
    .menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      /* Amarelo com transparência background: rgba(0, 0, 0, 0.5);">*/
      padding: 10px;
      text-align: center;
      font-size: 20px;
      /* Tamanho de fonte maior */
      font-family: Arial, sans-serif;
      transition: background-color 0.3s;
    }

    .menu.transparente {
      background-color: rgba(0, 0, 0, 0.4);
      /* Amarelo mais transparente */
    }

    .menu a {
      display: inline-block;
      margin: 0 10px;
      color: #dfb127;
      text-decoration: none;
      transition: color 0.3s;
      position: relative;
      /* Adicionado para posicionar o sublinhado */
    }

    .menu a:hover {
      color: yellow;
      text-decoration: underline;
      text-decoration-color: yellow;
    }


    /* Estilos CSS para o formulário de login inserido do formulario antigo */


    .title {
      /* titulo do login */

      font-family: 'open_sansregular';
      font-size: 2em;
      color: #dfb127;
      margin-bottom: 30px;
      border-bottom: 1px #202020 solid;
      padding-bottom: 10px;

    }

    /* botao flutuante do whatsapp */
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
    }


    .link {
      color: #ffffff;
    }

    .btn {
      /* aqui esta o arredondamento dos botoes */

      width: 100%;
      background-color: #dfb127;
      border-radius: 20px;
      border: 0;
      box-sizing: border-box;
      color: #ffffff;
      cursor: pointer;
      font-size: 1.2em;
      font-family: 'open_sansregular';
      height: 50px;
      margin-top: 20px;
      outline: 0;
      text-align: center;
      transition: 0.4s;

    }


    /* Estilos CSS para o formulário de login */
    .formulario {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.32);
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    }

    .title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* .input-container {
      position: relative;
      margin-bottom: 20px;
    } */

    .input {
      width: 100%;
      padding: 10px;
      border: none;
      border-bottom: 1px solid #888;
      font-size: 16px;
      border-radius: 10px;
    }

    .label {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px;
      font-size: 16px;
      pointer-events: none;
    }

    .link {
      margin-top: 20px;
      text-align: center;
    }

    .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #666;
    }

    .legenda-p {

      background-color: transparent;
      border-radius: 8px;
      height: 20px;
      left: 20px;
      position: absolute;
      top: -20px;
      transform: translateY(0);
      transition: transform 200ms;
      width: 100px;

    }

    /* Estilos CSS para a seção de contratação */
    .contratacaojanela {
      height: 1000px;
      background-image: url(img/background.jpg);
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 24px;

      flex-direction: column;
      align-items: center;
    }

    .titulo-plano {
      order: -1;
    }


    /* .contratacao {
      padding: 50px;
      text-align: center;
    }

    .contratacao h2 {
      font-size: 24px;
      margin-bottom: 20px;
    } */

    .plano {
      display: none;
      margin-top: 20px;
      font-size: 18px;
      width: 200px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin: 0 10px;
      display: inline-block;
    }



    /* Estilos CSS para a barra de slide */

    /* body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        } */

    .container {
      /* max-width: 70px; */
      margin: 0 auto;
      text-align: center;
    }

    .slider {
      width: 600px;
      height: 5px;
      background-color: rgba(000, 00, 00, 0.3);
      position: relative;
      margin-bottom: 280px;
    }

    /* .range {
            width: 0;
            height: 100%;
            background-color: #2196f3;
            position: absolute;
        } */

    .marker {
      width: 20px;
      height: 20px;
      background-color: #fff;
      border: 2px solid #2196f3;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      transform: translate(-50%, -50%);
      cursor: pointer;
    }

    .plano {
      width: 160px;
      height: 170px;
      display: inline-block;
      text-align: center;
      margin-right: 10px;

      border-radius: 6px;
      box-shadow: 0 4px 6px rgba(255, 255, 0, 0.2);
      transition: all 0.3s ease;
      cursor: pointer;
      background-color: rgba(0, 0, 0, 0.3);
    }

    .plano.active {
      border-color: darkgoldenrod;
      box-shadow: 0 4px 6px rgba(255, 255, 0, 0.6);
      height: 350px;
      background-color: rgba(255, 255, 255, 0.6);
    }

    .plano h3 {
      margin-top: 20px;
      font-size: 20px;
      color: black;
    }

    .plano p {
      font-size: 15px;
      color: black;
    }

    .plano .texto-explicativo {
      display: none;
      font-size: 14px;
      color: black;
      padding: 10px;
    }

    .plano.active .texto-explicativo {
      display: block;
      color: black;
    }

    .legenda {
      font-size: 20px;
      color: white;
      margin-top: 5px;

    }

    /* Estilos CSS para a seção de vantagens */
    .vantagens {
      height: 1000px;
      background-color: #fff;
      text-align: center;
      font-size: 24px;
      padding-top: 200px;
      background-image: url(img/background.jpg);
    }

    .vantagens-adicionais {
      display: flex;
      flex-wrap: wrap;
    }

    .vantagem {
      flex-basis: 15%;
      text-align: center;
      margin-bottom: 20px;
      margin-left: auto;
      margin-right: auto;
    }


    .vantagem img {
      width: 100%;
      max-width: 100px;
      height: auto;
      margin-bottom: 10px;
    }


    /* Estilos CSS para a seção de história da empresa */
    .historia {
      height: 1000px;
      background-color: rgba(240, 250, 30, 0.2);
      text-align: center;
      font-size: 24px;
      padding-top: 200px;

    }

    .imagens-lado-a-lado {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .vantagemhistoria {
      text-align: center;
      margin: 0 10px;
    }

    .vantagemh img {
      width: 100%;
      max-width: 200px;
      height: auto;
      margin-bottom: 10px;
    }


    /* Estilos CSS para a seção de informações da empresa e contatos */
    .informacoes {
      height: 1000px;
      background-color: #fff;
      text-align: center;
      font-size: 24px;
      padding-top: 200px;
      background-image: url(img/background.jpg);
    }

    .empreendedor {
      /* height: 10px; */
      text-align: center;
      margin: 0 10px;
    }

    /* Estilos CSS para as redes sociais */
    .redes-sociais {
      height: 600px;
      background-color: #fff;
      text-align: center;
      font-size: 24px;
      padding-top: 60px;
      background-color: rgba(200, 200, 200, 0.6);
    }

    /* Estilo para o plano de fundo */
    body {
      background-image: url(img/background.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      background-color: rgba(200, 200, 200, 0.6);
    }
  </style>
  <script>
    window.addEventListener('scroll', function () {
      var menu = document.querySelector('.menu');
      if (window.scrollY > 0) {
        menu.classList.add('transparente');
      } else {
        menu.classList.remove('transparente');
      }
    });
  </script>
  <!-- termina função da slide bar da parte de contratação -->
</head>

<body>
  <div class="menu">
    <a href="#contratacaojanela">Contratação</a>
    <a href="#vantagens">Vantagens</a>
    <a href="#historia">Quem somos</a>
    <a href="#informacoes">Informações</a>
    <a href="#redes-sociais">Redes Sociais</a>
    <a href="#login">Login</a>
  </div>

  <div class="whatsapp-float">
    <a href="javascript:void(0);" onclick="openWhatsApp();" target="_blank">
      <img src="img/wpp.png" alt="WhatsApp" width="50" height="50">
    </a>
  </div>

  <script>
    function openWhatsApp() {
      var mensagem = encodeURIComponent("Olá, gostaria de adquirir um plano do software de gerenciamento de apiários");
      var numero = "55991696366"; // Substitua pelo número do WhatsApp para onde a mensagem será enviada

      var url = "https://wa.me/" + numero + "?text=" + mensagem;
      window.open(url, '_blank');
    }
  </script>


  <img src="img/logo2.png" style="display: block; margin: 0 auto;">

  <form class="formulario" id="login" method="post" action="verifica_login.php">
    <div class="title">Login</div>
    <div class="input-container">
      <input id="nome" name="USUARIO" class="input" type="text" placeholder="Usuário" />
      <div class="legenda-p"></div>
      <!-- <label for="nome" class="label icon icon-user-1">Nome</label> -->
    </div>
    <br>
    <br>
    <div class="input-container">
      <input id="email" class="input" name="SENHA" type="password" placeholder="Senha" />
      <div class="legenda-p"></div>
      <!-- <label for="email" class="label icon icon-lock-1">Senha</label> -->
    </div>
    <br>
    <p class="link">
      Ainda não tem cadastro?
      <a href="#paracadastro">Cadastre-se</a>
    </p>
    <button type="text" class="btn">Entrar</button>
  </form>

  <script>
    function limparTexto() {
      var nomeInput = document.getElementById("nome");
      if (nomeInput.value === "Nome") {
        nomeInput.value = "";
        nomeInput.style.color = "#000";
      }
    }

    function restaurarTexto() {
      var nomeInput = document.getElementById("nome");
      if (nomeInput.value === "") {
        nomeInput.value = "Nome";
        nomeInput.style.color = "#999";
      }
    }
  </script>

  <div class="contratacaojanela" id="contratacaojanela">
    <h2 class="titulo-plano">Escolha o melhor plano</h2>

    <div class="container">
      <div class="plano" data-acessos="1">
        <h3>Home</h3>
        <p>Recursos avançados</p>
        <p>Atendimento prioritário</p>
        <p>Atualizações regulares</p>
        <div class="texto-explicativo">
          <p>Valores:</p>
          <p>1 usuário</p>
          <p>R$100,00/mês</p>
          <p>5 usuários</p>
          <p>R$220,00/mês</p>
        </div>
      </div>

      <div class="plano" data-acessos="2">
        <h3>Basic</h3>
        <p>Recursos premium</p>
        <p>Suporte 24/7</p>
        <p>Acesso a novas funcionalidades</p>
        <div class="texto-explicativo">
          <p>Valores:</p>
          <p>3 usuários</p>
          <p>R$440,00/mês</p>
          <p>6 usuários</p>
          <p>R$590,00/mês</p>
        </div>
      </div>

      <div class="plano" data-acessos="5">
        <h3>Premium</h3>
        <p>Recursos avançados</p>
        <p>Integração com IoT</p>
        <p>Assistência personalizada</p>
        <div class="texto-explicativo">
          <p>Valores:</p>
          <p>4 usuários</p>
          <p>R$930,00/mês</p>
          <p>8 usuários</p>
          <p>R$1320,00/mês</p>
        </div>
      </div>

      <div class="plano" data-acessos="10">
        <h3>Enterprise</h3>
        <p>Todos os recursos disponíveis</p>
        <p>Suporte prioritário</p>
        <p>Personalização avançada</p>
        <div class="texto-explicativo">
          <p>Valores:</p>
          <p>10 usuários</p>
          <p>R$1100,00/mês</p>
          <p>Usuários ilimitados</p>
          <p>R$2220,00/mês</p>
        </div>
      </div>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="slider" style="margin: 0 auto;">
        <div class="range"></div>
        <div class="marker"></div>
      </div>

      <button onclick="openWhatsApp()" class="btn">
        <div class="legenda">Selecione um plano e clique aqui</div>
      </button>
    </div>
  </div>
  <script>
    var slider = document.querySelector('.slider');
    var range = document.querySelector('.range');
    var marker = document.querySelector('.marker');
    var planos = document.querySelectorAll('.plano');
    var legenda = document.querySelector('.legenda');

    marker.addEventListener('mousedown', function (e) {
      document.addEventListener('mousemove', moveSlider);
      document.addEventListener('mouseup', stopSlider);
    });

    planos.forEach(function (plano) {
      plano.addEventListener('click', function (e) {
        var activePlano = plano;
        planos.forEach(function (plano) {
          plano.classList.remove('active');
        });
        activePlano.classList.add('active');
        updateSliderPosition(activePlano);
        updateLegenda(activePlano);
      });
    });

    function moveSlider(e) {
      var sliderRect = slider.getBoundingClientRect();
      var offsetX = e.clientX - sliderRect.left;
      var sliderWidth = slider.offsetWidth;
      var markerWidth = marker.offsetWidth;
      var percentage = (offsetX / (sliderWidth - markerWidth)) * 100;

      if (percentage < 0) {
        percentage = 0;
      } else if (percentage > 100) {
        percentage = 100;
      }

      marker.style.left = percentage + '%';
      range.style.width = percentage + '%';

      var activePlano = getActivePlano(percentage);
      setActivePlano(activePlano);
      updateLegenda(activePlano);
    }

    function stopSlider() {
      document.removeEventListener('mousemove', moveSlider);
      document.removeEventListener('mouseup', stopSlider);
    }

    function getActivePlano(percentage) {
      var activePlano = null;

      if (percentage < 25) {
        activePlano = planos[0];
      } else if (percentage >= 25 && percentage < 50) {
        activePlano = planos[1];
      } else if (percentage >= 50 && percentage < 75) {
        activePlano = planos[2];
      } else {
        activePlano = planos[3];
      }

      return activePlano;
    }

    function setActivePlano(plano) {
      planos.forEach(function (plano) {
        plano.classList.remove('active');
      });
      plano.classList.add('active');
    }

    function updateSliderPosition(plano) {
      var planoIndex = Array.from(planos).indexOf(plano);
      var percentage = (planoIndex / (planos.length - 1)) * 100;
      marker.style.left = percentage + '%';
      range.style.width = percentage + '%';
    }

    function updateLegenda(plano) {
      legenda.textContent = 'Quero adquirir o ' + plano.querySelector('h3').textContent;
    }

    function openWhatsApp() {
      var planoSelecionado = document.querySelector('.plano.active');
      var planoTexto = planoSelecionado.querySelector('h3').textContent;
      var mensagem = encodeURIComponent("Olá, visualizei o site de gestão de apiários e gostaria de saber mais informações sobre o plano " + planoTexto);
      var numero = "55991696366"; // Substitua pelo número do WhatsApp para onde a mensagem será enviada

      var url = "https://wa.me/" + numero + "?text=" + mensagem;
      window.open(url, '_blank');
    }
  </script>

  <div id="vantagens" class="vantagens">
    <h2>Vantagens de usar nosso sistema</h2>
    <p>Aqui estão algumas vantagens do nosso sistema de gerenciamento para apicultores:</p>
    <ul>
      <p>Maior eficiência operacional: Gerencie tarefas diárias e economize tempo.</p>
      <p>Monitoramento preciso das colmeias: Obtenha informações em tempo real sobre temperatura, umidade e atividade
        das abelhas.</p>
      <p>Tomada de decisão informada: Acesse análises avançadas para otimizar a produção de mel e a saúde das abelhas.
      </p>
    </ul>
    <br>
    <br>
    <br>
    <div class="vantagens-adicionais">
      <div class="vantagem">
        <img src="img/check.png" alt="Checklist Online">
        <p>Checklist Online</p>
      </div>
      <div class="vantagem">
        <img src="img/like.png" alt="Fácil de usar">
        <p>Fácil de usar</p>
      </div>
      <div class="vantagem">
        <img src="img/nuvem.png" alt="Totalmente online">
        <p>Totalmente online</p>
      </div>
      <div class="vantagem">
        <img src="img/relatorio.png" alt="Relatórios personalizados">
        <p>Relatórios personalizados</p>
      </div>
      <div class="vantagem">
        <img src="img/suport.png" alt="Suporte via WhatsApp">
        <p>Suporte via WhatsApp</p>
      </div>
      <div class="vantagem">
        <img src="img/iot.png" alt="IOT">
        <p>Monitoramento IOT</p>
      </div>
    </div>
  </div>



  <div id="historia" class="historia">
    <div id="historia" class="historia">
      <h2 style="color: black;">Nossa história</h2>
      <ul style="color: black;">
        <p>Na incubadora do Instituto Federal Farroupilha, três jovens estudantes, impulsionados por visões
          empreendedoras
          e movidos por incansável esforço, transformaram um sistema inovador em uma empresa de sucesso. Através de
          determinação,
          habilidade e dedicação, eles construíram um empreendimento que se destacou no mercado, conquistando
          reconhecimento
          e prosperidade. Essa trajetória exemplar é um testemunho inspirador do potencial empreendedor presente nas
          mentes jovens, e um símbolo do impacto transformador que pode ser alcançado quando a criatividade e a
          persistência se unem em busca de um sonho.</p>
      </ul>
      <br>
      <br>
      <br>
      <div class="imagens-lado-a-lado">
        <div class="vantagemh">
          <img src="img/empresario1.png" alt="Nerd infiado">
          <p>Nerd infiado</p>
        </div>
        <div class="vantagemh">
          <img src="img/empresario2.png" alt="Vendedor falante">
          <p>Vendedor falante</p>
        </div>
        <div class="vantagemh">
          <img src="img/empresario3.png" alt="Cabeça branca">
          <p>Cabeça branca</p>
        </div>
      </div>



      <div id="informacoes" class="informacoes">
        <h2>Tech Solutions Ltda.</h2>
        <ul>

        </ul>

        <div>
          <p>A Tech Solutions Ltda. é uma empresa inovadora e líder no setor
            de tecnologia da informação. Nós nos especializamos no
            desenvolvimento de software personalizado para atender às necessidades
            específicas de nossos clientes. Além disso, oferecemos serviços de consultoria em TI,
            auxiliando empresas a otimizarem seus processos e alcançarem resultados excepcionais.</p>
          <img src="img/empresa.jpeg">
          <p>Sede do estelionato</p>
        </div>
      </div>

      <div id="redes-sociais" class="redes-sociais">
        <h2>Tech Solutions Ltda.</h2>
        <ul>
          <p>Segmento: Desenvolvimento de Software e Consultoria em TI</p>
          <p>Endereço: Rua Das Loucuras, 123 - Panambi, RS</p>
          <p>Telefone: (55) 99169-6366</p>
          <p>Email: techs@techs.com.br</p>
        </ul>
        <h2>Redes Sociais</h2>
        <p>Conecte-se conosco nas redes sociais:</p>
        <ul>
          <a href="https://www.instagram.com" name="Instagram" class="ms-auto" target="_blank"><img src="img/insta.png"
              width="37px" height="35px"></a>
          <a href="https://www.facebook.com" name="Facebook" class="ms-auto" target="_blank"><img src="img/face.png"
              width="37px" height="35px"></a>
          <a href="https://www.twitter.com" name="Twitter" class="ms-auto" target="_blank"><img src="img/twitter.png"
              width="37px" height="35px"></a>
          <a href="https://www.youtube.com" name="Youtube" class="ms-auto" target="_blank"><img src="img/youtube.png"
              width="37px" height="35px"></a>
        </ul>
        <footer>
          <div class="direitos">
            <p>Copyrights © 2026 Todos os direitos reservados</p>
          </div>
          <div class="links">
            <a href="termos-de-uso.html">Termos de uso</a> /
            <a href="politica-de-privacidade.html">Política de Privacidade</a>
          </div>
        </footer>
      </div>
</body>

</html>