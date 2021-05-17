<?php 

    include_once('../../controllers/conexao.php');
    
	if (!isset($_SESSION)) session_start();

	if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
		and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

	} else {

		header('../../loginC/index.php');
	}

    $cod= $_SESSION['conId'];
    $sql= "SELECT * FROM Artista_has_Oportunidade INNER JOIN artista ON Artista_has_Oportunidade.Oportunidade_artId = artista.artId INNER JOIN oportunidade ON Artista_has_Oportunidade.Oportunidade_opoId = oportunidade.opoId WHERE oportunidade.Contratante_conId=$cod;";
  
    $dados= mysqli_query($conexao,$sql);
   
    $array= [];
       while ($linha=mysqli_fetch_array($dados)) {
           $array[] = $linha;  
       }
    
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Casting - Conexões Artísticas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- Bootstrap Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../../css/global.css"> <!-- CSS Global -->
    <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./index.css"> <!-- CSS Local -->
      <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  </head>
  <body>
      <?php include_once("../headerC/index.php"); ?>
      
<!-- partial:index.partial.html -->
<section id="team">
        <div class="container my-3 py-5 text-center">
        
            <div class="row">
                <?php 
                    foreach ($array as $lin) {
                ?>
                    <div class="col-lg-3 col-md-6 pt-1">
                        <div class="card h-100">
                            <div class="card-body">
                                <img style="height:150px;" class="img-fouild rounded w-75 mb-3"
                                    src="<?php echo ("../../assets/imagensArtista/".$lin['artFoto']) ?>"
                                    alt="Sophie">
                                <h3><?php echo $lin['artNomeArt']?></h3>
                                <p><?php echo $lin['artCategoria']?></p>
                                <div class="d-flex flex-row justify-content-center">
                                    <form action="../detalheA/index.php" method="POST">
                                        <input type="hidden" value="<?php echo $lin['artId']?>" name="artId">
                                        <button id="button-a" type="submit">Ver Artista</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
<script src='https://use.fontawesome.com/releases/v5.15.1/js/all.js'></script>
</body>
</html>
