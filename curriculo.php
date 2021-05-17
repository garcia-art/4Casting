<!-- <?php
include_once('./controllers/conexao.php');
$codigo = $_SESSION['id'];
$busca = "SELECT * FROM artista WHERE artId= '$codigo';";
$dados = mysqli_query($conexao, $busca);
$linha = mysqli_fetch_assoc($dados);
?> -->




<!doctype html>
<html lang="en">

<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
    
    table{
        width: 100%;
    }
    .image{
        padding: 20px;

    }

    img{
        margin: 5% 30% ;
    }
 
      body{
        font-family: 'Roboto', sans-serif;
       
      }
      thead,tr,th, td, tbody{
        text-align: left;
        padding: 3px 0;
        color: #000;
        

      }
th{ font-size: 25px;

}
     
     
    </style>
</head>

<body>
  <table class="image">
    <thead>
      <tr>
        <th class="tg-0pky" colspan="2"></th>
        <th class="tg-0pky" style="background:#db1515">
          <img src="<?php echo ("http://localhost/4casting/assets/imagensArtista/".$linha['artFoto']) ?>" width="240px"/>
        </th>
        <th class="tg-0pky" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-0pky" colspan="2"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky" colspan="2"></td>
      </tr>
      <tr>
        <td class="tg-0pky" colspan="2"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky" colspan="2"></td>
      </tr>
      <tr>
        <td class="tg-0pky" colspan="2"></td>
        <td class="tg-0pky"><span style="font-weight:bold;color:#FFF;"><?php echo $linha['artNomeArt'] ?></span></td>
        <td class="tg-0pky" colspan="2"></td>
      </tr>
    </tbody>
    </table>
    <br>
   
  <table class="tg">
    <thead>
      <tr>
        <th class="tg-0pky" colspan="6"><span style="font-weight:bold; border-bottom: 3px solid red;">Apresentação</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0pky" colspan="6"><?php echo $linha['artDescricao'] ?></td>
      </tr>
    </tbody>
    </table>
  <br>
  <br>
  <table class="tg">
    <thead>
      <tr>
        <th class="tg-0pky" colspan="2"><span style="font-weight:bold; border-bottom: 3px solid red;">Informações Pessoais</span></th>
        <th class="tg-0lax" colspan="4"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0pky"><span style="font-weight:bold">Nome Artístico</span></td>
        <td class="tg-0pky"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artNomeArt'] ?></td>
      </tr>
      <tr>
        <td class="tg-0pky"><span style="font-weight:bold">Nome Completo</span></td>
        <td class="tg-0pky"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artNome'] ?></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax"><span style="font-weight:bold">Gênero</span></td>
        <td class="tg-0lax"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artGenero'] ?></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax"><span style="font-weight:bold">Idade</span></td>
        <td class="tg-0lax"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artIdade'] ?></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax"><span style="font-weight:bold">Endereço Completo</span></td>
        <td class="tg-0lax"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artEndereco'] ?></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax"><span style="font-weight:bold">E-mail</span></td>
        <td class="tg-0lax"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artEmail'] ?></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax"><span style="font-weight:bold">Telefone</span></td>
        <td class="tg-0lax"></td>
        <td class="tg-0lax" colspan="4"><?php echo $linha['artTelefone'] ?></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="6"></td>
      </tr>
    </tbody>
    </table>
    <br>
    <br>
    <table class="tg">
      <thead>
        <tr>
          <th class="tg-0pky" colspan="2"><span style="font-weight:bold; border-bottom: 3px solid red;">Informações Profissionais</span></th>
          <th class="tg-0lax" colspan="4"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-fymr"><span style="font-weight:bold">Possui DRT?</span>
            
            
            </td>
          <td class="tg-0pky"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artDRT'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-0lax"><span style="font-weight:bold">Cor/Etnia</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artCor'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-0lax"><span style="font-weight:bold">Cor dos Cabelos</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artCabelo'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-0lax"><span style="font-weight:bold">Cor dos Olhos</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artOlhos'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-0lax"><span style="font-weight:bold">Peso</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artPeso'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-0lax"><span style="font-weight:bold">Altura</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artAltura'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-1wig"><span style="font-weight:bold">Categorias</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artCategoria'] ?></td>
        </tr>
        <tr>
          <td class="tg-1wig" colspan="6"></td>
        </tr>
        <tr>
          <td class="tg-1wig"><span style="font-weight:bold">Instagram</span></td>
          <td class="tg-0lax"></td>
          <td class="tg-0lax" colspan="4"><?php echo $linha['artInsta'] ?></td>
        </tr>
        <tr>
          <td class="tg-0lax" colspan="6"></td>
        </tr>
      </tbody>
      </table>
      <br>
      <br>
      <table class="tg">
        <thead>
          <tr>
            <th class="tg-0pky" colspan="6"><span style="font-weight:bold; border-bottom: 3px solid red;">Formação</span></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tg-0lax" colspan="6"></td>
          </tr>
          <tr>
            <td class="tg-0lax" colspan="6"></td>
          </tr>
          <tr>
            <td class="tg-0pky" colspan="6"><?php echo $linha['artFormacao'] ?></td>
          </tr>
        </tbody>
        </table>
      <br>
      <br>
      <table class="tg">
        <thead>
          <tr>
            <th class="tg-0pky" colspan="6"><span style="font-weight:bold; border-bottom: 3px solid red;">Habilidades Artísticas</span></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tg-0lax" colspan="6"></td>
          </tr>
          <tr>
            <td class="tg-0lax" colspan="6"></td>
          </tr>
          <tr>
            <td class="tg-0pky" colspan="6"><?php echo $linha['artHabilidades'] ?></td>
          </tr>
        </tbody>
        </table>
      <br>
      <br>

      <table class="tg">
        <thead>
          <tr>
            <th class="tg-0pky" colspan="6"><span style="font-weight:bold; border-bottom: 3px solid red;">Experiências Profissionais</span></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tg-0lax" colspan="6"></td>
          </tr>
          <tr>
            <td class="tg-0lax" colspan="6"></td>
          </tr>
          <tr>
            <td class="tg-0pky" colspan="6"><?php echo $linha['artExperiencias'] ?></td>
          </tr>
        </tbody>
        </table>
      <br>
      <br>

    
</body>

</html>