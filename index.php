<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	use Dompdf\Options;

	// include autoloader
	require_once("dompdf/autoload.inc.php");
	$options = new Options();
	$options->setisRemoteEnabled(true);
	//Criando a Instancia
	$dompdf = new DOMPDF($options);

	session_start();
	$codigo = $_POST["artId"];
	$_SESSION['id'] = $codigo;

	ob_start();

	require("curriculo.php");

	$dompdf->loadHTML(ob_get_clean());

	$dompdf->setPaper('A4');
	
	$dompdf->render();
	
	$dompdf->stream('Currículo', ["Attachment"=>false]);
?>