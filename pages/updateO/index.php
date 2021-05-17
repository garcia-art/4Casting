<?php
    include_once('../../controllers/conexao.php');
    $cod= $_POST['opoId'];
    $sql= "SELECT * FROM oportunidade WHERE opoId = '$cod';";
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
  <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
  <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->

</head>

<body>
<?php include_once("../headerC/index.php"); ?> 
  <div class="flex">

    <div class="wrapper">
      <div class="title">
        Editar Informações
      </div>
      <form action="../../controllers/oportunidadesController.php?acao=update" method="post">
        <div class="form">
        <input type="hidden" name="opoId" value="<?php echo $linha['opoId']?>">
          
          <div class="inputfield">
            <label>Nome</label>
            <input type="text" class="input" name="opoNome" value="<?php echo $linha['opoNome']?>" required>
          </div>

          <div class="inputfield">
            <label>Descrição</label>
            <textarea name="opoDescricao" id="" cols="30" rows="5" class="input" value="" style="resize: none" required><?php echo $linha['opoDescricao']?></textarea>
          </div>

          <div class="inputfield">
            <label>Local</label>
            <input type="text" class="input" name="opoLocal" value="<?php echo $linha['opoLocal']?>" required>
          </div>

          <div class="inputfield">
            <label>Data</label>
            <input type="date" name="opoLimite" value="<?php echo $linha['opoLimite']?>" class="input" required>
          </div>

          <div class="inputfield">
            <label>Informações Extras</label>
            <textarea cols="30" rows="5" name="opoExtra" id="" class="input" value="" required><?php echo $linha['opoExtra']?></textarea>
          </div>

          


          <div class="inputfield">
            <input type="submit" value="Confirmar Alterações" class="btn">
            
          </div>
          
        </div>
    </div>
    </form>
  </div>
</body>

</html>

