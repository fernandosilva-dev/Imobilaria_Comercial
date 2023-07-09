<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Inserir Mensagem</title>
  <meta charset="utf-8">
  <!-- Inclui as bibliotecas Bootstrap e jQuery -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<!-- Inicia a tag DIV com a classe CONTAINER do Bootstrap -->
<div class="container" style="padding-top:25px;">
  <div class="panel panel-success">
    <div class="panel-heading"><center><b>Inserir Mensagem</b></center></div>
    <div class="panel-body">
    <?php
    $vDestino = "'index.php'";
        //Requer o uso do arquivo externo de configurações 
        require('../gerencial/configuracoes.php');
        //Realiza a conexão
        $vConexao=mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
        if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
        //Cria o código SQL
        $vNome=$_POST['vNome'];  
        $vEmail=$_POST['vEmail'];  
        $vTelefone=$_POST['vTelefone'];
        $vMensagem=$_POST['vMensagem'];

        $vSql='INSERT INTO mensagens
               (nome, email, telefone, mensagem)
               VALUES
               ("'.$vNome.'", "'.$vEmail.'", "'.$vTelefone.'", "'.$vMensagem.'")';
        //Executa o código SQL
        $vExecucao=mysqli_query($vConexao, $vSql);
        if (!$vExecucao) {die('Problemas na execução da instrução SQL: ' . mysqli_error($vConexao));}
        echo '<center>
               <p>Mensagem enviada com sucesso!</p>
               <button class="btn btn-success" onclick="window.location.href='.$vDestino.'">Ok</button>
              </center>';
       //Fecha a conexão
       mysqli_close($vConexao);
       
    ?>
    </div>
  </div>
</div>

</body>
</html>
