<?php 
    include_once('conexao.php');

	if(isset($_GET['acao'])){
		if($_GET['acao']=='insert'){

            //Metódo que recebe os dados para cadastrar a oportunidade

						$opoNome=$_POST['opoNome'];
						$opoDescricao=$_POST['opoDescricao'];
						$opoLocal=$_POST['opoLocal'];
						$opoLimite=$_POST['opoLimite'];
						$opoExtra=$_POST['opoExtra'];
						$conId=$_POST['conId'];
			    
		    $sql = "INSERT INTO oportunidade (opoNome, opoDescricao, opoLocal, opoLimite, opoExtra, Contratante_conId) VALUES ('$opoNome', '$opoDescricao', '$opoLocal', '$opoLimite', '$opoExtra', '$conId')";
            mysqli_query($conexao,$sql);

			echo "<script>
					alert('Oportunidade criada com sucesso!');
					window.location.href='../pages/oportunidadesC/index.php';
					</script>";


		}else if($_GET['acao']=='recuperarTudo'){ // Recuperando os elementos para edição

			if (isset($codigo)) {
				$idOportunidade = $codigo;
				$recuperarOportunidade = "SELECT * from oportunidade where opoId = '$codigo';";
				mysqli_query($conexao,$recuperarOportunidade);

			}  
		}else if ($_GET['acao']=='delete') {

            //Método que recebe o código do oportunidade para exclui-lo 

			$codigo=$_POST['opoId'];
			$sql= "DELETE FROM oportunidade where opoId = '$codigo';";
            mysqli_query($conexao,$sql);

			echo "<script>
					alert('Oportunidade excluída com sucesso!');
					window.location.href='../pages/oportunidadesC/index.php';
					</script>";
            
		}elseif ($_GET['acao']=='update') {

            //Método que recebe o código do oportunidade para atualizar suas informações 
            
            $codigo=$_POST['opoId'];

						$opoNome=$_POST['opoNome'];
						$opoDescricao=$_POST['opoDescricao'];
						$opoLocal=$_POST['opoLocal'];
						$opoLimite=$_POST['opoLimite'];
						$opoExtra=$_POST['opoExtra'];
            
		    $sql= "UPDATE oportunidade SET opoNome = '$opoNome', opoDescricao = '$opoDescricao', opoLocal = '$opoLocal', opoLimite = '$opoLimite', opoExtra= '$opoExtra' WHERE opoId = '$codigo';";
		    
            mysqli_query($conexao,$sql);

			echo "<script>
					alert('Alterações realizadas!');
					window.location.href='../pages/oportunidadesC/index.php';
					</script>";
            
		} 

		elseif ($_GET['acao']=='candidatar') {

            //Método que recebe o código do oportunidade para atualizar suas informações 
            
			$artId=$_POST['artId'];
			$opoId=$_POST['opoId'];
            

			$sql = "INSERT INTO artista_has_oportunidade (	Oportunidade_opoId, Oportunidade_artId) VALUES ('$opoId','$artId');";
            mysqli_query($conexao,$sql);


			// echo($sql);

			echo "<script>
			alert('Candidatura registrada!');
			window.location.href='../pages/oportunidadesA/index.php';
			</script>";

			// header("Location: ../pages/oportunidadesA/index.php");
            
		}

	} else {
        echo("A ação não foi encontrada");
    }
    
?>