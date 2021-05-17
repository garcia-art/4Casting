<?php
   include_once('../../controllers/conexao.php');

   if (!isset($_SESSION)) session_start();

   if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
     and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

   } else {

     header('../../loginA/index.php');
   }

   $cod= $_SESSION['artId'];
   $sql= "SELECT * FROM artista WHERE artId = '$cod';";
   $dados= mysqli_query($conexao,$sql);
   
   $linha = mysqli_fetch_assoc($dados);
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
  <link rel="stylesheet" href="../../css/cadastroA.css"> <!-- CSS Local -->
  <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
  <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
  <script type="text/javascript">
    function inputHandler(masks, max, event) {
      var c = event.target;
      var v = c.value.replace(/\D/g, '');
      var m = c.value.length > max ? 1 : 0;
      VMasker(c).unMask();
      VMasker(c).maskPattern(masks[m]);
      c.value = VMasker.toPattern(v, masks[m]);
    }

    var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
    var tel = document.querySelector('input[attrname=telephone1]');
    VMasker(tel).maskPattern(telMask[0]);
    tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

    var docMask = ['999.999.999-999', '99.999.999/9999-99'];
    var doc = document.querySelector('#doc');
    VMasker(doc).maskPattern(docMask[0]);
    doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);
  </script>

</head>

