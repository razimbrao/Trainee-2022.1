<?php 

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$entrar = $_POST['entrar']; 
$connect = new mysqli('localhost', 'root' , ' ' , 'database');

if(isset($entrar)){
  $verifica = $connect -> query("SELECT * FROM usuarios WHERE  login = '$login' AND senha = '$senha'")
  or die ("Erro");

  $rows = $verifica -> num_rows;
  if($rows <= 0){
     echo "<script language= 'javascript' type='text/javascript'>
  }
  alert('login e senha incorretos'); windows.location.href='login.view.php';</script>";
  die();

  }else{
    setcookie("login", $login);
    header("location:login.view.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonsterShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../../public/css/login.css" rel ="stylesheet">
</head>
<body>
   <div class="container">

   <!--inicio do formulario de login-->
      <div class="edit-login">
        <form method = "POST">
            <div class="mb-3 edit-email">
              <label for="exampleInputEmail1" class="form-label">Email:</label>
              <input type="text" class="form-control" name = "login" id="login" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Ex: nomeusuario@email.com</div>
            </div>
            <div class="mb-3 edit-senha">
              <label for="exampleInputPassword1" class="form-label">Senha:</label>
              <input type="password" class="form-control"  name = "senha"  id="senha">
            </div>
            <div class="mb-3 form-check edit-conectado">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Mantenha conectado</label>
            </div>
            <div class="editbotaosenha">
                <button type="submit"  name = "entrar" id="entrar" class="btn btn-danger">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">  Esqueceu a senha?</a>
            </div>

            <div class="edit-cadastro">
               <br> Não tem uma conta? <a href="">Cadastre-se</a>
            </div>
        </form>
      </div>
      
   <!--fim do formulario de login-->



   </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<?php

$login_cookie = $_COOKIE['login'];
   if(isset($login_cookie)){
     echo"Bem vindo a MonsterShop , $login_cookie <br>";
     echo "logado";
   }else{
     echo "Faça o login";
   }

?>