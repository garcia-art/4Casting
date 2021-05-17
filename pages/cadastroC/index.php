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
  <header>
    <div class="header">
      <h2 class="logo">4Casting</h2>


      <ul class="menu">
        <a href="../home"><i class="fas fa-home"></i></a>
      </ul>
    </div>
  </header>
  <div class="flex">

    <div class="wrapper">
      <div class="title">
        Cadastro
      </div>
      <div class="title2">
        Dados do Perfil
      </div>
      <form action="../../controllers/contratanteController.php?acao=insert" method="post" enctype="multipart/form-data">
        <div class="form">
          <div class="inputfield">
            <label>Nome Completo</label>
            <input type="text" class="input" name="conNome" placeholder="Insira seu nome completo." required>
          </div>
          <div class="inputfield">
            <label>CPF/CNPJ</label>
            <input id="doc" type="text" class="input" name="conDoc" placeholder="Insira seu CPF ou CNPJ." required>
          </div>
          <div class="inputfield">
            <label>Gênero</label>
            <div class="custom_select">
              <select name="conGenero">
                <option value="">Escolha uma opção</option>
                <option value="Homem">Homem (Trans/Cis)</option>
                <option value="Mulher">Mulher (Trans/Cis)</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Prefiro não responder">Prefiro não responder</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Telefone</label>
            <input attrname="telephone1" type="text" class="input" name="conTelefone" placeholder="Insira seu número de telefone." required>
          </div>

          <div class="inputfield">
            <label>Descrição</label>
            <textarea cols="30" rows="5" type=text name="conDescricao" id="" cols="30" rows="5" class="input" maxlenght="10" placeholder="Escreva um pequeno resumo sobre você." style="resize: none" required></textarea>
          </div>

          <div class="inputfield">
            <label>Endereço</label>
            <textarea cols="30" rows="5" type=text name="conEndereco" id=""  class="input" maxlenght="10" placeholder="Insira seu endereço completo, incluindo número, cidade, estado e CEP" style="resize: none" required></textarea>
          </div>

          <div class="inputfield">
            <label>Foto de Perfil</label>
            <input type="file" class="input" name="conFoto" required id="conFoto" onchange="previewImagem()" >
          </div>
          <div class="inputfield">
            <label>Preview</label>
  
			        <img style="width: 100%; height: 150px;"><br><br>
          </div>

          <div class="inputfield">
            <label>Categoria</label>
            <div class="custom_select">
              <select name="conCategoria">
                <option value="">Escolha uma opção</option>
                <option value="Agente">Agente</option>
                <option value="Diretor(a)">Diretor(a)</option>
                <option value="Produtor(a) de Elenco">Produtor(a) de Elenco</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Instagram</label>
            <input type="text" class="input" name="conInsta" placeholder="Ex: @fulano">
          </div>

          <div class="title2">
            Dados de Login
          </div>
          <div class="inputfield">
            <label>E-mail</label>
            <input type="email" class="input" name="conEmail" placeholder="Insira seu e-mail.">
          </div>
          <div class="inputfield">
            <label>Senha</label>
            <input type="password" id="password" class="input" name="conSenha" placeholder="Escolha uma senha." required>
          </div>
          <div class="inputfield">
            <label>Confirme sua Senha</label>
            <input type="password" id="confirm_password" class="input" placeholder="Digite novamente sua senha." required>
          </div>

          <div class="inputfield">
            <input type="submit" value="Cadastrar" class="btn">
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