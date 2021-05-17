
<?php
    include_once('../../controllers/conexao.php');

    if (!isset($_SESSION)) session_start();

    if((!isset ($_SESSION['artId']) == true) | (!isset($_SESSION['conId'])==true) 
      and (!isset ($_SESSION['artSenha']) == true) | (!isset ($_SESSION['conSenha']) == true)){

    } else {

      header('../../loginC/index.php');
    }

    $cod= $_SESSION['conId'];
    $sql= "SELECT * FROM contratante WHERE conId = '$cod';";
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
  <link rel="stylesheet" href="../../css/cadastroC.css"> <!-- CSS Local -->
  <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->
  <link rel="stylesheet" href="../../css/header.css"> <!-- CSS Header -->
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
<?php include_once("../headerC/index.php"); ?> 
  <div class="flex">

    <div class="wrapper">
      <div class="title">
        Editar Dados
      </div>
      <div class="title2">
        Dados do Perfil
      </div>
      <form action="../../controllers/contratanteController.php?acao=update" method="post" enctype="multipart/form-data">
      <input type="hidden" name="conId" value="<?php echo $linha['conId']?>">
        <div class="form">
          <div class="inputfield">
            <label>Nome Completo</label>
            <input type="text" class="input" name="conNome" value="<?php echo $linha['conNome']?>" required>
          </div>
          <div class="inputfield">
            <label>CPF/CNPJ</label>
            <input id="doc" type="text" class="input" name="conDoc" value="<?php echo $linha['conDoc']?>" required>
          </div>
          <div class="inputfield">
            <label>Gênero</label>
            <div class="custom_select">
              <select name="conGenero" value="">
                <option value=""><?php echo $linha['conGenero']?></option>
                <option value="Homem">Homem (Trans/Cis)</option>
                <option value="Mulher">Mulher (Trans/Cis)</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Prefiro não responder">Prefiro não responder</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Telefone</label>
            <input attrname="telephone1" type="text" class="input" name="conTelefone" value="<?php echo $linha['conTelefone']?>" required>
          </div>

          <div class="inputfield">
            <label>Descrição</label>
            <textarea cols="30" rows="5" name="conDescricao" id="" cols="30" rows="5" class="input" maxlenght="10" value="" style="resize: none"><?php echo $linha['conDescricao']?></textarea>
          </div>

          <div class="inputfield">
            <label>Endereço</label>
            <textarea cols="30" rows="5" name="conEndereco" id=""  class="input" maxlenght="10" value="" style="resize: none"><?php echo $linha['conEndereco']?></textarea>
          </div>

          <div class="inputfield">
            <label>Foto de Perfil</label>
            <input type="hidden" value="<?php echo $linha['conFoto']?>" name="foto" id="foto">
            <input type="file" class="input" name="conFoto" id="conFoto" onchange="previewImagem()">
          </div>
          <div class="inputfield">
            <label>Preview</label>
			      <img style="width: 100%; height: 150px;" src="<?php echo ("../../assets/imagensContratante/".$linha['conFoto']) ?>" ><br><br>
          </div>

          <div class="inputfield">
            <label>Categoria</label>
            <div class="custom_select">
              <select name="conCategoria">
                <option value=""><?php echo $linha['conCategoria']?></option>
                <option value="Agente">Agente</option>
                <option value="Diretor(a)">Diretor(a)</option>
                <option value="Produtor(a) de Elenco">Produtor(a) de Elenco</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Instagram</label>
            <input type="text" class="input" name="conInsta" value="<?php echo $linha['conInsta']?>">
          </div>

          <div class="title2">
            Dados de Login
          </div>
          <div class="inputfield">
            <label>E-mail</label>
            <input type="email" class="input" name="conEmail" value="<?php echo $linha['conEmail']?>">
          </div>
          <div class="inputfield">
            <label>Senha</label>
            <input type="password" id="password" class="input" name="conSenha" value="<?php echo $linha['conSenha']?>" required>
          </div>
          <div class="inputfield">
            <label>Confirme sua Senha</label>
            <input type="password" id="confirm_password" class="input" value="<?php echo $linha['conSenha']?>" required>
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
				var imagem = document.querySelector('input[name=conFoto]').files[0];
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