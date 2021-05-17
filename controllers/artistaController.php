<?php 
    include_once('conexao.php');
	use Dompdf\Dompdf;

	if(isset($_GET['acao'])){
		if($_GET['acao']=='insert'){

			//Metódo que recebe os dados para cadastrar o artista
			//CONTROLLER VERIFIED

			$artNome=$_POST['artNome'];
			$artNomeArt=$_POST['artNomeArt'];
				$artDoc=$_POST['artDoc'];
				$artIdade=$_POST['artIdade'];
				$artGenero=$_POST['artGenero'];
				$artTelefone=$_POST['artTelefone'];
				$artCategoria=$_POST['artCategoria'];
				$artCor=$_POST['artCor'];
				$artCabelo=$_POST['artCabelo'];
				$artOlhos=$_POST['artOlhos'];
				$artAltura=$_POST['artAltura'];
				$artPeso=$_POST['artPeso'];
				$artDescricao=$_POST['artDescricao'];
				$artEndereco=$_POST['artEndereco'];
				$artInsta=$_POST['artInsta'];
				$artExperiencias=$_POST['artExperiencias'];
				$artHabilidades=$_POST['artHabilidades'];
				$artFormacao=$_POST['artFormacao'];
				$artDRT=$_POST['artDRT'];
        		$artEmail=$_POST['artEmail'];
        	$artSenha=$_POST['artSenha'];

			$imagem = $_FILES['artFoto']['name'];

            //Verificações da imagem e inserção 
            ///////////////////////////////////////////////////////// 

			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../assets/imagensArtista/';

			$_UP['tamanho'] = 1024*1024*100; // Tamanho máximo do arquivo em Bytes
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif'); //Array com a extensões permitidas
			//Renomear
			$_UP['renomeia'] = false;

			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';


			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['artFoto']['error'] != 0){
				echo "Erro uplooad";
			}

			//Faz a verificação da extensao do arquivo
			$tmp           = explode('.', $_FILES['artFoto']['name']);
			$fileExtension = end($tmp);
			if(array_search($fileExtension, $_UP['extensoes'])===false){		
				echo "
						<script type=\"text/javascript\">
							alert(\"A imagem não foi cadastrada! extesão inválida.\");
						</script>
					";
			}


			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['artFoto']['size']){
				echo "Tamanho de arquivo inválido";
			}
			else{

				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['artFoto']['tmp_name'], $_UP['pasta']. $imagem)){
					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysqli_query($conexao, "INSERT INTO artista (artNome, artNomeArt, artDoc, artIdade, artGenero, artTelefone, artCategoria, artCor, artCabelo, artOlhos, artAltura, artPeso, artDescricao, artEndereco, artFoto, artInsta, artExperiencias, artHabilidades, artFormacao, artDRT, artEmail, artSenha) VALUES ('$artNome', '$artNomeArt', '$artDoc', '$artIdade', '$artGenero', '$artTelefone', '$artCategoria', '$artCor', '$artCabelo', '$artOlhos', '$artAltura', '$artPeso', '$artDescricao', '$artEndereco', '$imagem', '$artInsta', '$artExperiencias', '$artHabilidades', '$artFormacao', '$artDRT', '$artEmail', '$artSenha')");
					
					echo "<script>
					alert('Cadastro realizado com sucesso! Faça login para continuar.');
					window.location.href='../pages/loginA/index.php';
					</script>";

					}else{
					//Upload não efetuado com sucesso, exibe a mensagem
						echo "
							<script type=\"text/javascript\">
								alert(\"Imagem não foi cadastrada com Sucesso.\");
							</script>
						";

				}
			}
            /////////////////////////////////////////////////////////

		}else if($_GET['acao']=='recuperarTudo'){ // Recuperando os elementos para edição

			if (isset($codigo)) {
				$idArtista = $codigo;
				$recuperarArtista = "SELECT * from artista where artId = '$codigo';";
				mysqli_query($conexao,$recuperarArtista);

			}
		}else if ($_GET['acao']=='delete') {

            //Método que recebe o código do artista para exclui-lo 
            $codigo = $_POST['artId'];

            //REMOVER A IMAGEM DA PASTA

            //busca por nome para excluir na pasta FOTO 
            $busca= "SELECT artFoto FROM artista WHERE artId='$codigo'";
            $query= mysqli_query($conexao,$busca);
            $linha = mysqli_fetch_assoc($query);
            unlink('../assets/imagensArtista/'.$linha["artFoto"]);
			
			//apagando usuário
			$sql= "DELETE FROM artista where artId= '$codigo';";
            mysqli_query($conexao,$sql);

			echo "<script>
					alert('Cadastro excluído com sucesso!');
					window.location.href='../pages/loginA/index.php';
					</script>";
            
		}else if ($_GET['acao']=='delete') {

            //Método que recebe o código do artista para exclui-lo 
            $codigo = $_POST['artId'];

            //REMOVER A IMAGEM DA PASTA

            //busca por nome para excluir na pasta FOTO 
            $busca= "SELECT artFoto FROM artista WHERE artId='$codigo'";
            $query= mysqli_query($conexao,$busca);
            $linha = mysqli_fetch_assoc($query);
            unlink('../assets/imagensArtista/'.$linha["artFoto"]);
			
			//apagando usuário
			$sql= "DELETE FROM artista where artId= '$codigo';";
            mysqli_query($conexao,$sql);

			echo "<script>
					alert('Cadastro excluído com sucesso!');
					window.location.href='../pages/loginA/index.php';
					</script>";
            
		}
		// else if ($_GET['acao']=='selecionar') {


		// 	echo "<script>
		// 			alert('Pré-seleção realizada!');
		// 			window.location.href='../pages/detalheA/index.php';
		// 			</script>";
            
		// }
		
		else if ($_GET['acao']=='update') {

            //Metódo que recebe os dados para atualizar o artista

            $codigo=$_POST['artId'];

            //Excluindo imagem do diretorio primeiro 
            $busca= "SELECT artFoto FROM artista WHERE artId='$codigo'";
            $query= mysqli_query($conexao,$busca);

            $linha = mysqli_fetch_assoc($query);
            unlink('../assets/imagensArtista/'.$linha["artFoto"]);

						$artNome=$_POST['artNome'];
						$artNomeArt=$_POST['artNomeArt'];
						$artDoc=$_POST['artDoc'];
						$artIdade=$_POST['artIdade'];
						$artGenero=$_POST['artGenero'];
						$artTelefone=$_POST['artTelefone'];
						$artCategoria=$_POST['artCategoria'];
						$artCor=$_POST['artCor'];
						$artCabelo=$_POST['artCabelo'];
						$artOlhos=$_POST['artOlhos'];
						$artAltura=$_POST['artAltura'];
						$artPeso=$_POST['artPeso'];
						$artDescricao=$_POST['artDescricao'];
						$artEndereco=$_POST['artEndereco'];
						$artInsta=$_POST['artInsta'];
						$artExperiencias=$_POST['artExperiencias'];
						$artHabilidades=$_POST['artHabilidades'];
						$artFormacao=$_POST['artFormacao'];
						$artDRT=$_POST['artDRT'];
						$artEmail=$_POST['artEmail'];
						$artSenha=$_POST['artSenha'];

            $imagem = $_FILES['artFoto']['name'];

            //Verificações de imagem e atualização de artista
        ////////////////////////////////////////////////////////////////////////////////////////////

			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../assets/imagensArtista/';
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpeg','jpg');
			//Renomeiar
			$_UP['renomeia'] = false;
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

            //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['artFoto']['error'] != 0){
				echo "Erro com o upload!";
			}
			//Faz a verificação da extensao do arquivo
			$tmp           = explode('.', $_FILES['artFoto']['name']);
			$fileExtension = end($tmp);
			if(array_search($fileExtension, $_UP['extensoes'])===false){		
				echo "
						<script type=\"text/javascript\">
							alert(\"A imagem não foi cadastrada! extesão inválida.\");
						</script>
					";
			}
			
            //Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['artFoto']['size']){
				echo "Tamanho incompatível!
					";
			}else{

				if(move_uploaded_file($_FILES['artFoto']['tmp_name'], $_UP['pasta']. $imagem)){
					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysqli_query($conexao, "UPDATE artista SET artNome = '$artNome', artNomeArt = '$artNomeArt', artDoc = '$artDoc', artIdade = '$artIdade', artGenero = '$artGenero', artTelefone = '$artTelefone', artCategoria = '$artCategoria', artCor = '$artCor', artCabelo= '$artCabelo', artOlhos= '$artOlhos', artAltura = '$artAltura', artPeso = '$artPeso', artDescricao = '$artDescricao', artEndereco = '$artEndereco', artFoto= '$imagem', artInsta = '$artInsta', artExperiencias = '$artExperiencias', artHabilidades = '$artHabilidades', artFormacao = '$artFormacao', artDRT = '$artDRT', artEmail = '$artEmail', artSenha = '$artSenha' WHERE artId = '$codigo';");
					echo "<script>
					alert('Perfil alterado com sucesso!');
					window.location.href='../pages/perfilA/index.php';
					</script>";
					}else{
					//Upload não efetuado com sucesso, exibe a mensagem
						echo "
							<script type=\"text/javascript\">
								alert(\"Imagem não foi cadastrada com Sucesso.\");
							</script>
						";

				}
			}
        ////////////////////////////////////////////////////////////////////////////////////////////        
		}
	} else {
        echo("A ação não foi encontrada");
    }
    
?>