<body>
<?php include_once("../headerA/index.php"); ?> 
  <div class="flex">

    <div class="wrapper">
      <div class="title">
        Editar Dados
      </div>
      <div class="title2">
        Dados Pessoais
      </div>
      <form action="../../controllers/artistaController.php?acao=update" method="post" enctype="multipart/form-data">
      <input type="hidden" name="artId" value="<?php echo $linha['artId']?>">
        <div class="form">
          <div class="inputfield">
            <label>Nome Completo</label>
            <input type="text" class="input" name="artNome" value="<?php echo $linha['artNome']?>" required>
          </div>
          <div class="inputfield">
            <label>CPF/CNPJ</label>
            <input id="doc" type="text" class="input" name="artDoc" value="<?php echo $linha['artDoc']?>" required>
          </div>
          <div class="inputfield">
            <label>Idade</label>
            <input type="text" maxlength="3" name="artIdade" value="<?php echo $linha['artIdade']?>" class="input" required>
          </div>
          <div class="inputfield">
            <label>Gênero</label>
            <div class="custom_select">
              <select name="artGenero" value="<?php echo $linha['artGenero']?>">
                <option value=""><?php echo $linha['artCategoria']?></option>
                <option value="Homem">Homem (Trans/Cis)</option>
                <option value="Mulher">Mulher (Trans/Cis)</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Prefiro não responder">Prefiro não responder</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Telefone</label>
            <input attrname="telephone1" type="text" class="input" name="artTelefone" value="<?php echo $linha['artTelefone']?>" required>
          </div>

          <div class="inputfield">
            <label>Endereço</label>
            <textarea cols="30" rows="5" id="" name="artEndereco" class="input" value="" style="resize: none" required><?php echo $linha['artEndereco']?></textarea>
          </div>
          <div class="title2">
        Dados Profissionais
      </div>
      <div class="inputfield">
            <label>Nome Artístico</label>
            <input type="text" class="input" name="artNomeArt" value="<?php echo $linha['artNomeArt']?>" required>
          </div>
          <div class="inputfield">
            <label>Foto de Perfil</label>
            <input type="hidden" value="<?php echo $linha['artFoto']?>" name="foto" id="foto">
            <input type="file" class="input" name="artFoto" id="artFoto" onchange="previewImagem()">
          </div>
          <div class="inputfield">
            <label>Preview</label>
			      <img style="width: 100%; height: 150px;" src="<?php echo ("../../assets/imagensArtista/".$linha['artFoto']) ?>" ><br><br>
          </div>

          <div class="inputfield">
            <label>Categoria</label>
            <input type="text" class="input" name="artCategoria" value="<?php echo $linha['artCategoria']?>">
          </div>

          <div class="inputfield">
            <label>Possui DRT?</label>
            <div class="custom_select">
              <select name="artDRT" value="<?php echo $linha['artDRT']?>">
                <option value=""><?php echo $linha['artDRT']?></option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
            </div>
          </div>
          
          <div class="inputfield">
            <label>Cor/Etnia</label>
            <div class="custom_select">
              <select name="artCor" value="">
                <option value=""><?php echo $linha['artCor']?></option>
                <option value="Preta">Preta</option>
                <option value="Parda">Parda</option>
                <option value="Branca">Branca</option>
                <option value="Amarela">Amarela</option>
                <option value="Indígena">Indígena</option>
                <option value="Outro">Outro</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Cor dos Olhos</label>
            <div class="custom_select">
              <select name="artOlhos" value="">
                <option value=""><?php echo $linha['artOlhos']?></option>
                <option value="Pretos">Preto</option>
                <option value="Castanhos">Castanho</option>
                <option value="Castanho Escuro">Castanho Escuro</option>
                <option value="Castanho Claro">Castanho Claro</option>
                <option value="Caramelo">Caramelo</option>
                <option value="Azul">Azul</option>
                <option value="Verde">Verde</option>
                <option value="Cinza">Cinza</option>
                <option value="Heterocromia">Heterocromia</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Cor dos Cabelos</label>
            <div class="custom_select">
              <select name="artCabelo" value="">
                <option value=""><?php echo $linha['artCabelo']?></option>
                <option value="Preto">Preto</option>
                <option value="Castanho">Castanho</option>
                <option value="Loiro">Loiro</option>
                <option value="Ruivo">Ruivo</option>
                <option value="Caramelo">Caramelo</option>
                <option value="Colorido">Colorido</option>
                <option value="Careca">Careca</option>
              </select>
            </div>
          </div>
          
          <div class="inputfield">
            <label>Peso (kg)</label>
            <input type="text" class="input" name="artPeso" maxlength="4" value="<?php echo $linha['artPeso']?>" id="peso" required>
          </div>

          <div class="inputfield">
            <label>Altura (cm)</label>
            <input type="text" class="input" name="artAltura" maxlength="3" value="<?php echo $linha['artAltura']?>" required>
          </div>

          <div class="inputfield">
            <label>Instagram</label>
            <input type="text" class="input" name="artInsta" value="<?php echo $linha['artInsta']?>">
          </div>

          <div class="inputfield">
            <label>Descrição</label>
            <textarea cols="30" rows="5" name="artDescricao" id="" class="input" value="" style="resize: none" required><?php echo $linha['artDescricao']?></textarea>
          </div>

          <div class="inputfield">
            <label>Formação Artística</label>
            <textarea cols="30" rows="5" name="artFormacao" id=""  class="input" value="" style="resize: none" required><?php echo $linha['artFormacao']?></textarea>
          </div>

          <div class="inputfield">
            <label>Experiência Profissional</label>
            <textarea cols="30" rows="5" name="artExperiencias" id=""  class="input" maxlenght="10" value="" style="resize: none" required><?php echo $linha['artExperiencias']?></textarea>
          </div>

          <div class="inputfield">
            <label>Habilidades Extras</label>
            <textarea cols="30" rows="5" name="artHabilidades" id=""  class="input" maxlenght="10" value="" style="resize: none" required><?php echo $linha['artHabilidades']?></textarea>
          </div>


          <div class="title2">
            Dados de Login
          </div>
          <div class="inputfield">
            <label>E-mail</label>
            <input type="email" name="artEmail" class="input" value="<?php echo $linha['artEmail']?>">
          </div>
          <div class="inputfield">
            <label>Senha</label>
            <input type="password" id="password" class="input" name="artSenha" value="<?php echo $linha['artSenha']?>" required>
          </div>
          <div class="inputfield">
            <label>Confirme sua Senha</label>
            <input type="password" id="confirm_password" class="input" value="<?php echo $linha['artSenha']?>" required>
          </div>

          <div class="inputfield">
            <input type="submit" value="Confirmar Alterações" class="btn">
          </div>
        </div>
    </div>
    </form>
  </div>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
  }

  var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
  var tel = document.querySelector('input[attrname=telephone1]');
  VMasker(tel).maskPattern(telMask[0]);
  tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

  var docMask = ['999.999.999-999', '99.999.999/9999-99'];
  var doc = document.querySelector('#doc');
  VMasker(doc).maskPattern(docMask[0]);
  doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);

</script>

<script>
  var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm_password");

  function validatePassword() {
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Senhas diferentes!");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

  function previewImagem(){
				var imagem = document.querySelector('input[name=artFoto]').files[0];
				var preview = document.querySelector('img');
				
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
	}

</script>