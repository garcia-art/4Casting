<?php

	include_once('conexao.php');

	if(isset($_GET['sair'])){
		if($_GET['sair'] == 1){
			session_start();
			session_destroy();
			header("Location: ../pages/home/index.php");
		}
	}

	if(!empty($_POST['artSenha'])){

		$artEmail = $_POST['artEmail'];
		$artSenha = $_POST['artSenha'];
		$query = "SELECT * FROM artista WHERE artEmail= '$artEmail' and artSenha = '$artSenha';";
		$autenticar = mysqli_query($conexao,$query);
		$row = mysqli_fetch_assoc($autenticar);
		
		if(!empty($row)){
		session_start();
		$_SESSION['artId'] = $row['artId'];
		$_SESSION['artNome'] = $row['artNome'];
		$_SESSION['artNomeArt'] = $row['artNomeArt'];
		$_SESSION['artDoc'] = $row['artDoc'];
		$_SESSION['artIdade'] = $row['artIdade'];
		$_SESSION['artGenero'] = $row['artGenero'];
		$_SESSION['artTelefone'] = $row['artTelefone'];
		$_SESSION['artCategoria'] = $row['artCategoria'];
		$_SESSION['artCor'] = $row['artCor'];
		$_SESSION['artCabelo'] = $row['artCabelo'];
		$_SESSION['artOlhos'] = $row['artOlhos'];
		$_SESSION['artAltura'] = $row['artAltura'];
		$_SESSION['artPeso'] = $row['artPeso'];
		$_SESSION['artDescricao'] = $row['artDescricao'];
		$_SESSION['artEndereco'] = $row['artEndereco'];
		$_SESSION['artInsta'] = $row['artInsta'];
		$_SESSION['artExperiencias'] = $row['artExperiencias'];
		$_SESSION['artHabilidades'] = $row['artHabilidades'];
		$_SESSION['artFormacao'] = $row['artFormacao'];
		$_SESSION['artDRT'] = $row['artDRT'];
		$_SESSION['artFoto'] = $row['artFoto'];
		$_SESSION['artEmail'] = $row['artEmail'];
		$_SESSION['artSenha'] = $row['artSenha'];



					header("Location: ../pages/homeA/index.php");
				}else{
					echo "<script>
					alert('Erro ao fazer login! Confira seus dados e tente Novamente');
					window.location.href='../pages/loginA/index.php';
					</script>";
				}
			
		
		
}


?>