<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4 Casting - Conexões Artísticas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> <!-- Font Awesome -->
    <link rel="shortcut icon" href="../../assets/icons/favicon.ico" /> <!-- favicon -->
  <link rel="stylesheet" href="../../css/global.css"> <!-- CSS Global -->
  <link rel="stylesheet" href="./index.css"> <!-- CSS Local -->
</head>
<body>
<header>
    <div class="header">
    <h2 class="logo">4Casting</h2>
   

    <ul class="menu">
      <a href="#sec1"><i class="fas fa-home"></i></a>
    </ul>
  </div></header>
  <div class="split-screen">
    <div class="left">
        <section class="copy">
          <h1>Junte-se a nós!</h1>
          <p>Conheça aqui o artista essencial para seu projeto!</p>
        </section>
    </div>
    <div class="right">
      <form method="POST" action="../../controllers/authContratante.php">
        <section class="copy">
          <h2>Login - Contratantes</h2>
          <div class="login-container">
            <p>Ainda não tem uma conta? <a href="../cadastroC/index.php"><strong>Cadastre-se!</strong></a></p>
            <p>É artista? <a href="../loginA/index.php"><strong>Entre aqui!</strong></a></p>
          </div>
        </section>
        <div class="input-container email">
          <label for="email">E-mail</label>
          <input id="email" name="conEmail" type="email">
        </div>
        <div class="input-container password">
          <label for="password">Senha</label>
          <input id="password" name="conSenha" type="password">
          
        </div>
     <button class="signin-btn" type="submit">Entrar</button> 
        
      </form>
    </div>
  </div>
</body>
</html>