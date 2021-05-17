<?php
	$usuario = "root";
	$senha = "";
	$servidor = "localhost";
	$banco = "4casting";

	$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
	mysqli_set_charset($conexao,'utf8');

	if (mysqli_connect_errno()) {
		die("Conexão Falhou: " . mysqli_connect_errno());
	}

?>