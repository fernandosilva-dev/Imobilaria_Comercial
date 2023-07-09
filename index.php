<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Litoral imóveis</title>

    <!-- CSS básico de Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontes personalizadas para este modelo -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Biblioteca CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Estilos personalizados para este modelo -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Página Inicial</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#imoveis">Imóveis</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#sobre">Quem somos</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contato">Fale conosco</a>
            </li>

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" target="_blank" href="../gerencial/index.php">Área Restrita</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Cabeçalho -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/logo.png" alt="">
        <h1 class="text-uppercase mb-0">Litoral Imoveis imobiliaria</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Ramo imobiliario do litoral norte do RS</h2>
      </div>
    </header>

    <!-- GALERIA DE IMOVEIS -->
    <section class="imoveis" id="imoveis">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Galeria de Imoveis</h2>
        <hr class="star-dark mb-5">
        <div class="row">

        <?php
        //Requer o uso do arquivo externo de configurações 
  require('../gerencial/configuracoes.php');
  //Realiza a conexão
  $vConexao=mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
  if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

  //Cria o código SQL
  $vSql='SELECT '.
      'imoveis.id, '.
      'cidades.nome as "cidade", '.
      'imoveis.foto, '.
      'imoveis.logradouro, '.
      'imoveis.numero, '.
      'imoveis.bairro, '.
      'imoveis.complemento, '.
      'imoveis.descricao, '.
      'imoveis.preco '.
      'FROM imoveis, cidades '.
      'WHERE 
      imoveis.cidade = cidades.id ';

  //Executa o código SQL
  $vExecucao=mysqli_query($vConexao, $vSql);
  if (!$vExecucao) {die('Problemas na execução da instrução SQL: ' . mysqli_error($vConexao));}

  //Conta registros da tabela
  $vCont=mysqli_num_rows($vExecucao);
  if ($vCont==0) {die('<h3><center>Nenhuma registro encontrado!</center></h2>');}

  //Define o diretório das imagens
  $vDir = "../gerencial/img"; 
  // Carrega todos as imagens
  while ($vTabela=mysqli_fetch_array($vExecucao)) 
    {
    $vFoto=$vTabela['foto']; 
    $vCidade=$vTabela['cidade']; 
    $vLogradouro=$vTabela['logradouro']; 
    $vNumero=$vTabela['numero']; 
    $vBairro=$vTabela['bairro'];
    $vComplemento=$vTabela['complemento']; 
    $vDescricao=$vTabela['descricao']; 
    $vPreco= number_format($vTabela['preco'], 2, ',', '.');
    //Verifica se o arquivo é PNG ou JPG
    //if ((substr($vArquivo,-4) == ".png") or
    //    (substr($vArquivo,-4) == ".jpg")) 
      { 
      //Insere as imagens na lista para exibição
      echo '
      <div class="col-md-6 col-lg-4">
          <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
            <i class="fas fa-search-plus fa-3x"></i>
          </div>
       <img class="img-fluid" src="'.$vDir.'/'.$vFoto.'" alt=""> 
        <div class="galeria-caption-heading"> CIDADE: '.$vCidade.'</div>
        <div class="galeria-caption-subheading"> LOGRADOURO: '.$vLogradouro.'</div>
        <div class="galeria-caption-subheading"> NÚMERO: '.$vNumero.'</div>
        <div class="galeria-caption-subheading"> BAIRRO: '.$vBairro.'</div>
        <div class="galeria-caption-subheading"> COMPLEMENTO: '.$vComplemento.'</div>
        <div class="galeria-caption-subheading"> DESCRIÇÃO: '.$vDescricao.'</div>
        <div class="galeria-caption-subheading"> PREÇO: '.$vPreco.'</div>
    </div>
           ';
      }
    }
        ?>     
        </div>
      </div>
    </section>

    <!-- Seção QUEM SOMOS -->
    <section class="bg-primary text-white mb-0" id="sobre">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Quem somos</h2>
        <hr class="star-light mb-5">
        <div class="row">


        <div class="col-lg-3 ml-auto">
            <p class="lead">Fundada em 2021, visando crescer por todo o nosso pais, estamos com o proposito de negociar imoveis ideais para nossos clientes no nosso litoral norte.</p>
          </div>
    
           <div class="col-lg-4 ml-auto">
            <p class="lead">Imobiliaria do litoral norte do rio grande do sul, com o propósito de prestar um atendimento honesto e profissional a todos os clientes. Ramo imobiliario com filiais em Tramandaí, osório, torres,imbé, capão da canoa, Balneario Pinhal, Cidreira e Xangrilá.</p>
          </div>

        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fas fa-download mr-2"></i>
            Retornar ao início!
          </a>
        </div>
      </div>
    </section>

    <!-- Seção FALE CONOSCO -->
    <section id="contato">
  <head>
  <title>Mensagens de Alerta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Fale Conosco</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 
            Para configurar o endereço de e-mail do formulário de contato, vá para a pasta "mail" e altere o arquivo "contact_me.php", atualizando o endereço de e-mail na linha 19. 
            O formulário deve funcionar na maioria dos servidores web. Se o formulário não funcionar, pode ser necessário configurar o servidor web de forma diferente.
            -->
             <form method="post" action="mensagem_inserir_executar.php">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nome</label>
                  <input class="form-control" id="vNome" name="vNome" type="text" placeholder="Nome" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>E-mail</label>
                  <input class="form-control" id="vEmail" name="vEmail" type="email" placeholder="E-mail" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefone</label>
                  <input class="form-control" id="vTelefone" name="vTelefone" type="tel" placeholder="Telefone" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Mensagem</label>
                  <textarea class="form-control" id="vMensagem" name="vMensagem" rows="5" placeholder="Mensagem" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <!-- Mensagem de Sucesso -->
             <div class="alert alert-success alert-dismissible" id="vSucesso" name="vSucesso" style="display:none;">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Successo!</strong> Esta caixa de alerta indica uma ação bem-sucedida.
             </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton" onclick="document.querySelector('#vSucesso').style.display='block'">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Rodapé -->

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>SENAC-RS &copy; Projeto integrador do curso técnico em informática</small>
        <p>pagina desenvolvida pelo aluno Fernando Silva do curso técnico em informática do senac Tramandaí!
      </div>

    <!-- Rolar para o botão superior (visível apenas em telas pequenas e extra-pequenas) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>


    <!-- Biblioteca JavaScript do Bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Biblioteca JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Biblioteca JavaScript para o formulário de contato-->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Biblioteca com scripts para customização deste modelo -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
