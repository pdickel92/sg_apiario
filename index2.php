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
      background-color: rgba(0, 0, 0, 0.1);
      /* Amarelo com transparência background: rgba(0, 0, 0, 0.5);">*/
      padding: 10px;
      text-align: center;
      color: rgba(0, 0, 0, 1);
      font-size: 18px;
      /* Tamanho de fonte maior */
      font-family: Arial, sans-serif;
      transition: background-color 0.3s;
    }

    .menu.transparente {
      background-color: rgba(250, 250, 0, 0.4);
      /* Amarelo mais transparente */
    }

    .menu a {
      display: inline-block;
      margin: 0 10px;
      color: #333;
      text-decoration: none;
      transition: color 0.3s;
      position: relative;
      /* Adicionado para posicionar o sublinhado */
    }

    .menu a:hover {
      color: #666;
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
      background-color: #f2f2f2;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .menu a:hover::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #444;
      /* Cinza escuro */
    }

    .title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .input-container {
      position: relative;
      margin-bottom: 20px;
    }

    .input {
      width: 100%;
      padding: 10px;
      border: none;
      border-bottom: 1px solid #888;
      font-size: 16px;
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

    /* Estilos CSS para a seção de contratação */
    .contratacao {
      height: 500px;
      background-image: url(img/background.jpg);
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 24px;
    }

    .plano {
      width: 200px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin: 0 10px;
      display: inline-block;
    }

    /* Estilos CSS para a seção de vantagens */
    .vantagens {
      height: 500px;
      background-color: #fff;
      text-align: center;
      font-size: 24px;
      padding-top: 200px;
      background-image: url(img/background.jpg);
    }

    /* Estilos CSS para a seção de história da empresa */
    .historia {
      height: 500px;
      background-color: rgba(200, 250, 60, 0.3);
      text-align: center;
      font-size: 24px;
      padding-top: 200px;
   
    }

    /* Estilos CSS para a seção de informações da empresa e contatos */
    .informacoes {
      height: 500px;
      opacity: 0.4;
      text-align: center;
      font-size: 24px;
      padding-top: 200px;
      color: black;
      background-image: url(img/empresa1.jpeg);
    }

    /* Estilos CSS para as redes sociais */
    .redes-sociais {
      height: 500px;
      background-color: #fff;
      text-align: center;
      font-size: 24px;
      padding-top: 200px;
    }

    /* Estilo para o plano de fundo */
    body {
      background-image: url(img/background.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
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
</head>

<body>
  <div class="menu">
    <a href="#contratacao">Contratação</a>
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

  <img src="img/logo2.png">

  <form class="formulario" id="login" method="post" action="verifica_login.php">
    <div class="title">Login</div>
    <div class="input-container">
      <input id="nome" name="USUARIO" class="input" type="text" placeholder="" />
      <div class="legenda-p"></div>
      <label for="nome" class="label icon icon-user-1">Nome</label>
    </div>
    <div class="input-container">
      <input id="email" class="input" name="SENHA" type="password" placeholder="" />
      <div class="legenda-p"></div>
      <label for="email" class="label icon icon-lock-1">Senha</label>
    </div>
    <br>
    <p class="link">
      Ainda não tem cadastro?
      <a href="#paracadastro">Cadastre-se</a>
    </p>
    <button type="text" class="btn">Entrar</button>
  </form>

  <div id="contratacao" class="contratacao">
    <h2>Escolha plano ideal para o seu negócio e tenha mais controle dos seus apiários</h2>
    <button type="button" onclick="openWhatsApp();" class="btn">Contrate seu plano aqui</button>


    <div>
      <div class="plano">1 usuário<br>R$120,00</div>
      <div class="plano">2 usuários<br>R$150,00</div>
      <div class="plano">5 usuários<br>R$250,00</div>
      <div class="plano">10 usuários<br>R$550,00</div>
    </div>
  </div>

  <div id="vantagens" class="vantagens">
    <h2>Vantagens de usar nosso sistema</h2>
    <p>Aqui estão algumas vantagens do nosso sistema de gerenciamento de apicultores:</p>
    <ul>
      <li>Maior eficiência operacional: Automatize tarefas diárias e economize tempo.</li>
      <li>Monitoramento preciso das colmeias: Obtenha informações em tempo real sobre temperatura, umidade e atividade
        das abelhas.</li>
      <li>Tomada de decisão informada: Acesse análises avançadas para otimizar a produção de mel e a saúde das abelhas.
      </li>
    </ul>
  </div>

  <div id="historia" class="historia">
    <h2>Nossa história</h2>

    <ul>Na incubadora do Instituto Federal Farroupilha, três jovens estudantes, impulsionados por visões empreendedoras
      e movidos por incansável esforço,
      transformaram um sistema inovador em uma empresa de sucesso. Através de determinação, habilidade e dedicação, eles
      construíram um empreendimento
      que se destacou no mercado, conquistando reconhecimento e prosperidade. Essa trajetória exemplar é um testemunho
      inspirador do potencial
      empreendedor presente nas mentes jovens, e um símbolo do impacto transformador que pode ser alcançado quando a
      criatividade e a persistência
      se unem em busca de um sonho.</ul>
  </div>

  <div id="informacoes" class="informacoes">
    <h2>Tech Solutions Ltda.</h2>
    <p>Informações da Empresa:</p>
    <ul>
      <li>Nome da Empresa: Tech Solutions Ltda.</li>
      <li>Setor: Tecnologia da Informação</li>
      <li>Segmento: Desenvolvimento de Software e Consultoria em TI</li>
    </ul>
    <p>Sobre a Empresa: A Tech Solutions Ltda. é uma empresa inovadora e líder no setor
      de tecnologia da informação. Nós nos especializamos no
      desenvolvimento de software personalizado para atender às necessidades
      específicas de nossos clientes. Além disso, oferecemos serviços de consultoria em TI,
      auxiliando empresas a otimizarem seus processos e alcançarem resultados excepcionais.</p>
  </div>

  <div id="redes-sociais" class="redes-sociais">
  <h2>Contatos</h2>
    <ul>
        <li>Endereço: Rua Das Loucuras, 123 - Cidade Panambi, RS</li>
        <li>Telefone: (55) 99169-6366</li>
        <li>Email: techs@techs.com.br</li>
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


