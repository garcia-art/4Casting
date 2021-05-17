<?php

	include_once('conexao.php');

	if(isset($_GET['sair'])){
		if($_GET['sair'] == 1){
			session_start();
			session_destroy();
			header("Location: ../pages/home/index.php#sec3");
		}
	}

	if(!empty($_POST['conSenha'])){

		$conEmail = $_POST['conEmail'];
		$conSenha = $_POST['conSenha'];
		$query = "SELECT * FROM contratante WHERE conEmail= '$conEmail' and conSenha = '$conSenha';";
		$autenticar = mysqli_query($conexao,$query);
		$row = mysqli_fetch_assoc($autenticar);
		
		if(!empty($row)){
		session_start();
		$_SESSION['conId'] = $row['conId'];
		$_SESSION['conNome'] = $row['conNome'];
		$_SESSION['conDescricao'] = $row['conDescricao'];
		$_SESSION['conEndereco'] = $row['conEndereco'];
		$_SESSION['conTelefone'] = $row['conTelefone'];
		$_SESSION['conCategoria'] = $row['conCategoria'];
		$_SESSION['conInsta'] = $row['conInsta'];
		$_SESSION['conDoc'] = $row['conDoc'];
		$_SESSION['conGenero'] = $row['conGenero'];
		$_SESSION['conFoto'] = $row['conFoto'];
		$_SESSION['conEmail'] = $row['conEmail'];
		$_SESSION['conSenha'] = $row['conSenha'];
		



					header("Location: ../pages/homeC/index.php");
				}else{
					echo "<script>
					alert('Erro ao fazer login! Confira seus dados e tente Novamente');
					window.location.href='../pages/loginC/index.php';
					</script>";
				}
			
		
		
}


?>
