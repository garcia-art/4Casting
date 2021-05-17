<?php
    include_once('../../controllers/conexao.php');

    if (!isset($_SESSION)) session_start();

    if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
      and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

    } else {

      header('../../loginC/index.php');
    }

    $cod= $_SESSION['conId'];
    $sql= "SELECT * FROM contratante WHERE conId = '$cod';";
    $dados= mysqli_query($conexao,$sql);
    
    $linha = mysqli_fetch_assoc($dados);
?>



<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4 Casting - Conexões Artísticas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- Bootstrap Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> <!-- Font Awesome -->
  <link rel="stylesheet" href="../../css/global.css"> <!-- CSS Global -->
  <link rel="stylesheet" href="../../css/cadastroO.css"> <!-- CSS Local -->
  <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->

</head>

<body>
  <header>
    <div class="header">
      <h2 class="logo">4Casting</h2>


      <ul class="menu">
        <a href="#sec1"><i class="fas fa-home"></i></a>
      </ul>
    </div>
  </header>
  <div class="flex">

    <div class="wrapper">
      <div class="title">
        Criar Oportunidade
      </div>
      <form action="../../controllers/oportunidadesController.php?acao=insert" method="post">
      <input type="hidden" name="conId" value="<?php echo $_SESSION['conId']?>">
        <div class="form">
          <div class="inputfield">
            <label>Nome</label>
            <input type="text" class="input" name="opoNome" placeholder="Insira um nome para a oportunidade." required>
          </div>

          <div class="inputfield">
            <label>Descrição</label>
            <textarea cols="30" rows="5" name="opoDescricao" id="" cols="30" rows="5" class="input" maxlenght="10" placeholder="Escreva uma descrição sobre a oportunidade." style="resize: none" required></textarea>
          </div>

          <div class="inputfield">
            <label>Local</label>
            <input type="text" class="input" name="opoLocal" placeholder="Ex: Centro - São Paulo - SP" required>
          </div>

          <div class="inputfield">
            <label>Data</label>
            <input type="date" name="opoLimite" class="input" required>
          </div>

          <div class="inputfield">
            <label>Informações Extras</label>
            <textarea cols="30" rows="5" type=text name="opoExtra" id="" cols="30" rows="5" class="input" maxlenght="10" placeholder="Escreva mais informações sobre a oportunidade, duração, cachê, regime de trabalho, etc." style="resize: none" required></textarea>
          </div>

          


          <div class="inputfield">
            <input type="submit" value="Criar Oportunidade" class="btn">
          </div>
        </div>
    </div>
    </form>
  </div>
</body>

</html>

