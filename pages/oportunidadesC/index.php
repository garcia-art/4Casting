<?php 
include_once('../../controllers/conexao.php');
	if (!isset($_SESSION)) session_start();

	if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
		and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

	} else {

		header('../../loginC/index.php');
	}

  $cod= $_SESSION['conId'];
  $sql= "SELECT * FROM oportunidade WHERE Contratante_conId = '$cod';";
  $dados= mysqli_query($conexao,$sql);
 
  $array= [];
	while ($linha=mysqli_fetch_array($dados)) {
		$array[] = $linha;  
	}

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
  <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
  
  <link rel="stylesheet" href="./index.css"> <!-- CSS Local -->
    <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
     <?php include_once("../headerC/index.php"); ?> 
    
<div class="page">
<div class="subheader ">
            
            <form action="../cadastroO/index.php"><button type="submit" value="">Criar Oportunidade</button></form>
            
      
        </div>
<?php 
foreach ($array as $lin) {

?>
  
  <div class="wrapper">
  
    <div class="right">
        <div class="info">
            <h3><?php echo $lin['opoNome']?></h3>
            <div class="info_data">
                <div class="data">
                    <h4>Local</h4>
                    <p><?php echo $lin['opoLocal']?></p>
                </div>
                <div class="data">
                  <h4>Data</h4>
                    <p><input type=date disabled style="border: none; background-color: transparent; color: #919aa3; padding: 0;"  value="<?php echo $lin['opoLimite']?>" ></input>
                    </p>
              </div>
            </div>
        </div>
      
      

        <div class="projects">
          <div class="projects_data">
              <div class="data2">
                  <h4>Descricao</h4>
                  <p><?php echo $lin['opoDescricao']?>
                  </p>
              </div>
              
              
          </div>
      </div>

      <div class="projects">
        <div class="projects_data">
            <div class="data2">
                <h4>Informações Extras</h4>
                <p><?php echo $lin['opoExtra']?>
                </p>
            </div>
            
            
        </div>
    </div>
      
        <div class="social_media">
            <ul>
              <li>
              <a>
            <form action="../candidatos/index.php" method="post">
              <input type="hidden" value="<?php echo $lin['opoId']?>" name="opoId"></input>
              <button type="submit" value="">Candidatos</button>
            </form>
            </a>
            
            
            
            </li>
    
          </ul>
          <ul id="half">
          <li>
          <a>
            <form action="../updateO/index.php" method="post">
              <input type="hidden" value="<?php echo $lin['opoId']?>" name="opoId"></input>
              <button type="submit" value="">Editar</button>
            </form>
            </a>
    
           </li>
            
            <li ><a>
            <form action="../../controllers/oportunidadesController.php?acao=delete" method="post">
            <input type="hidden" value="<?php echo $lin['opoId']?>" name="opoId"></input>
            <button type="submit" value="">Excluir</button>
            </form>
            </a></li>
        </ul>
        
      </div>
    </div>
  </div>

<?php }?>


</div>
</body>
</html>