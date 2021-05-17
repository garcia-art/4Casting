<?php 
    include_once('../../controllers/conexao.php');
	if (!isset($_SESSION)) session_start();

	if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
		and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

	} else {
		header('../../loginC/index.php');
	}

    $cod= $_POST['artId'];
    $sql= "SELECT * FROM artista WHERE artId = '$cod';";
    $dados= mysqli_query($conexao,$sql);
    $linha=mysqli_fetch_array($dados);

?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Casting - Conexões Artísticas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- Bootstrap Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../../css/global.css"> <!-- CSS Global -->
    <link rel="stylesheet" href="./index.css"> <!-- CSS Local -->
    <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
    <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>

<body>
   <?php include_once("../headerA/index.php"); ?>


    <section >
        
<div >
        <div class="col-lg-8 col-md-12 col-sm-12 m-md-auto">
           <div class="subheader ">
            
            <form action="../../index.php" method="POST">
                <input name="artId" type="hidden" value="<?php echo $linha['artId']?>"> </input>
                <button type="submit" value="Gerar PDF">Gerar Currículo</button>
            </form>
            
            <form action="../../controllers/contratanteController.php?acao=selecionar" method="POST">
                <button type="submit" value="Gerar PDF">Selecionar Candidato</button>
            </form>
           

        </div> 
            <div class="side-profile-bar text-center shadow rounded">
                <img class="rounded" src="<?php echo ("../../assets/imagensArtista/".$linha['artFoto']) ?>" width="240px">
                <h2><?php echo $linha['artNome']?></h2>
                <div class="line"></div>
                <p></p>
                <ul class="side-profile-bar-social-list list-inline text-center">

                            
                    
                                        <li class="list-inline-item">
                        <a href="http://instagram.com/realisacnovaes" title="git-123">
                            <span> </span>
                        </a>
                    </li>
                    
                                        <li class="list-inline-item">
                        <a href="https://wa.me/+5519982795627" title="+5519982795627">
                            <span> </span>
                        </a>
                    </li>
                    
                                    </ul>
               
            </div> <!-- div shadow rounded ends here -->
        </div>   <!-- Info Card end s here-->

        <div class="col-lg-8 col-md-12 col-sm-12 m-md-auto">
            <div class="maim-detail-card shadow rounded" id="detail">

                <div class="pro-skill" id="skill">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Apresentação                    
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo officia nobis nam enim dolores rerum tempora itaque! Eligendi consectetur est molestiae nesciunt a. Autem sint sed hic quae. In, modi?</p><!-- p class="card-text" -->
                        </div> 
                    </div>
                </div> 
                <div class="card">
                   
                    
                    <div class="card-body">
                        <h4 class="card-title">
                            Informações Pessoais                            <div class="lines"></div>
                        </h4>
                        <p class="card-text">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome Completo</th>
                                        <td scope="col">Fulano de Tal</td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Gênero</th>
                                        <td scope="col">Homem</td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Idade</th>
                                        <td scope="col">22 Anos</td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Endereço Completo</th>
                                        <td scope="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum adipisci debitis soluta voluptatibus! 

                                        </td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <td scope="col">fulano@gmail.com</td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Telefone</th>
                                        <td scope="col">+55 19 98279-5627</td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Categorias</th>
                                        <td scope="col">Disponível</td>
                                    </tr>
                                </thead>

                            </table>
                        </p>
                       
                    </div>
                </div>
            </div> <!-- div Personal details ends here -->
            <div class="pro-skill" id="skill">
                <div class="card">
                    <div class="card-body">
            <h4 class="card-title">
                Informações Profissionais                           <div class="lines"></div>
            </h4>
            <p class="card-text">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Possui DRT?</th>
                            <td scope="col">Não</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Cor/Etnia</th>
                            <td scope="col">Branco</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Cor dos Cabelos</th>
                            <td scope="col">Preto</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Cor dos Olhos</th>
                            <td scope="col">Azuis</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Peso</th>
                            <td scope="col">86 kg</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Altura</th>
                            <td scope="col">178 cm</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Categorias</th>
                            <td scope="col">Disponível</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Instagram</th>
                            <td scope="col">@joão_de_barros</td>
                        </tr>
                    </thead>

                </table>
            </p>
        </div> 
    </div>
</div>
                            <div class="pro-skill" id="skill">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Formação                    
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo officia nobis nam enim dolores rerum tempora itaque! Eligendi consectetur est molestiae nesciunt a. Autem sint sed hic quae. In, modi?</p><!-- p class="card-text" -->
                        </div> 
                    </div>
                </div> <!-- div Professional skills ends here -->
 
            
                <div class="pro-skill" id="skill">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Habilidades Artísticas                    
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo officia nobis nam enim dolores rerum tempora itaque! Eligendi consectetur est molestiae nesciunt a. Autem sint sed hic quae. In, modi?</p><!-- p class="card-text" -->
                        </div> 
                    </div>
                </div> <!-- div Professional skills ends here -->

                <div class="Work-exp" id="experience">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Experiência Profissional                        
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo officia nobis nam enim dolores rerum tempora itaque! Eligendi consectetur est molestiae nesciunt a. Autem sint sed hic quae. In, modi?</p><!-- p class="card-text" -->
                        </div> <!-- class="card-body" -->
                    </div>
                </div> <!-- <div class="Work-exp" id="experience">  -->
                   
<div> <!-- this div starts in main.php   div class="row" -->
</div>
</section>


<script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/jquery.min.js"></script>
<script>
            //var $ = jQuery.noConflict();
        </script>
        <script src="https://codeglamour.com/php/iprofile/assets/site/vendor/jquery/jquery.min.js"></script>
        <script>
            var jQuery_3_4_1 = $.noConflict(true);
        </script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/proper.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/waypoints.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/jquery.counterup.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/bootstrap.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/magnific-popup.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/all.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/all.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/isotope.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/images-loded.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/owl.carousel.min.js"></script>

        <script src="https://codeglamour.com/php/iprofile/assets/site/layouts/2/js/custom.js"></script>


        <script src="https://codeglamour.com/php/iprofile/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    </body>

    </html>

  
