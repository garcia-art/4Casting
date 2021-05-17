<?php 

	if (!isset($_SESSION)) session_start();

	if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
		and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

	} else {

		header('../../loginC/index.php');
	}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4 Casting - Conexões Artísticas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- Bootstrap Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> <!-- Font Awesome -->
  <link rel="stylesheet" href="../../css/global.css"> <!-- CSS Global -->
  <link rel="stylesheet" href="./index.css"> <!-- CSS Local -->
  <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
  <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->


</head>
<body>
   <?php include_once("../headerC/index.php"); ?>
<!-- partial:index.partial.html -->
<div class='split-pane col-xs-12 col-sm-6 uiux-side'>
  <div>
    <img src='../../assets/icons/oportunidade.svg'>
    <div class='text-content'>
      <div class="bold">Quer gerenciar suas oportunidades?</div>
    </div>
   
    <a class='button' href="../oportunidadesC/index.php" id="different" >
      Ver Oportunidades
    </a>
  </div>
</div>
<div class='split-pane col-xs-12 col-sm-6 frontend-side'>
  <div>
    <img src='../../assets/icons/profile.svg'>
    <div class='text-content'>
      <div class="bold">Quer ver seu perfil?</div>
    </div>
    <a class='button' href="../perfilC/index.php" id="different2">
      Ver Perfil
    </a>
  </div>
</div>
<div id='split-pane-or'>
  <div>
    <!-- <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/bcr-white.png'> -->
  </div>
</div>
<!-- partial -->
  
</body>
</html>
