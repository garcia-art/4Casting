<?php 
    include_once('conexao.php');
	if(isset($_GET['acao'])){
		if($_GET['acao']=='insert'){

			//Metódo que recebe os dados para cadastrar o contratante
			//CONTROLLER VERIFIED

			$conNome=$_POST['conNome'];
			$conDescricao=$_POST['conDescricao'];
			$conEndereco=$_POST['conEndereco'];
			$conTelefone=$_POST['conTelefone'];
			$conCategoria=$_POST['conCategoria'];
			$conInsta=$_POST['conInsta'];
			$conDoc=$_POST['conDoc'];
			$conGenero=$_POST['conGenero'];
        	$conEmail=$_POST['conEmail'];
        	$conSenha=$_POST['conSenha'];

			$imagem = $_FILES['conFoto']['name'];

            //Verificações da imagem e inserção 
            ///////////////////////////////////////////////////////// 

			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../assets/imagensContratante/';

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
			if($_FILES['conFoto']['error'] != 0){
				echo "Erro upload";
			}

			//Faz a verificação da extensao do arquivo
			$tmp           = explode('.', $_FILES['conFoto']['name']);
			$fileExtension = end($tmp);
			if(array_search($fileExtension, $_UP['extensoes'])===false){		
				echo "
						<script type=\"text/javascript\">
							alert(\"A imagem não foi cadastrada! extesão inválida.\");
						</script>
					";
			}

			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['conFoto']['size']){
				echo "Tamanho de arquivo inválido";
			}
			else{

				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['conFoto']['tmp_name'], $_UP['pasta']. $imagem)){
					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysqli_query($conexao, "INSERT INTO contratante (conNome, conDescricao, conEndereco, conTelefone, conCategoria, conFoto, conInsta, conDoc, conGenero, conEmail, conSenha) VALUES ('$conNome', '$conDescricao', '$conEndereco', '$conTelefone', '$conCategoria', '$imagem', '$conInsta', '$conDoc', '$conGenero', '$conEmail', '$conSenha')");
					echo "<script>
					alert('Cadastro realizado com sucesso! Faça login para continuar.');
					window.location.href='../pages/loginC/index.php';
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

		}else if ($_GET['acao']=='delete') {

            //Método que recebe o código do contratante para exclui-lo 
            $codigo = $_POST["conId"];

            //REMOVER A IMAGEM DA PASTA

            //busca por nome para excluir na pasta FOTO 
            $busca= "SELECT conFoto FROM contratante WHERE conId='$codigo'";
            $query= mysqli_query($conexao,$busca);
            $linha = mysqli_fetch_assoc($query);
            unlink('../assets/imagensContratante/'.$linha["conFoto"]);
			
			//apagando usuário
			$sql= "DELETE FROM contratante where conId= '$codigo';";
            mysqli_query($conexao,$sql);
			session_destroy();
            echo "<script>
					alert('Perfil excluído com sucesso!');
					window.location.href='../pages/loginC/index.php';
					</script>";
            
		}
		else if ($_GET['acao']=='selecionar') {

            echo "<script>
					alert('Perfil selecionado com sucesso!');
					window.location.href='../pages/homeC/index.php';
					</script>";
            
		}
		else if ($_GET['acao']=='update') {

            //Metódo que recebe os dados para atualizar o contratante

            $codigo=$_POST['conId'];

            //Excluindo imagem do diretorio primeiro 
            $busca= "SELECT conFoto FROM contratante WHERE conId='$codigo'";
            $query= mysqli_query($conexao,$busca);

            $linha = mysqli_fetch_assoc($query);
            //unlink('../assets/imagensContratante/'.$linha["conFoto"]);


						$conNome=$_POST['conNome'];
						$conDescricao=$_POST['conDescricao'];
						$conEndereco=$_POST['conEndereco'];
						$conTelefone=$_POST['conTelefone'];
						$conCategoria=$_POST['conCategoria'];
						$conInsta=$_POST['conInsta'];
						$conDoc=$_POST['conDoc'];
						$conGenero=$_POST['conGenero'];
						$conEmail=$_POST['conEmail'];
						$conSenha=$_POST['conSenha'];

            $imagem = $_FILES['conFoto']['name'];

            //Verificações de imagem e atualização de contratante
        ////////////////////////////////////////////////////////////////////////////////////////////

			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../assets/imagensContratante/';
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
			if($_FILES['conFoto']['error'] != 0){
				echo "Erro com o upload!";
			}
			//Faz a verificação da extensao do arquivo
			$tmp           = explode('.', $_FILES['conFoto']['name']);
			$fileExtension = end($tmp);
			if(array_search($fileExtension, $_UP['extensoes'])===false){		
				echo "
						<script type=\"text/javascript\">
							alert(\"A imagem não foi cadastrada! extesão inválida.\");
						</script>
					";
			}
			
            //Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['conFoto']['size']){
				echo "Tamanho incompatível!
					";
			}else{

				if(move_uploaded_file($_FILES['conFoto']['tmp_name'], $_UP['pasta']. $imagem)){
					//Upload efetuado com sucesso, exibe a mensagem

					$query = mysqli_query($conexao, "UPDATE contratante SET conNome = '$conNome', conDescricao = '$conDescricao', conEndereco = '$conEndereco', conTelefone = '$conTelefone', conCategoria = '$conCategoria', conInsta = '$conInsta', conDoc = '$conDoc', conGenero = '$conGenero',  conFoto= '$imagem', conEmail = '$conEmail', conSenha = '$conSenha' WHERE conId = '$codigo';");
					echo "<script>
					alert('Perfil alterado com sucesso!');
					window.location.href='../pages/perfilC/index.php';
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